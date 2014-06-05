<?php
    function charData($realm = '', $character = ''){

        // pull data from WoW API
        $url = 'http://us.battle.net/api/wow/character/' . $realm . '/' . $character . '?fields=titles,guild';
        $ch = curl_init($url);
     
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');


        // change data from json to stdClass (use print_r to output)
        $response = curl_exec($ch);
        $data = json_decode($response);


        // pull guild (if possible)
        if ( property_exists($data, "guild") ){ 
            $guild = $data->guild->name;
        }else{ 
            $guild = ""; }


        // extract currently selected title
        $titles = $data->titles;
        $usedTitle = "";
        foreach ($titles as $title) {
            foreach($title as $values)
                if ($values == 'selected'){
                    $usedTitle = rtrim($title->name, "%s"); } }
                    

        // return array of character data
        $results = [$character, $usedTitle, $guild, $realm];
        return $results;
    }
    ?>
