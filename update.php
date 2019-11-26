<?php
/**
 * Generate folders and repos for each country to each serve as a database.
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');

$cwd       = dirname(realpath(__FILE__));
$zipfile   = $cwd.'/allCountries.zip';
$txtfile   = $cwd.'/allCountries.txt';
$statsOnly = false;
$regenKey  = false;
$keyArr    = $regenKey ? [] : json_decode(file_get_contents($cwd.'/key.json'), true);

// Download http://download.geonames.org/export/zip/allCountries.zip
if (!file_exists($txtfile)) {
    echo "Downloading zipcodes...";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://download.geonames.org/export/zip/allCountries.zip');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    $file = fopen($zipfile, "w+");
    fputs($file, $data);
    fclose($file);
    $zip = new ZipArchive;
    $res = $zip->open($zipfile);
    if ($res === true) {
        $zip->extractTo('.');
        $zip->close();
        unlink($zipfile);
    } else {
        die('Unable to unzip.');
    }
}

echo "Cleaning up from previous build...\n";
clean($cwd);

$row     = 0;
$headers = [
    'countryCode', // iso country code, 2 characters
    'postalCode', // varchar(20)
    'placeName', // varchar(180)
    'adminName1', // 1. order subdivision (state) varchar(100)
    'adminCode1', // 1. order subdivision (state) varchar(20)
    'adminName2', // 2. order subdivision (county/province) varchar(100)
    'adminCode2', // 2. order subdivision (county/province) varchar(20)
    'adminName3', // 3. order subdivision (community) varchar(100)
    'adminCode3', // 3. order subdivision (community) varchar(20)
    'latitude', // estimated latitude (wgs84)
    'longitude', // estimated longitude (wgs84)
    'accuracy', // accuracy of lat/lng from 1=estimated to 6=centroid
];
$stats   = [];
if (($handle = fopen($txtfile, 'r')) !== false) {
    while (($data = fgetcsv($handle, 1000, "\t")) !== false) {
        $place = new stdClass();
        foreach ($data as $key => $value) {
            $keyname           = $headers[$key];
            $place->{$keyname} = $value;
        }
        if (!empty($place->countryCode) || !empty($place->postalCode)) {
            $countryCode = strtoupper($place->countryCode);

            if ($statsOnly) {
                $minCode = minPostal($place->postalCode);
                // Two countries have too much numerical variance to list all zip-codes independently
                // given Github's current repository limits. For these we will only include the min JSON/JSONP.
                $length = strlen($place->postalCode);

                if (!isset($stats[$countryCode])) {
                    $stats[$countryCode] = [
                        'count'   => 1,
                        'lowest'  => $minCode,
                        'highest' => $minCode,
                    ];
                } else {
                    $stats[$countryCode]['count']++;
                    if ($minCode < $stats[$countryCode]['lowest']) {
                        $stats[$countryCode]['lowest'] = $minCode;
                    } elseif ($minCode > $stats[$countryCode]['highest']) {
                        $stats[$countryCode]['highest'] = $minCode;
                    }
                }
                continue;
            }

            $minCodeRounded = minPostalRounded($place->postalCode, $place->countryCode, $keyArr);
            $minOnly        = in_array($countryCode, ['JP', 'PT']);
            echo 'Creating entry for '.$place->countryCode.' '.$place->postalCode.($minOnly ? ' (min only)' : '').' in index '.$minCodeRounded."\n";
            if (!is_dir($cwd.'/'.$countryCode)) {
                mkdir($cwd.'/'.$countryCode);
            }

            if (!file_exists($cwd.'/'.$countryCode.'/test.jsonp')) {
                $test          = new stdClass();
                $test->success = true;
                file_put_contents($cwd.'/'.$countryCode.'/test.jsonp', 'zipCodesTestCallback('.json_encode($test).');');
            }
            if (!$minOnly) {
                file_put_contents(
                    $cwd.'/'.$countryCode.'/'.$place->postalCode.'.json',
                    json_encode($place)
                );
            }

            if (!is_dir($cwd.'/'.$countryCode.'/min')) {
                mkdir($cwd.'/'.$countryCode.'/min');
            }

            $codes = [];
            if (file_exists($cwd.'/'.$countryCode.'/min/'.$minCodeRounded.'.json')) {
                $codes = json_decode(file_get_contents($cwd.'/'.$countryCode.'/min/'.$minCodeRounded.'.json'), true);
            }
            $codes[$place->postalCode] = $data;
            $codesJSON                 = json_encode($codes);
            file_put_contents(
                $cwd.'/'.$countryCode.'/min/'.$minCodeRounded.'.json',
                $codesJSON
            );
            file_put_contents(
                $cwd.'/'.$countryCode.'/min/'.$minCodeRounded.'.jsonp',
                'zipCodesCallback('.$codesJSON.');'
            );
        }
        $row++;
    }
    fclose($handle);
}

// floor((X - lowest) / ((highest - lowest) / ceil(count / 1000))),
// if (a > 1) { file = floor((X - b) / c); }

if ($regenKey) {
    $key = [];
    foreach ($stats as $country => $stat) {
        $key[$country] = [];
        if ($stat['count'] > 100000) {
            $chars = 3;
        } elseif ($stat['count'] > 10000) {
            $chars = 2;
        } elseif ($stat['count'] > 1000) {
            $chars = 1;
        } else {
            $chars = 0;
        }
        $key[$country] = $chars;

    }
    file_put_contents(
        $cwd.'/key.json',
        json_encode($key)
    );
    file_put_contents(
        $cwd.'/key.js',
        'var key = '.json_encode($key).';'
    );
    die(var_export($key, true));
}

/**
 * Recursively delete files within a directory based on type.
 *
 * @param $dir
 * @param  array  $types
 */
function clean($dir, $types = ['json', 'jsonp'])
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != ".." && $object != "key.json") {
                if (is_dir($dir."/".$object)) {
                    clean($dir."/".$object, $types);
                } else {
                    $ext = pathinfo($object, PATHINFO_EXTENSION);
                    if (in_array($ext, $types)) {
                        unlink($dir."/".$object);
                    }
                }
            }
        }
    }
}

function minPostal($postalCode)
{
    // Only allow uppercase.
    $postalCode = strtoupper($postalCode);
    // Remove non-alphanumeric characters.
    $postalCode = preg_replace("/[^A-Z0-9]/", '', $postalCode);

    // Convert from base 36 to an integer.
    $postalCode = base_convert($postalCode, 36, 10);

    return $postalCode;
}

function minPostalRounded($postalCode, $country, $keyArr = [])
{
    $result = 0;

    if (isset($keyArr[$country]) && $keyArr[$country] > 1) {

        // Only allow uppercase.
        $postalCode = strtoupper($postalCode);
        // Remove non-alphanumeric characters.
        $postalCode = preg_replace("/[^A-Z0-9]/", '', $postalCode);

        $result = substr($postalCode, 0, $keyArr[$country]);
    }

    return $result;

}