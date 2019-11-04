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
		$email 		  = $_POST['email'];
		$login		  = $_POST['login'];
		$senha	 	  = md5($_POST['senha']);
		$sexo		  = $_POST['sexo'];
		$ativo        = $_POST["ativo"];
		
		$sql = "insert into funcionario (nome_funcionario,email_funcionario,login_funcionario,senha_funcionario,sexo_funcionario,ativo)
				values ('$nome','$email','$login','$senha','$sexo','$ativo')";
			
			echo"$sql";
		$resultado = $conexao->query($sql);
		
		header("location:consulta_funcionarios.php");
	}

?>
  <title>Cadastro de Funcionários</title>
<body>

<div class="container">
  <h2 align="center">Cadastro de Funcionários</h2>
  <br>
  <form class="form-horizontal" action="funcionarios_cadastro.php" method="post">
    
	<div class="form-group">
      <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" placeholder="Informe o nome" name="nome">
    </div>
	
	<div class="form-group">
      <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" placeholder="Informe o email" name="email">
    </div>
	
	<div class="form-group">
      <label for="nome">Login:</label>
        <input type="text" class="form-control" id="login" placeholder="Informe o login" name="login">
    </div>
	
	<div class="form-group">
      <label for="nome">Senha:</label>
        <input type="password" class="form-control" id="senha" placeholder="Informe uma senha">
    </div>
	
	<div class="form-group">
	<label for="pwd">Sexo:</label><br>
		<input type="radio" name="sexo" value="M" checked>Masculino
		<input type="radio" name="sexo" value="F" >Feminino
    </div>
	
	<div class="form-group">
		<label for="pwd">Ativo:</label><br>
		<input type="radio" name="ativo" value="Ativo" checked>Sim
		<input type="radio" name="ativo" value="Bloqueado" >Não
	</div>
	
    <br>
    <div class="form-group">        
        <button type="submit" class="btn btn-success">Cadastrar</button>
		<a href="consulta_funcionarios.php" class="btn btn-warning">Voltar</a>
    </div>
  </form>
</div>

</body>
</html>
