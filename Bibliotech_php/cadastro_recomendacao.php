<?php
	if(isset($_POST['id_usuario']) && isset($_POST['id_livro']))
	{
		$id_usuario = $_POST['id_usuario'];
		$id_livro = $_POST['id_livro'];
		$titulo = $_POST['titulo'];
		$descricao = $_POST['descricao'];
		$nota = $_POST['nota'];
		
		$sql = "insert into recomendacao (id_usuario,id_livro,titulo,descricao,nota)
				values('$id_usuario','$id_livro','$titulo','$descricao','$nota')";
		

		include("conexao.php");
		
		$resultado = $conexao->query($sql);
		
	}
?>