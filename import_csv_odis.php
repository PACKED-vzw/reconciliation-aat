<?php

//$data = file_get_contents('datasources/AATcsv.txt');

// record - recordId,record - aatNedId,record - subjectId,record - status,record - pt,record - bt,record - uf,record - eq



$row = 1;
$sub_id = 1;
$termsArray = array();
if (($handle = fopen('datasources/ODIS-reconciliation.csv', 'r')) !== FALSE) {
    while (($data = fgetcsv($handle, 406326, ",")) !== FALSE) {
        $row++;

        $recordId  = $data[0];
        $term      = $data[4];
        $return_text = $data[2];
        $new_term  = array();
        if(strlen($recordId)>1)
        {
            $new_term['id'] = $recordId;
        }
        else
        {

            echo "geen id gevonden\n";

        }
        $new_term["text_to_match"] = $term;
        $new_term["return_text"] = $return_text;

        if($new_term['return_text']=="")
        {
            echo "Geen term, dit is raar...";
        }

        // eerste keer toevoegen ...
        $termsArray[] = $new_term;

    }
    fclose($handle);
}

file_put_contents('datasources/odisdata.data', serialize($termsArray));