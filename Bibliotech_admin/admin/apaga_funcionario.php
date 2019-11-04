<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	if(isset($_GET['id']))
	{
		$id_funcionario= $_GET['id'];
		
		$sql = "delete from funcionario where id_funcionario='$id_funcionario'";

		include("conexao.php");
		
		$conexao->query($sql);
	}
	header("location:consulta_funcionarios.php");
?>