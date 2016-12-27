<?php
	$json_file = file_get_contents("data/agenda.json");
	$json = json_decode($json_file, true);
?>

<html lang="pt">
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
		<div class="row form-adicionar">
			<div class="col-md-4 col-md-offset-4 card">
				<form class="form card-block" action="adicionar.php" method="POST">
					<div class="form-group">
						<label for="Tarefa">Adicionar Tarefa:</label><br>
						<input class="form-control" type="text" name="tarefa" required>
					</div>
					<button class="btn btn-primary" type="submit">Adicionar</button>
				</form>
			</div>
		</div>
		<h3 class="text-muted text-center"> - Lista de Tarefas - </h3>
		<div class="row lista-tarefas">
			<div class="col-md-8 col-md-offset-2">
				<?php
					for($i=0; $i<count($json); $i++){
				?>
					<div class="row tarefa-container">
						<div class=<?php if($json[$i]["feita"] == true){ echo "'tarefa alert alert-success col-md-7'";} else {echo "'tarefa alert alert-danger col-md-7'";}?>>
							<div class="row">
								<div class="col-md-9">
									<?php echo $json[$i]["tarefa"] ?>
								</div>
							
								<div class="col-md-3 text-center">
									<form action="remover.php" method="POST">
										<input type="hidden" name="id" value=<?php echo "'".$json[$i]["id"]."'" ?>>
										<button class=<?php if($json[$i]["feita"] == true){ echo "'btn-success'";} else {echo "'btn-danger'";}?> type="submit">Remover</button>
									</form>
									<?php if($json[$i]["feita"] == false){ ?>
										<form action="completar.php" method="POST">
											<input type="hidden" name="id" value=<?php echo "'".$json[$i]["id"]."'" ?>>
											<button class="btn-danger" type="submit">Completar</button>
										</form>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-md-4 secao-edicao">
							<button class="btn btn-primary" id="botao-editar">Editar</button>
							<form id="form-editar" class="form" action="editar.php" method="POST" style="display: none">
								<div class="form-group">
									<input type="hidden" name="id" value=<?php echo "'".$json[$i]["id"]."'" ?>>
									<label for="new-tarefa">Nova Descrição:</label><br>
									<input type="text" name="new-tarefa" required><br>
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