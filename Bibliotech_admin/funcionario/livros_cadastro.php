<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	include "header.php";
 
    include("conexao.php");
	
	if(isset($_POST["nome"]))
	{
		$nome_livro         = utf8_encode($_POST["nome"]);
		$nome_autor         = utf8_encode($_POST["autor"]);
		$descricao			= utf8_encode($_POST['descricao']);
		$classificacao      = $_POST["classificacao"];
		$valor_livro        = str_replace(',','.',$_POST["valor"]);
		$ativo        		 = $_POST["ativo"];
		
		$sql = "insert into livros (nome_livro,autor, descricao, classificacao, valor_livro, ativo)
				values ('$nome_livro','$nome_autor','$descricao','$classificacao','$valor_livro','$ativo');";
		
		$resultado = $conexao->query($sql);
		
		$ultimoID = mysqli_insert_id($conexao); 
		/*
			pegar o ultimo ID gerado
			
			
		*/
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

?>
  <title>Cadastro de Livros</title>
<body>

<div class="container">
  <h2 align="center">Cadastro de Livros</h2>
  <br>
  <form class="form-horizontal" action="livros_cadastro.php" method="post">
    
	<div class="form-group">
      <label for="nome">Nome do livro:</label>
        <input type="text" class="form-control" id="nome" placeholder="Informe o nome do livro" name="nome" required>
    </div>
	
	<div class="form-group">
      <label for="nome">Nome do Autor:</label>
        <input type="text" class="form-control" id="autor" placeholder="Informe o nome do autor" name="autor" required>
    </div>
	
	<div class="form-group">
		<label for="email">Descrição:</label><br>
		<textarea name="descricao" id="descricao" rows="10" cols="145"></textarea>
	  </div>
	
	<div class="form-group">
		<label for="pwd">Classificação:</label><br>
		<input type="radio" name="classificacao" value="Livre" checked>Livre
		<input type="radio" name="classificacao" value="+12" >+12
		<input type="radio" name="classificacao" value="+14" >+14
		<input type="radio" name="classificacao" value="+16" >+16
		<input type="radio" name="classificacao" value="+18" >+18
	  </div>
	
	<div class="form-group">
      <label for="nome">Valor do Livro:</label>
        <input type="text" class="form-control" id="valor" placeholder="Informe o preço do livro" name="valor" required>
    </div>
	
	<div class="form-group">
		<label for="pwd">Ativo</label><br>
		<input type="radio" name="ativo" value="S" checked>Sim <br>
		<input type="radio" name="ativo" value="N" >Não
	  </div>
	  
	  <div class="form-group">
		<label for="pwd">Categoria(s)</label><br>
		<?php
		  $sql= "select * from categoria order by nome_categoria";
		  $contador=0;
		  $resultado = $conexao->query($sql);
		  while($linha = $resultado->fetch_object())
		  {
			 echo " <input type=\"checkbox\" name=\"cat_$contador\" value=\"$linha->id_categoria\"> $linha->nome_categoria<br>";
			 $contador++;
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
