<?php
	$json_file = file_get_contents("data/agenda.json");
	$json = json_decode($json_file, true);

	$id = $_POST["id"];
	$json_size = count($json);

	for($i=0; $i<count($json); $i++){
		if($json[$i]["id"] == $id){
			$json[$i]["feita"] = true;
		}
	}

	//print_r($json);

	file_put_contents("data/agenda.json", json_encode($json, JSON_PRETTY_PRINT));
	header("Location:index.php");

?>