<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	//include do header
	include("header.php");
	echo"<title>Home</title>";
	echo"<body>";
	echo '<div class="container">
			<div class="jumbotron">
			<h1 style="text-align: center">O Portal Do Funcionário</h1>      
			<p>Neste local, você poderá adcionar os livros, imagens e ver as recomendações.</p>
		</div>';
?>
</body>
</html>