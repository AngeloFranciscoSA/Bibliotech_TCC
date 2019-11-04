<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	if(isset($_GET['id']))
	{
		$id_usuario = $_GET['id'];
		
		$sql = "delete from usuario where id_usuario='$id_usuario'";
		
		include("conexao.php");
		$conexao->query($sql);
	}
	header("location:usuario_consulta.php");
?>