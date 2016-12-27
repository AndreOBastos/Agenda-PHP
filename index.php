<?php
	$json_file = file_get_contents("agenda.json");
	$json = json_decode($json_file, true);
?>

<html>
	<head>
		<title>
			Agenda JSON
		</title>
		<script
			src="https://code.jquery.com/jquery-3.1.1.js"
			integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
			crossorigin="anonymous">
		</script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/agenda.js"></script>
		<link rel="stylesheet" type="text/css" href="css/agenda.css">
	</head>
	<body>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form id="form-adicionar" class="form" action="adicionar.php" method="POST">
					<div class="form-group">
						<label for="Tarefa">Adicionar Tarefa:</label><br>
						<input class="form-control" type="text" name="tarefa">
					</div>
					<button class="btn btn-primary" type="submit">Adicionar</button>
				</form>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<?php
					for($i=0; $i<count($json); $i++){
				?>
					<div class="row">
						<div class=<?php if($json[$i]["feita"] == true){ echo "'tarefa alert alert-success col-md-7'";} else {echo "'tarefa alert alert-danger col-md-7'";}?>>
							<?php echo $json[$i]["tarefa"] ?>
							<div class="float-right">
								<form action="remover.php" method="POST">
									<input type="hidden" name="tarefa" value=<?php echo "'".$json[$i]["tarefa"]."'" ?>>
									<button class=<?php if($json[$i]["feita"] == true){ echo "'btn-success'";} else {echo "'btn-danger'";}?> type="submit">Remover</button>
								</form>
								<?php if($json[$i]["feita"] == false){ ?>
									<form action="completar.php" method="POST">
										<input type="hidden" name="tarefa" value=<?php echo "'".$json[$i]["tarefa"]."'" ?>>
										<button class="btn-danger" type="submit">Completar</button>
									</form>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-5">
							<button class="btn btn-primary" id="botao-editar">Editar</button>
							<form id="form-editar" class="form" action="editar.php" method="POST" style="display: none">
								<div class="form-group">
									<input type="hidden" name="tarefa" value=<?php echo "'".$json[$i]["tarefa"]."'" ?>>
									<label for="new-tarefa">Nova Descrição:</label><br>
									<input type="text" name="new-tarefa"><br>
								</div>
								<button class="btn btn-primary" type="submit">Editar Tarefa</button>
							</form>
						</div><br>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</body>
</html>