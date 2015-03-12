<?php

require_once('lib/lib.php');


if (php_sapi_name() != 'cli')
{
    exit('Can only be run from the command line!');
}

if( $argc > 1 && file_exists('classes/'.ucfirst($argv[1]). 'Importer.php') ){
    echo "Starting up importer ... \n";
    $className = $argv[1] . 'Importer';
    new $className();
}
else {
    echo "Not an importer";
}
die;

