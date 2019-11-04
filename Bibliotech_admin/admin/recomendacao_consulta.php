<?php
session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	//include do header
	include("header.php");
	echo"<title>Consulta Recomendação</title>";
	echo"<body>";
	echo "<h1>Recomendações<br>";
	echo "</h1>";
	
	include("conexao.php");
	
	$sql = "select * from recomendacao order by id_recomendacao";
	$resultado = $conexao->query($sql);
		
		$resultado = $conexao->query($sql);
		
		echo "<table class=\"table table-hover\">";
		echo "<tr>";
		echo "	<th width='10%'>ID</th>";
		echo "	<th>Livro</th>";
		echo "	<th width='10%'>Titulo</th>";
		echo "	<th>Descricao</th>";
		echo "	<th width='10%'>Nota</th>";
		echo "	<th width='10%'>Excluir</th>";
		echo "	<th width='10%'>Editar</th>";
		echo "</tr>";
		
		while($linha = $resultado->fetch_object())
		{
			$sql_livro = "select * from livros where id_livro ='$linha->id_livro'";
			
			$resultado_livro = $conexao->query($sql_livro);
			
			while($linha_livro = $resultado_livro->fetch_object())
			{
				echo "<tr>";
				echo "	<td>$linha->id_recomendacao</td>";
				echo "	<td>$linha_livro->nome_livro</td>";
				echo "	<td>$linha->titulo</td>";
				echo "	<td>$linha->descricao</td>";
				echo "	<td>$linha->nota</td>";
				echo "<td><a class='btn btn-danger' href='apaga_recomendacao.php?id=$linha->id_recomendacao'>Excluir</a></td>";
				echo "<td><a class='btn btn-warning' href='editar_recomendacao.php?id=$linha->id_recomendacao'>Editar</a></td>";
				echo "</tr>";
			}
		}
		
		echo "</table>";
  
   ?>
</div>

</body>
</html>
