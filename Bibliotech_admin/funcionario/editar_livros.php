<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	include("conexao.php");
	
	if(isset($_POST['nome']))
	{	
		$id					= $_POST["id"];
		$nome_livro         = $_POST["nome"];
		$nome_autor         = $_POST["autor"];
		$descricao			= $_POST['descricao'];
		$classificacao      = $_POST["classificacao"];
		$valor_livro        = str_replace(',','.',$_POST["valor"]);
		$ativo        		 = $_POST["ativo"];
		
		$sql = "update livros set
				nome_livro = '$nome_livro',
				autor = '$nome_autor',
				descricao = '$descricao',
				classificacao = '$classificacao',
				valor_livro = '$valor_livro',
				ativo ='$ativo'
						where id_livro = '$id';";
		
		$resultado = $conexao->query($sql);
		
		$ultimoID = $id;
		
		$sql_delete="delete from livro_categoria where id_livro='$ultimoID'";
		
		$resultado_delete = $conexao->query($sql_delete);
		
		$contador = $_POST["contador"];
		for($i=0;$i<$contador;$i++)
		{
		    

			    if(isset($_POST["cat_$i"]))
			    {
			    	$categoria = $_POST["cat_$i"];

				    $sql_cat ="insert into livro_categoria (id_livro,id_categoria)
			    	values('$ultimoID','$categoria');";
                    
			    	$resultado = $conexao->query($sql_cat);
			    }
		}
		
		header("location:livros_consulta.php");
	}
	
	
	//include do header
	include("header.php");
	
			    $id_livro = $_GET['id'];
				$sql = "select * from livros where
						id_livro = '$id_livro'";
					
							
				$resultado = $conexao->query($sql);
				
				$linha = $resultado->fetch_object();
				
				$classificao= $linha->classificacao;
				
				$classificao_0_checked = "";
				$classificao_1_checked = "";
				$classificao_2_checked = "";
				$classificao_3_checked = "";
				$classificao_4_checked = "";
				
                if ($classificao == "Livre")
					{
						$classificao_0_checked = "checked";
					}
				if ($classificao == "+12")
					{
						$classificao_1_checked = "checked";
					}
				if ($classificao == "+14")
					{
						$classificao_2_checked = "checked";
					}
				if ($classificao == "+16")
					{
						$classificao_3_checked = "checked";
					}
				if ($classificao == "+18")
					{
						$classificao_4_checked = "checked";
					}
				
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
				
				
?>
	<title>Editar Livros</title>
<body>

<div class="container">
  <h2 align="center">Editar Livros</h2>
  <br>
  <form class="form-horizontal" action="editar_livros.php" method="post">
    
        <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo"$linha->id_livro";?>";>
	
	<div class="form-group">
      <label for="nome">Nome do livro:</label>
        <input type="text" class="form-control" id="nome" placeholder="Informe o nome do livro" name="nome" value="<?php echo"$linha->nome_livro";?>">
    </div>
	
	<div class="form-group">
      <label for="nome">Nome do Autor:</label>
        <input type="text" class="form-control" id="autor" placeholder="Informe o nome do autor" name="autor" value="<?php echo"$linha->autor";?>">
    </div>
	
	<div class="form-group">
		<label for="email">Descrição:</label><br>
		<textarea name="descricao" id="descricao" rows="10" cols="145"><?php echo $linha->descricao ?></textarea>
	  </div>
	
	<div class="form-group">
		<label for="pwd">Classificação:</label><br>
		<input type="radio" name="classificacao" value="Livre"	<?php echo $classificao_0_checked; ?>>Livre
		<input type="radio" name="classificacao" value="+12" 	<?php echo $classificao_1_checked; ?>>+12
		<input type="radio" name="classificacao" value="+14" 	<?php echo $classificao_2_checked; ?>>+14
		<input type="radio" name="classificacao" value="+16" 	<?php echo $classificao_3_checked; ?>>+16
		<input type="radio" name="classificacao" value="+18" 	<?php echo $classificao_4_checked; ?>>+18
	  </div>
	
	<div class="form-group">
      <label for="nome">Valor do Livro:</label>
        <input type="text" class="form-control" id="valor" placeholder="Informe o preço do livro" name="valor" value="<?php echo"$linha->valor_livro";?>">
    </div>
	
	<div class="form-group">
		<label for="pwd">Ativo</label><br>
		<input type="radio" name="ativo" value="S" <?php echo $ativo_0_checked; ?>>Sim <br>
		<input type="radio" name="ativo" value="N" <?php echo $ativo_1_checked; ?>>Não
	  </div>
	  
	  <div class="form-group">
		<label for="pwd">Categoria(s)</label><br>
		<?php
		  $sql= "select * from categoria order by nome_categoria";
		  $contador=0;
		  $resultado = $conexao->query($sql);
		  
		  $sql_livro ="select * from livro_categoria where id_livro = '$linha->id_livro'";
			  $resultado_livro = $conexao->query($sql_livro);
			  while($linha_livro = $resultado_livro->fetch_object())
			  {
				  $categoria_checked = $linha_livro->id_categoria;
				  
				while($linha = $resultado->fetch_object())
				{	
					
					$categoria_BD = $linha->id_categoria;
					
					if($categoria_checked != $categoria_BD)
					{
						echo " <input type=\"checkbox\" name=\"cat_$contador\" value=\"$linha->id_categoria\" > $linha->nome_categoria<br>";
						
					}
					
					if($categoria_checked == $categoria_BD)
					{
						echo " <input type=\"checkbox\" name=\"cat_$contador\" value=\"$linha->id_categoria\" checked> $linha->nome_categoria<br>";
					}
						$contador++;
				}
			  }
		  echo "<input type=\"hidden\" name=\"contador\" value=\"$contador\">";
		?>
		
	  </div>
	  
	
    <br>
    <div class="form-group">        
        <button type="submit" class="btn btn-success">OK</button>
		<a href="livros_consulta.php" class="btn btn-warning">Voltar</a>
    </div>
  </form>
</div>

</body>
</html>
