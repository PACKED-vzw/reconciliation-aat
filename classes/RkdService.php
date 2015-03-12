<?php

//AAT

//--------------------------------------------------------------------------------------------------
class RkdService extends ReconciliationService
{
    var $client;

    //----------------------------------------------------------------------------------------------
    function __construct()
    {
        $this->name 			= 'Rkd';
        // Freebase has a namespace for VIAF
        // https://www.freebase.com/user/hangy/viaf
        $this->identifierSpace 	= 'http://rdf.freebase.com/ns/user/hangy/viaf';
        // Freebase object
        $this->schemaSpace 		= 'http://rdf.freebase.com/ns/type.object.id';

        $this->Types();
        $view_url = 'http://explore.rkd.nl/explore/artists/{{id}}';
        $preview_url = 'http://explore.rkd.nl/explore/artists/{{id}}';
        $width = 430;
        $height = 300;

        if ($view_url != '')
        {
            $this->View($view_url);
        }
        if ($preview_url != '')
        {
            $this->Preview($preview_url, $width, $height);
        }
    }

    //----------------------------------------------------------------------------------------------
    function Types()
    {
        $type = new stdclass;
        $type->id = '/person';
        $type->name = 'Person';
        $this->defaultTypes[] = $type;
    }


    //----------------------------------------------------------------------------------------------
    // Handle an individual query
    function OneQuery($query_key, $text, $limit = 1)
    {
        // $text = term to match
        // wat als er één is
        // wat als er meerdere zijn?
        //$data = unserialize(file_get_contents('datasources/ditisdeaat.txt'));

        //$data = unserialize(file_get_contents('datasources/rkd.data'));

        $data = unserialize(file_get_contents('datasources/rkd_new_may.data'));
        $matcher = new Matcher($data, $text);
        $matches = $matcher->match("rkd");

        foreach ($matches as $term){
            $hit = new stdclass;
            $hit->score = $term['match'];
            $hit->match = true;
            $hit->name 	= $term['term']['return_text'];
            $hit->id = $term['term']['id'];
            $this->StoreHit($query_key, $hit);
        }
    }

}

