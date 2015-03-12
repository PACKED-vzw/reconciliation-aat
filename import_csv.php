<?php

//$data = file_get_contents('datasources/AATcsv.txt');

// record - recordId,record - aatNedId,record - subjectId,record - status,record - pt,record - bt,record - uf,record - eq



$row = 1;
$sub_id = 1;
$termsArray = array();
if (($handle = fopen('datasources/AATcsv.txt', 'r')) !== FALSE) {
    while (($data = fgetcsv($handle, 1000000, ",")) !== FALSE) {
        $row++;

        $recordId  = $data[0];
        $subjectId = $data[2];
        $term      = $data[4];
        $new_term  = array();
        if(strlen($subjectId)>1)
        {
            $new_term['id'] = $subjectId;
        }
        else
        {
            $sub_id++;
            $new_term['id'] = $recordId;
            echo "geen subjectId gevonden ( $sub_id van $row ) \n";
            if(strlen($recordId)<2)
            {
                echo "-- en ook geen recordID :( \n";
            }
        }
        $new_term["text_to_match"] = $term;
        $new_term["return_text"] = $term;

        if($new_term['return_text']=="")
        {
            echo "Geen term, dit is raar...";
        }

        // eerste keer toevoegen ...
        $termsArray[] = $new_term;


        // nog een keer toevoegen als er ook non-preferred termen zijn ...
        if(strlen($data[6])>2)
        {
            echo "\n \n - $data[6] wordt ook overwogen ...  - \n \n ";

            $new_term['text_to_match'] = $data[6];
            $termsArray[] = $new_term;

        }

    }
    fclose($handle);
}

file_put_contents('datasources/newversionofaat.data', serialize($termsArray));