<?php
require_once('lib/lib.php');

ob_start();

print_r($_REQUEST);
$date = new DateTime();

$out1 = $date->format('H_i:s');
$out1 .= "\n";
$out1 .= ob_get_contents();

ob_end_clean();
file_put_contents('logs/test.txt', $out1, FILE_APPEND);

$service = new OdisService();


$service->Call($_REQUEST);


die;





/*
ob_start();

print_r($_REQUEST);

$out1 = ob_get_contents();

ob_end_clean();


file_put_contents('test.txt', $out1, FILE_APPEND); die;


$infoArray = array(
    'name' => 'PACKED AAT service',
    'identifierSpace' =>'josnet',
    'schemaSpace' => 'jospret',
    'defaultTypes' => array(
        array(
        'id' => 'aat_object',
        'name' => "aat_object_name"
        )
        )
);

$pizza = <<<EOT

{
  "name" : "Netflix Reconciliation through Freebase",
  "identifierSpace" : "http://rdf.freebase.com/ns/authority.netflix.movie",
  "schemaSpace" : "http://rdf.freebase.com/ns/type.object.id",
  "view" : {
    "url" : "http://www.netflix.com/WiMovie//{{id}}"
  },
  "preview" : {
    "url" : "http://netflix-reconcile.freebaseapps.com/preview/{{id}}",
    "width" : 430,
    "height" : 300
  },
  "suggest" : {
    "type" : {
      "service_url" : "http://netflix-reconcile.freebaseapps.com",
      "service_path" : "/suggest_type",
      "flyout_service_url" : "http://www.freebase.com"
    },
    "property" : {
      "service_url" : "http://netflix-reconcile.freebaseapps.com",
      "service_path" : "/suggest_property",
      "flyout_service_url" : "http://www.freebase.com"
    },
    "entity" : {
      "service_url" : "http://netflix-reconcile.freebaseapps.com",
      "service_path" : "/suggest",
      "flyout_service_path" : "/flyout"
    }
  },
  "defaultTypes" : []
}




EOT;


$pizza = <<<EOT

{
    "name": "AAT",
  "identifierSpace": "http:\/\/rdf.freebase.com\/ns\/user\/hangy\/viaf",
  "schemaSpace": "http:\/\/rdf.freebase.com\/ns\/type.object.id",
  "view": {
    "url": "http:\/\/viaf.org\/viaf\/{{id}}"
  },
  "defaultTypes": [
    {
        "id": "\/objectname",
      "name": "Objectname"
    }
  ]
}

EOT;


header ("Content-type: text/json\n\n");
echo $pizza; die;
echo json_encode($infoArray); die;

*/


