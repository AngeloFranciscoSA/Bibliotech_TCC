<?php
	if(isset($_POST['id_livro']))
	{
		$id_livro = $_POST['id_livro'];
		
		$sql = "select * from livros where id_livro ='$id_livro'";
		
		include("conexao.php");
		
		$resultado = $conexao->query($sql);
		$linha = $resultado->fetch_object();
		
		echo"<h1 style='text-align: center;'>Sinopse do $linha->nome_livro</h1>";
		echo"<ptext-align: justify;>$linha->descricao</p>";
		
	}
?>