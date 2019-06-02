<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Server Displayer for FiveM Servers</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<?php
		/*-----------------------[ Settings ]------------------------------*/
		
		/*----------------------------------------------------------------

		print "<div style='background-color: #f2f2f2; border: 4px double black; border-radius: 5px; width: 300px; padding: 2px; border: 4px double black;'>";
		$content = json_decode(file_get_contents("http://".$server_settings['ip'].":".$server_settings['port']."/info.json"), true);
		$img_d64 = $content['icon'];

		if($content):
			$gta5_players = file_get_contents("http://".$server_settings['ip'].":".$server_settings['port']."/players.json");
			$content = json_decode($gta5_players, true);
			$pl_count = count($content);
			$SRV_STATUS = "<font style='color: green;'>Online</font>";
			if($img_d64) { print "<div align='center'><img  width='150' src='data:image/png;base64, $img_d64' ></div>"; }
			print "<p align='center' style='color:#000000; background-color: #ffffff;'><strong>$server_settings[title]</strong></p>";
			print "<p align='center'><strong>Players:</strong> $pl_count / $server_settings[max_slots]</p>";
		else:
			print "<p align='center' style='color:#000000; background-color: #ffffff;'><strong>$server_settings[title]</strong></p>";
			$SRV_STATUS = "<font style='color: red;'>Offline</font>";
		endif;

		print "<br/><hr/><p align='center'><strong>Status: $SRV_STATUS</strong></p></div>";
		*/
	?>

	<div class="serverContainer">
		<div class="paddingContainer">
			<?php

				$server_settings['title'] = "Server Name"; // Server Name for Display
				$server_settings['ip'] = "185.126.178.41"; // Server IP Adress for Connection
				$server_settings['port'] = "30120"; // Default port might be 30120
				$server_settings['max_slots'] = 64; // Max Player Slots

				$content = json_decode(@file_get_contents("http://".$server_settings['ip'].":".$server_settings['port']."/info.json"), true);
				$serverIcon = $content['icon'];

				if($content):
					$playersCount = @file_get_contents("http://" . $server_settings['ip'] . ":" . $server_settings['port'] . "/players.json"); // Gets players.json from server ip:port.

					$playersCountEdit = json_decode($playersCount, true);
					$playersCountEditCount = count($playersCountEdit); // Counts player name from players.json file.

					$ServerStatus = "<span class='online'> Online </span>"; // If we get content, sets server status to online.

					if($serverIcon){
						print "<div class='align-items: center;'><img width='100' src='data:image/png;base64, $serverIcon' /></div>";
					}

					print " " . $server_settings['title'] . " "; // Prints server title in $server_settings['title']
					print " " . $playersCountEditCount . "/" . $server_settings['max_slots'] . " "; // Prints max and current player.
				else:
					print " " . $server_settings['title'] . " "; 
					$ServerStatus = "<span class='offline'> Offline </span>";
				endif;

				print $ServerStatus;

			?>
		</div>
	</div>
</body>
</html>