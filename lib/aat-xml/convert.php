<?php

set_time_limit(3600);

/*
 * open xml bestand
 * voor elk record file relevante velden (aatid en term) eruithalen
 * wegschrijven naar nieuwe xml (gewoon tekst)
 *
 *
 */

$xml = simplexml_load_file('/Users/jorisjanssens/Desktop/aat_this.xml');


foreach($xml->recordList->record as $record){
    print_r($record);

}
