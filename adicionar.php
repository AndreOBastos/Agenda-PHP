<?php
	$json_file = file_get_contents("data/agenda.json");
	$json = json_decode($json_file, true);

	$tarefa = $_POST["tarefa"];
	$json_size = count($json);

	$json[$json_size]["tarefa"] = $tarefa;
	$json[$json_size]["feita"] = false;
	$json[$json_size]["id"] = rand();

	file_put_contents("data/agenda.json", json_encode($json, JSON_PRETTY_PRINT));

	header("Location:index.php");
?>