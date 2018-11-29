<?php
/**
 * Generate a zip /city/state lookup database that can be opcache'd for near-instant lookup.
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');

$cwd       = dirname(realpath(__FILE__));
$zipfile   = $cwd.'/allCountries.zip';
$txtfile   = $cwd.'/allCountries.txt';
$statsOnly = false;
$regenKey  = false;

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
            $place->{$keyname} = str_replace(["'", "\t"], '', $value);
        }
        if (!empty($place->countryCode) && !empty($place->postalCode)) {
            $countryCode = strtoupper($place->countryCode);
            $zipsFile    = $cwd.'/zips/'.$countryCode.'.php';
            if (!file_exists($zipsFile)) {
                file_put_contents(
                    $zipsFile,
                    "<?php \$zipCodes['".$countryCode."']=["
                );
            }
            $city     = strtoupper($place->placeName);
            $cityFile = $cwd.'/cities/'.$countryCode.'.php';
            if (!file_exists($cityFile)) {
                file_put_contents(
                    $cityFile,
                    "<?php \$cities['".$countryCode."']=["
                );
            }
            $string = "'".$place->postalCode."'=>'".implode("\t", $data)."',";
            file_put_contents($zipsFile, $string, FILE_APPEND);
        }
        $row++;
    }
    fclose($handle);
}

// @todo - Add '];' to the end of all files that were generated.
