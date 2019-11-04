<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	include "header.php";
 
    include("conexao.php");
	
	if(isset($_POST["id_livro"]))
	{
		$id_livro			 = $_POST["id_livro"];
		$imagem 			 = $_POST["imagem"];
		$ativo        		 = $_POST["ativo"];						
						
		$sql = "insert into imagem_livro (id_livro,caminho,ativo)  
				values ('$id_livro','$imagem','$ativo')";
		
		$resultado = $conexao->query($sql);
		
		
		
		header("location:imagens_consulta.php");
	}

?>
  <title>Cadastro de Imagens</title>
<body>
							 
<div class="container">
  <h2 align="center">Cadastro de Imagens</h2>
  <br>
  <form class="form-horizontal" action="imagens_cadastro.php" method="post">
		
		<?php
		include("conexao.php");
			
			$sql="select * from livros
					where ativo='s'
					order by id_livro";
					
			$resultado = $conexao->query($sql);
			
		echo"<div class=\"form-group\">
				<label for=\"livros\">Livros:</label>
				<select class=\"form-control\" id='id_livro' name='id_livro'>";
		while($linha = $resultado->fetch_object())
		{
				
				echo"<option value='$linha->id_livro'>$linha->nome_livro</option>";
			
		}
		echo"</select>
			 </div>";
		?>
		
		<br>
		
		<div class="form-group">
			<label for="imagem">Upload da Imagem</label>
			<br>
			<label style="font-size: 12px;">Recomendado utilizar imgur. (ex: https://i.imgur.com/KrxXhMQ.jpg)</label>
			<input type="text" name="imagem" class="form-control form-input form-style-base" placeholder="Informe a url da imagem">
		</div>
	
	<br>
	
		<div class="form-group">
			<label for="pwd">Ativo</label><br>
			<input type="radio" name="ativo" value="S" checked>Sim <br>
			<input type="radio" name="ativo" value="N" >Não
		</div>

    <br>
    <div class="form-group">        
        <button type="submit" class="btn btn-success">OK</button>
		<a href="imagens_consulta.php" class="btn btn-warning">Voltar</a>
    </div>
  </form>
</div>

</body>
</html>
