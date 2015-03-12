<?php

class AatImporter
{
    public function __construct(){
        $xml = simplexml_load_file('datasources/aat_mini_ok.xml');

        $records_array = array();
        foreach ($xml->concept as $concept)
        {
            $record = array();

            $record['id']      = (string) $concept->attributes()->about;
            //print_r($concept); die;
            $record['text']    = (string) $concept->prefLabel;

            if($record['id']!=""&&$record['text']!=""){
                $records_array[] = $record;
            }

        }
        print_r($records_array); die;
        $om_op_t_slaan = serialize($records_array);
        file_put_contents('ditisdeaat.txt', $om_op_t_slaan);
        print_r($records_array);

        if(false)
        {
            $dbh = new Database();
            $dbh->exec("INSERT INTO term VALUES ('','" . $record['id'] . "','" . $record['text'] . "')");
        }

    }

}