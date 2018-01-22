<?php

$cwd = dirname(realpath(__FILE__));
$zipfile = $cwd . '/zip-codes-database-FREE.csv';
if (!file_exists($zipfile)) {
    echo "Error: Take the latest free zip code database from zip-codes.com and extract the CSV next to this file and try again.\n";
    exit(1);
}


echo "Cleaning any previous build...\n";
clean($cwd);

$row = 0;
$headers = [];
if (($handle = fopen($zipfile, 'r')) !== false) {
    while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        if ($row == 0) {
            $headers = $data;
        } else {
            $zip = new stdClass();
            foreach ($data as $key => $value) {
                $keyname = $headers[$key];
                $zip->{$keyname} = $value;
            }
            if (!empty($zip->ZipCode)) {
                echo "Creating files for " . $zip->ZipCode . "\n";
                file_put_contents($cwd . '/' . $zip->ZipCode . '.json', json_encode($zip));
                file_put_contents($cwd . '/' . $zip->ZipCode . '.jsonp', 'zipCodeCallback(' . json_encode($zip) . ');');
            }
        }
        $row++;
    }
    fclose($handle);
}

/**
 * Recursively delete files and folders within a directory based on type.
 * @param $dir
 * @param null $root
 * @param array $types
 */
function clean($dir, $root = null, $types = ['json', 'jsonp'])
{
    if (!$root) {
        $root = $dir;
    }
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir."/".$object)) {
                    clean($dir."/".$object, $root, $types);
                } else {
                    $ext = pathinfo($object, PATHINFO_EXTENSION);
                    if (in_array($ext, $types)) {
                        unlink($dir."/".$object);
                    }
                }
            }
        }
        if ($dir !== $root) {
            try {
                rmdir($dir);
            } catch (Exception $e) {
            }
        }
    }
}