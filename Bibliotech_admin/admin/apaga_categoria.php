<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	if(isset($_GET['id']))
	{
		$id_categoria = $_GET['id'];
		
		$sql = "delete from categoria where id_categoria='$id_categoria'";
		
		include("conexao.php");
		$conexao->query($sql);
	}
	header("location:categoria_consulta.php");
?>