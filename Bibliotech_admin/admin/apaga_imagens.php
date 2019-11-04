<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	if(isset($_GET['id']))
	{
		$id_imagem= $_GET['id'];
		
		$sql = "delete from imagem_livro where id_imagem='$id_imagem'";

		include("conexao.php");
		$conexao->query($sql);
	}
	header("location:imagens_consulta.php");
?>