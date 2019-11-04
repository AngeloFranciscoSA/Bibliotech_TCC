<?php
	if(isset($_POST['id_usuario']))
	{
		$id_usuario = $_POST['id_usuario'];
		
		$sql = "select * from recomendacao where id_usuario = '$id_usuario'";
		
		include("conexao.php");
		
		$resultado = $conexao->query($sql);
		echo "<table class=\"table table-hover\">";
		while($linha = $resultado->fetch_object())
		{
		    $sql_livro = "select * from livros where id_livro = '$linha->id_livro'";
		    $resultado_livro = $conexao->query($sql_livro);
		    
		    while($linha_livro = $resultado_livro->fetch_object())
		    {
				echo "<tr>";
				echo "<h2 style='font-weight: bold; text-align: center'>$linha->titulo</h2>";
				echo "<td><h3 style='text-align: justify;'>".$linha->descricao."</h3><br>";
				echo "<h5 style='text-align: right; '>Nota: $linha->nota/5 </h5>
				      <h5 style='text-align: right; '>Livro: $linha_livro->nome_livro </h5>";
				echo"<button class='btn btn-primary btn_editar'  style=\"float: center;\"id_recomendacao=\"$linha->id_recomendacao\">Editar</button>
					 <button class='btn btn-primary btn_excluir' style=\"float: center;\" id=\"$linha->id_recomendacao\">Excluir</button>";
				echo"</td>";
				echo "</tr>";
		    }
		}
		echo "<table>";
	}
?>