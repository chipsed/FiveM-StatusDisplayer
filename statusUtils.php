<?php

    function getStatus($style, $serverip, $serverport, $servername, $maxslots){

        $server_settings['name'] = $servername; // Server Name for Display
		$server_settings['ip'] = $serverip; // Server IP Adress for Connection
		$server_settings['port'] = $serverport; // Default port might be 30120
        $server_settings['max_slots'] = $maxslots; // Max Player Slots

        $content = json_decode(@file_get_contents("http://".$server_settings['ip'].":".$server_settings['port']."/info.json"), true);
        
        if($content){
            if($style == "pure"){

            
            
                $playersJSON = file_get_contents("http://" . $server_settings['ip'] . ":" . $server_settings['port'] . "/players.json"); // Gets players.json from server ip:port.
    
                $playersJSONDecode = json_decode($playersJSON, true);
                $playersJSONCount = count($playersJSONDecode); // Counts player name from players.json file.

                echo '
                <link rel="stylesheet" href="stats.css">
                <div class="serverContainer">
                    <div class="mainContainer">
                        <div class="box online">
                            Online
                        </div>
                        <div class="secondbox">
                            ' . $server_settings['name'] .'
                        </div>
                        <div class="box">
                            '. $playersJSONCount . '/' . $server_settings['max_slots'] . '
                        </div>
                    </div>
                </div>
                ';
    
            } else {
                echo "No other styles yet.";
            }
        } else {
            echo "Server is not online right now, try again.";
        }
        
    }

    getStatus("pure", "64.190.90.120", "30120", "Gun Game", "64");

    


?>