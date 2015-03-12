<?php

$joris = file_get_contents("datasources/newversionofaat.data");

print_r(unserialize($joris)); die;
