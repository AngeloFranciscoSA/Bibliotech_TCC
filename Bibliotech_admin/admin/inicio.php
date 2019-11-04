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
			<h1 style="text-align: center">O Portal Do Administrador</h1>      
			<p>Neste local, você poderá gerenciar todo site.</p>
		</div>';
?>
</body>
</html>