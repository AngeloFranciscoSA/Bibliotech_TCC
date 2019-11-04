<?php
session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	//include do header
	include("header.php");
	echo"<title>Consulta Categorias</title>";
	echo"<body>";
	echo "<h1>Categorias <br>";
	echo "<a href='categoria_cadastro.php' class='btn btn-primary'>Adicionar Nova Categoria</a>";
	echo "</h1>";
	
	include("conexao.php");
	$sql = "select * from categorias order by id_categoria, nome_categoria, ativo";
	$resultado = $conexao->query($sql);
		include("conexao.php");
        $sql = "select * from categoria order by id_categoria";
		
		$resultado = $conexao->query($sql);
		
		echo "<table class=\"table table-hover\">";
		echo "<tr>";
		echo "	<th width='10%'>ID</th>";
		echo "	<th>Nome</th>";
		echo "	<th width='10%'>Ativo</th>";
		echo "	<th width='10%'>Excluir</th>";
		echo "	<th width='10%'>Editar</th>";
		echo "</tr>";
		
		while($linha = $resultado->fetch_object())
		{
			echo "<tr>";
			echo "	<td>$linha->id_categoria</td>";
			echo "	<td>$linha->nome_categoria</td>";
			echo "	<td>$linha->ativo</td>";
			echo "<td><a class='btn btn-danger' href='apaga_categoria.php?id=$linha->id_categoria'>Excluir</a></td>";
			echo "<td><a class='btn btn-warning' href='editar_categoria.php?id=$linha->id_categoria'>Editar</a></td>";
			echo "</tr>";
		}
		
		echo "</table>";
  
   ?>
</div>

</body>
</html>
