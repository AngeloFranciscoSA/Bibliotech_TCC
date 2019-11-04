<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	include("header.php");
	include("conexao.php");
	
	$id = $_GET['id'];
	
	$sql = "select * from funcionario where id_funcionario='$id'";
	
	$resultado = $conexao->query($sql);
	
	$linha = $resultado->fetch_object();
	
	
	if(isset($_POST["id"]))
	{
		$id_funcionario= $_POST["id"];
		$nome         = $_POST["nome"];
		$email 		  = $_POST['email'];
		$login		  = $_POST['login'];
		$senha 		  = $_POST['senha'];
		
		$sql_consulta = "select * from funcionario where id_funcionario='$id_funcionario'";
		
		$resultado_consulta = $conexao->query($sql_consulta);
		
		$linha_consulta = $resultado_consulta->fetch_object();
		
		$senhaBD = $linha_consulta->senha_funcionario;
		
		if($senha == $senhaBD)
		{
			$senha_nova = $_POST['senha'];
			
		}
		if($senha != $senhaBD)
		{
			$senha_nova = md5($_POST['senha']);
		}
		
		$sexo		  = $_POST['sexo'];
		$ativo        = $_POST["ativo"];
		
		$sql_update = "update funcionario set
				nome_funcionario 	= '$nome',
				email_funcionario	= '$email',
				login_funcionario	= '$login',
				senha_funcionario	= '$senha_nova',
				sexo_funcionario	= '$sexo',
				ativo				= '$ativo'
					where id_funcionario = '$id_funcionario'";
				
		
		$resultado = $conexao->query($sql_update);
		
		header("location:consulta_funcionarios.php");
	}
	
	
	
	$ativo= $linha->ativo;
				
	$ativo_0_checked = "";
	$ativo_1_checked = "";
	
    if ($ativo == "Ativo")
	{
		$ativo_0_checked = "checked";
	}
	if ($ativo == "Bloqueado")
	{
		$ativo_1_checked = "checked";
	}
	
	$sexo = $linha->sexo_funcionario;
	
	$sexo_0_checked = "";
	$sexo_1_checked = "";
	
	if($sexo == "M")
	{
		$sexo_0_checked = "checked";
	}
	if($sexo == "F")
	{
		$sexo_1_checked = "checked";
	}
	
?>
  <title>Editar Funcionário</title>
<body>

<div class="container">
  <h2 align="center">Editar Funcionário</h2>
  <br>
  <form class="form-horizontal" action="editar_funcionario.php" method="post">
  
	<input type="hidden" class="form-control" id="id"  name="id" value="<?php echo"$linha->id_funcionario";?>"; >
 
	<div class="form-group">
      <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" placeholder="Informe o nome" name="nome" value="<?php echo"$linha->nome_funcionario";?>";>
    </div>
	
	<div class="form-group">
      <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" placeholder="Informe o email" name="email" value="<?php echo"$linha->email_funcionario";?>";>
    </div>
	
	<div class="form-group">
      <label for="nome">Login:</label>
        <input type="text" class="form-control" id="login" placeholder="Informe o login" name="login" value="<?php echo"$linha->login_funcionario";?>";>
    </div>
	
	<div class="form-group">
      <label for="nome">Senha:</label>
        <input type="password" class="form-control" id="senha" placeholder="Informe uma senha" name="senha" value="<?php echo"$linha->senha_funcionario";?>";>
    </div>
	
	<div class="form-group">
	<label for="pwd">Sexo:</label><br>
		<input type="radio" name="sexo" value="M" <?php echo $sexo_0_checked; ?>>Masculino
		<input type="radio" name="sexo" value="F" <?php echo $sexo_1_checked; ?> >Feminino
    </div>
	
	<div class="form-group">
		<label for="pwd">Ativo:</label><br>
		<input type="radio" name="ativo" value="Ativo" 	   <?php echo $ativo_0_checked; ?>>Sim
		<input type="radio" name="ativo" value="Bloqueado" <?php echo $ativo_1_checked; ?>>Não
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
