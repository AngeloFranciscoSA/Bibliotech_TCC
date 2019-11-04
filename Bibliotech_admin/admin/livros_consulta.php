<?php
session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	//include do header
	include("header.php");
	echo"<title>Consulta Livros</title>";
	echo"<body>";
	echo "<h1>Livros<br>";
	echo "<a href='livros_cadastro.php' class='btn btn-primary'>Adicionar Novos Livros</a>";
	echo "</h1>";
	
	include("conexao.php");
	$resultado = $conexao->query($sql);
		include("conexao.php");
        $sql = "select * from livros order by id_livro";
		
		$resultado = $conexao->query($sql);
		
		echo "<table class=\"table table-hover\">";
		echo "<tr>";
		echo "	<th width='10%'>ID</th>";
		echo "	<th>Nome</th>";
		echo "	<th>Autor</th>";
		echo "	<th width='10%'>Classificação</th>";
		echo "	<th width='10%'>Valor do Livro</th>";
		echo "	<th width='10%'>Ativo</th>";
		echo "	<th width='10%'>Excluir</th>";
		echo "	<th width='10%'>Editar</th>";
		echo "</tr>";
		
		while($linha = $resultado->fetch_object())
		{
			echo "<tr>";
			echo "	<td>$linha->id_livro</td>";
			echo "	<td>$linha->nome_livro</td>";
			echo "	<td>$linha->autor</td>";
			echo "	<td>$linha->classificacao</td>";
			echo "	<td>$linha->valor_livro</td>";
			echo "	<td>$linha->ativo</td>";
			echo "<td><a class='btn btn-danger' href='apaga_livros.php?id=$linha->id_livro'>Excluir</a></td>";
			echo "<td><a class='btn btn-warning' href='editar_livros.php?id=$linha->id_livro'>Editar</a></td>";
			echo "</tr>";
		}
		
		echo "</table>";
  
   ?>
</div>

</body>
</html>
