<?php
	if(isset($_POST['id_recomendacao']))
	{
		
		$id_recomendacao = $_POST['id_recomendacao'];
		$id_livro 		 = $_POST['id_livro'];
		$titulo 		 = $_POST['titulo'];
		$descricao  	 = $_POST['descricao'];
		$nota    		 = $_POST['nota'];
		
		$sql ="update recomendacao
				set id_livro = '$id_livro',
					titulo   = '$titulo',
					descricao= '$descricao',
					nota 	 = '$nota'
					where id_recomendacao ='$id_recomendacao'";
					
		echo"$sql";
		
		include("conexao.php");
		
		$conexao->query($sql);
	}
?>