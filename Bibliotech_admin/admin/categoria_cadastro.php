<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	include("header.php");
	include("conexao.php");
	
	if(isset($_POST["nome"]))
	{
		$nome         = $_POST["nome"];
		$ativo        = $_POST["ativo"];
		
		$sql = "insert into categoria (nome_categoria,ativo)
				values ('$nome','$ativo');";
		
		$resultado = $conexao->query($sql);
		
		header("location:categoria_consulta.php");
	}

?>
  <title>Cadastro de Categoria</title>
<body>

<div class="container">
  <h2 align="center">Cadastro de Categoria</h2>
  <br>
  <form class="form-horizontal" action="categoria_cadastro.php" method="post">
    
	<div class="form-group">
      <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" placeholder="Informe o nome" name="nome">
    </div>
	
	<div class="form-group">
		<label for="pwd">Ativo</label><br>
		<input type="radio" name="ativo" value="S" checked>Sim <br>
		<input type="radio" name="ativo" value="N" >Não
	  </div>
	
    <br>
    <div class="form-group">        
        <button type="submit" class="btn btn-success">OK</button>
		<a href="categoria_consulta.php" class="btn btn-warning">Voltar</a>
    </div>
  </form>
</div>

</body>
</html>
