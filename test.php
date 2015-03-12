<?php

$file = file_get_contents("datasources/odisdata.data");

//$file = file_get_contents("datasources/newversionofaat.data");

//$file = file_get_contents("datasources/rkd.data");

$data = unserialize($file);
print_r($data); die;

