<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	if(isset($_GET['id']))
	{
		$id_livro = $_GET['id'];
		
		$sql_delCat = "delete from livro_categoria where id_livro='$id_livro'";
		$sql_delLiv = "delete from livros where id_livro='$id_livro'";
		
		include("conexao.php");
		$conexao->query($sql_delCat);
		$conexao->query($sql_delLiv);
	}
	header("location:livros_consulta.php");
?>