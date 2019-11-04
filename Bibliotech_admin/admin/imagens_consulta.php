<?php
session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	//include do header
	include("header.php");
	echo"<title>Consulta Imagens</title>";
	echo"<body>";
	echo "<h1>Imagem dos Livros<br>";
	echo "<a href='imagens_cadastro.php' class='btn btn-primary'>Adicionar Novos Imagem</a>";
	echo "</h1>";
	
	include("conexao.php");
	$sql = "select * from imagem_livro order by id_imagem";
	$resultado = $conexao->query($sql);
		include("conexao.php");
     
		
		$resultado = $conexao->query($sql);
		
		echo "<table class=\"table table-hover\">";
		echo "<tr>";
		echo "	<th width='10%'>ID</th>";
		echo "	<th>Imagem</th>";
		echo "	<th width='10%'>Ativo</th>";
		echo "	<th width='10%'>Excluir</th>";
		echo "	<th width='10%'>Editar</th>";
		echo "</tr>";
		
		while($linha = $resultado->fetch_object())
		{
			echo "<tr>";
			echo "<td>$linha->id_imagem</td>";
			echo "<td><img class=\"img-responsive\" src='".$linha->caminho."' width='160' height='220'></td>";
			echo "<td>$linha->ativo</td>";
			echo "<td><a class='btn btn-danger' href='apaga_imagens.php?id=$linha->id_imagem'>Excluir</a></td>";
			echo "<td><a class='btn btn-warning' href='editar_imagens.php?id=$linha->id_imagem'>Editar</a></td>";
			echo "</tr>";
		}
		
		echo "</table>";
  
   ?>
</div>

</body>
</html>
