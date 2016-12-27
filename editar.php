<?php
	$json_file = file_get_contents("agenda.json");
	$json = json_decode($json_file, true);

	$tarefa = $_POST["tarefa"];
	$new_tarefa = $_POST["new-tarefa"];
	$json_size = count($json);

	for($i=0; $i<count($json); $i++){
		if($json[$i]["tarefa"] == $tarefa){
			$json[$i]["tarefa"] = $new_tarefa;
		}
	}

	//print_r($json);

	file_put_contents("agenda.json", json_encode($json));
	header("Location:index.php");

?>