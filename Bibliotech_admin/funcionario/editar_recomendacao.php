<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	include("conexao.php");
	
	if(isset($_POST['id']))
	{
		$id 		= $_POST['id'];
		$livro 		= $_POST['id_livro'];
		$titulo 	= $_POST['titulo'];
		$descricao	= $_POST['descricao'];
		$nota 		= $_POST['nota'];
		
		$sql = "update recomendacao
						set id_livro ='$livro',
							titulo ='$titulo',
							descricao ='$descricao',
							nota ='$nota'
						
						where id_recomendacao ='$id'";
		
		include("../conexao.php");
		$conexao->query($sql);
		
		header("location:recomendacao_consulta.php");
	}
	
	
	//include do header
	include("header.php");
	
			    $id = $_GET['id'];
				$sql = "select * from recomendacao where
						id_recomendacao = '$id'";
					
							
				$resultado = $conexao->query($sql);
				
				$linha = $resultado->fetch_object();
				
				$nota = $linha->nota;
				
				$nota_1 = "";
				$nota_2 = "";
				$nota_3 = "";
				$nota_4 = "";
				$nota_5 = "";
				
				if($nota == "1")
				{
					$nota_1 = "selected";
				}
				if($nota == "2")
				{
					$nota_2 = "selected";
				}
				if($nota == "3")
				{
					$nota_3 = "selected";
				}
				if($nota == "4")
				{
					$nota_4 = "selected";
				}
				if($nota == "5")
				{
					$nota_5	= "selected";
				}
?>
<title>Editar Recomendação</title>
	<body>
<div class="container">
	<h1>Editar Recomendação</h1>
	
	<form action="editar_recomendacao.php" method="post">
	
        <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo"$linha->id_recomendacao";?>"; >
	<div class="form-group">
		<label for="email">Livros:</label>
	<?php
	
		$sql_livro = "select * from livros where ativo='S' order by id_livro";
      
		$resultado_livro = $conexao->query($sql_livro);
		
		echo"<select class='form-control' id='id_livro' name='id_livro'>";
		
		while($linha_livro = $resultado_livro->fetch_object())
		{	
			echo "<option value='$linha_livro->id_livro'>$linha_livro->nome_livro</option>";
		}
		echo"</select>";
		
	?>
	</div>
	
	  <div class="form-group">
		<label for="email">Titulo:</label>
		<input type="text" class="form-control" name="titulo" id="titulo" required value="<?php echo"$linha->titulo";?>";>
	  </div>
	  
	  <div class="form-group">
		<label for="email">Descrição:</label><br>
		<textarea name="descricao" id="descricao" rows="10" cols="145"><?php echo $linha->descricao ?></textarea>
	  </div>
	  
	  <div class="form-group">
		<label for="livros">Nota:</label>
			<select class="form-control" id="nota" name="nota">
				<option value='1' <?php echo $nota_1;?> >1</option>
				<option value='2' <?php echo $nota_2;?>>2</option>
				<option value='3  <?php echo $nota_3;?>'>3</option>
				<option value='4' <?php echo $nota_4;?>>4</option>
				<option value='5' <?php echo $nota_5;?>>5</option>
			</select>
	  </div>
	 
	  
	  <button type="submit" class="btn btn-success">Confirma</button>
	  <a href="recomendacao_consulta.php" class="btn btn-warning">Voltar</a>
	</form>
</div>
</body>
</html>