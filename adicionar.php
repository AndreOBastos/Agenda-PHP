<?php
	$json_file = file_get_contents("agenda.json");
	$json = json_decode($json_file, true);

	$tarefa = $_POST["tarefa"];
	$json_size = count($json);

	$json[$json_size]["tarefa"] = $tarefa;
	$json[$json_size]["feita"] = false;

	file_put_contents("agenda.json", json_encode($json));

	header("Location:index.php");
?>