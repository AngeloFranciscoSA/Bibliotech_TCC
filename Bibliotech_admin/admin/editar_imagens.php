<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	include("conexao.php");
	
	if(isset($_POST["id_imagem"]))
	{	
		$id		 			 = $_POST["id_imagem"];
		$id_livro			 = $_POST["id_livro"];
		$imagem 			 = $_POST["imagem"];
		$ativo        		 = $_POST["ativo"];	
		
		$sql = "update imagem_livro set
						id_livro = '$id_livro',
						caminho  = '$imagem',
						ativo    = '$ativo'  
									where id_imagem = '$id'";
		
		$resultado = $conexao->query($sql);
		
		
		header("location:imagens_consulta.php");
	}
	
		include("header.php");
		
		$id_imagem = $_GET['id'];
		
				$sql = "select * from imagem_livro where
						id_imagem = '$id_imagem'";
				
				
							
				$resultado = $conexao->query($sql);
				
				$linha = $resultado->fetch_object();
				
				$ativo = $linha->ativo;
				
				$ativo_0_checked = "";
				$ativo_1_checked = "";
				
				if($ativo == "S")
				{
					$ativo_0_checked = "checked";
				}
				if($ativo == "N")
				{
					$ativo_1_checked = "checked";
				}
	
				$caminho = $linha->caminho;
				
?>
  <title>Editar imagem do livro</title>
<body>
							 
<div class="container">
  <h2 align="center">Editar imagem do livro</h2>
  <br>
  <form class="form-horizontal" action="editar_imagens.php" method="post">
		
		<?php
				 
		include("conexao.php");
			
			$sql_livro="select * from livros
					where ativo='S'
					order by id_livro";
					
			$resultado_livro = $conexao->query($sql_livro);
			
		echo"<div class=\"form-group\">
				<label for=\"livros\">Livros:</label>
				<select class=\"form-control\" name='id_livro' id='id_livro'>";
		while($linha_livro = $resultado_livro->fetch_object())
		{
				
				echo"<option value='$linha_livro->id_livro'>$linha_livro->nome_livro</option>";
			
		}
		echo"</select>
			 </div>";
		?>
		
		<br>
		<input type="hidden" class="form-control" id="id_imagem"  name="id_imagem" value="<?php echo"$linha->id_imagem";?>";>
		
		<div class="form-group">
			<label for="imagem">Upload da Imagem</label>
			<br>
			<label style="font-size: 12px;">Recomendado utilizar imgur. (ex: https://i.imgur.com/KrxXhMQ.jpg)</label>
			<input type="text" name="imagem" class="form-control form-input form-style-base" placeholder="Informe a url da imagem">
		</div>
		
	<br>
	
		<div class="form-group">
			<label for="caminho">Caminho da Imagem atual:</label>
			<input type="text" class="form-control"	id="caminho" disabled value="<?php echo"$caminho";?>">
		</div>
		
	<br>
	
		<?php
			echo"<div class=\"form-group\">
				 <label for=\"livros\">Imagem atual:</label>";
			echo"<img src=\"$caminho\"; class=\"img-responsive\" width=\"180\" height=\"90\"\>";
			echo"</div>";
		?>
	<br>
	
		<div class="form-group">
			<label for="pwd">Ativo</label><br>
			<input type="radio" name="ativo" value="S" <?php echo"$ativo_0_checked";?>>Sim <br>
			<input type="radio" name="ativo" value="N" <?php echo"$ativo_1_checked";?>>Não
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
