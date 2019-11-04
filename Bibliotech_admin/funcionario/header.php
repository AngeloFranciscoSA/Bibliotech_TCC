<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="inicio.php">Home</a></li>
      <li><a href="livros_consulta.php">Livros</a></li>
      <li><a href="imagens_consulta.php">Imagens</a></li>
      <li><a href="recomendacao_consulta.php">Recomendações</a></li>
    </ul>
	
	<ul class="nav navbar-nav navbar-right">
        <li><a href=""><span class="glyphicon glyphicon-user"></span> 
		<?php echo $_SESSION['nome_funcionario'];?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
      </ul>
  </div>
</nav>
 
