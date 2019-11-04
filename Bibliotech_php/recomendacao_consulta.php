<?php
	header("Content-type: text/html;charset=utf-8");
	
	if(isset($_POST['id_recomendacao']))
	{
		$id_recomendacao = $_POST['id_recomendacao'];
		$myObj = new stdClass();
		
		$sql="select * from recomendacao where id_recomendacao='$id_recomendacao'";
		
		include("conexao.php");
		
		$resultado = $conexao->query($sql);
		
		while($linha = $resultado->fetch_object())
		{
			$myObj->id_livro = "$linha->id_livro";
			$myObj->titulo   = "$linha->titulo";
			$myObj->descricao= "$linha->descricao";
			$myObj->nota     = "$linha->nota";
		}
		echo json_encode($myObj);
	}
?>