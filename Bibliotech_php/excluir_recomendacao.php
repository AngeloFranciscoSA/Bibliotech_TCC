<?php
	if(isset($_POST['id']))
	{
		$id = $_POST['id'];
		
		$sql = "delete from recomendacao where id_recomendacao = '$id'";
		echo"$sql";
		include("conexao.php");
		
		$conexao->query($sql);
		echo"Excluido com Sucesso";
	}
	else
	{
		echo"erro";
	}
?>