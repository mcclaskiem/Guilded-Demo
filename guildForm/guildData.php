<?php
    function guildData($guild = '', $realm = ''){

        // pull data from WoW API
        $url = 'http://us.battle.net/api/wow/guild/' . $realm . '/' . $guild;
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
        

        // pull guild level (if possible)
        if ( property_exists($data, "level") ){ 
            $level = $data->level;
        }else{ 
            $level = ""; }


        // pull guild achievement points (if possible)
        if ( property_exists($data, "achievementPoints") ){ 
            $points = $data->achievementPoints;
        }else{ 
            $points = ""; }
                    

        // return array of guild data
        $results = [$guild, $level, $points, $realm];
        return $results;
    }
    ?>
