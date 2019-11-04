<?php
	if(isset($_POST['id_cat']))
	{
		$id_cat = $_POST['id_cat'];
		
		$sql_cat = "select * from livro_categoria where id_categoria ='$id_cat'";
		include("conexao.php");
		
		$resultado_cat = $conexao->query($sql_cat);
		
		while($linha_cat = $resultado_cat->fetch_object())
		{
			$sql = "select * from livros where id_livro='$linha_cat->id_livro'";
		
			$resultado = $conexao->query($sql);
			
		echo "<table class=\"table table-hover\">";
		while($linha = $resultado->fetch_object())
		{
			$sql_foto = "select * from imagem_livro where id_livro ='$linha->id_livro'";
			$resultado_foto = $conexao->query($sql_foto);
			
			while($linha_foto = $resultado_foto->fetch_object())
			{
				echo "<tr>";
				echo "<td>
					<img class='img-fluid' src='".$linha_foto->caminho."' width='360' height='480'>
					<h3 style='font-weight: bold;'>".$linha->nome_livro."</h3><br>
					<h4>Preço: R$ $linha->valor_livro </h4>";
				echo"<h4>Autor: $linha->autor</h4>
					 <h4>Classificação: $linha->classificacao</h4>";
				echo"<button class='btn btn-primary btn_compra' valor=\"$linha->id_livro\">Comprar</button>";
				echo"<button class='btn btn-warning btn_sinopse' id_livro=\"$linha->id_livro\">Sinopse</button>";
				echo"</td>";
				echo "</tr>";
			}
		}
		echo "<table>";
		}
	}
?>