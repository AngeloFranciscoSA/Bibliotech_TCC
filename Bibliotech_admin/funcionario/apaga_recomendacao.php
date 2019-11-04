<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	if(isset($_GET['id']))
	{
		$id= $_GET['id'];
		
		$sql = "delete from recomendacao where id_recomendacao='$id'";
		
		include("conexao.php");
		$conexao->query($sql);
	}
	header("location:recomendacao_consulta.php");
?>