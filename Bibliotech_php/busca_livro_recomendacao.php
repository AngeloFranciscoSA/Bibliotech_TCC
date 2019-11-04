<?php
	if(isset($_POST['id_livro']))
	{
		
		$id_livro = $_POST['id_livro'];
		
		$sql = "select * from recomendacao where id_livro ='$id_livro'";
		
		include("conexao.php");
		
		$resultado = $conexao->query($sql);
		
		
		
		 echo "<table class=\"table table-hover\">";
		while($linha = $resultado->fetch_object())
		{
			$sql_usuario = "select * from usuario where id_usuario = '$linha->id_usuario'";
			
			$resultado_usuario = $conexao->query($sql_usuario);
			
			while($linha_usuario = $resultado_usuario->fetch_object())
			{
				echo "<tr>";
				echo "";
				echo "<td><h2 style='font-weight: bold;'>$linha->titulo</h2>
				 <h4 style='text-align: justify;'>Descrição: <br><br>".$linha->descricao."</h34><br>";
				echo "<h5 style='text-align: right; '>Nota: $linha->nota/5 
					 <h5 style='text-align: right;'>Criado por: $linha_usuario->nome_usuario</h5>";
				echo"</td>";
				echo "</tr>";
			}
		}
		echo "<table>";
	}
?>