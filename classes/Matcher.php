<?php

Class Matcher{

    private $words, $term;

    public function __construct($haystack, $input)
    {
        $this->words = $haystack;
        $this->term = $input;
    }

    public function match($type = "object")
    {
        $matches = array();
        $ids_already_added = array();
        foreach ($this->words as $word) {
            // calculate the distance between the input word,
            // and the current word

            /*// if there is a space in the input word ...
            if(preg_match('/\s/', $word)){
                $word_pieces = explode(' ', $word);


            }*/

            // A1 basis geen teksttransformatoe
            /*$lev = levenshtein($this->term, $word['text']);

            if ($lev < 5) {
                $matches[] = array("term" => $word, "match" => $lev);
            }
            continue;*/
            // EA1 einde

            // A2 basisteksttransformatie


            /*
            $pieces = explode(" ", $this->term);

            $lev = levenshtein($pieces[0], $word['text']);

            if ($lev < 5) {
                $matches[] = array("term" => $word, "match" => $lev);
            }
            continue;
            */

            // EA2


            // A3 dit id diegene die alles samenvoegt
            /*
            $word_pieces = explode(' ', $word['text']);

            foreach($word_pieces as $piece){
                if($piece != ''){
                    $lev = levenshtein($this->term, $piece);
                    if ($lev < 5) {
                        $matches[] = array("term" => $piece, "match" => $lev);
                    }
                }

            }
            */

            // EA3


            // A4 alles tussen haakjes mag weg
            if($type=="object"){
                $input_term_without_brackets =  preg_replace("/\([^)]+\)/","",$this->term);
                $lev = levenshtein($input_term_without_brackets, $word['text_to_match']);

                if ($lev < 5) {
                    $matches[] = array("term" => $word, "match" => $lev);
                }
            }
            elseif($type=="odis"){
                $lev = levenshtein($this->term, $word['text_to_match']);

                if ($lev < 3) {
                    if(!in_array($word['id'], $ids_already_added)){
                        $matches[] = array("term" => $word, "match" => $lev);
                        $ids_already_added[] = $word['id'];
                    }
                }
                //continue;
            }
            elseif($type=="rkd"){
                $lev = levenshtein($this->term, $word['text_to_match']);

                if ($lev < 5) {
                    if(!in_array($word['id'], $ids_already_added)){
                        $matches[] = array("term" => $word, "match" => $lev);
                        $ids_already_added[] = $word['id'];
                    }
                }
                //continue;
            }




            // E A4

           /* $lev = levenshtein($this->term, $word['text']);

            if ($lev < 5) {
                $matches[] = array("term" => $word, "match" => $lev);
            }*/
        }

        // order associative array with helper function
        usort($matches, array('Matcher', 'compareOrder'));

        $ordered = array_slice($matches, 0, 5, true );
        return($ordered);
        //return array_reverse($ordered);
    }

    /*
     * Order associative array by value of match
     */
    private static function compareOrder($a, $b)
    {
        return $a['match'] - $b['match'];
    }

}