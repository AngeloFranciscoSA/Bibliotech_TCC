<?php
	if(isset($_POST['id_compra']))
	{
		$id = $_POST['id_compra'];
		
		$sql = "select * from  livro_historico where id_historico ='$id'";
		
		include("conexao.php");
		
		$resultado = $conexao->query($sql);
		
			echo "<table class=\"table table-hover\">";
			echo "<tr>";
			echo "	<th>Livro</th>";
			echo "	<th>Valor do Livro</th>";
			echo "	<th>Autor</th>";
			echo "</tr>";
			
		while($linha = $resultado->fetch_object())
		{
			$sql_livro = "select * from livros where id_livro = '$linha->id_livro'";
			
			$resultado_livro = $conexao->query($sql_livro);
			
			while($linha_livro = $resultado_livro->fetch_object())
			{
				echo "<tr>";
				echo "	<td>$linha_livro->nome_livro</td>";
				echo "	<td>$linha_livro->valor_livro</td>";
				echo "  <td>$linha_livro->autor</td>";
				echo "</tr>";
			}
		}
		echo "<table>";
	}
?>