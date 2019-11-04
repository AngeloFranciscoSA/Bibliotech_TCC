<?php
session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	include("conexao.php");
	//include do header
	include("header.php");
	
	if(isset($_POST['id_usuario']))
	{
		$id 		= $_POST['id_usuario'];
		$nome 		= $_POST['nome'];
		$sexo		= $_POST['sexo'];
		$cep		= $_POST['cep'];
		$rua		= $_POST['rua'];
		$bairro		= $_POST['bairro'];
		$cidade		= $_POST['cidade'];
		$pais		= $_POST['pais'];
		$uf			= $_POST['uf'];
		
		
		$sql_update = "update usuario
					set
					nome_usuario ='$nome',
					sexo_usuario ='$sexo', 
					codigo_postal = '$cep',
					endereco ='$rua',
					bairro ='$bairro',
					cidade = '$cidade',
					estado ='$uf',
					pais = '$pais'
					where id_usuario ='$id'";
		
		$conexao->query($sql_update);
		
		header("location:usuario_consulta.php");
	}
	
	$id = $_GET['id'];
	
	$sql = "select * from usuario where id_usuario = '$id'";
	
	$resultado = $conexao->query($sql);
				
	$linha = $resultado->fetch_object();
				
	$ativo 	= $linha->ativo;
	$sexo  	= $linha->sexo_usuario;
				
	$ativo_0_checked = "";
	$ativo_1_checked = "";
	
	$sexo_0_checked = "";
	$sexo_1_checked = "";
	
    if ($ativo == "Ativo")
	{
		$ativo_0_checked = "checked";
	}
	if ($ativo == "Bloqueado")
	{
		$ativo_1_checked = "checked";
	}
	
	if($sexo == "M")
	{
		$sexo_0_checked = "checked";
	}
	if($sexo == "F")
	{
		$sexo_1_checked = "checked";
	}
?>  
	<title>Editar Usuário</title>
	<script src="js/script_cep.js"></script>
<body>

<div class="container">
  <h2 align="center">Editar Usuário</h2>
  <br>
  <form class="form-horizontal" action="editar_usuario.php" method="post">
    
        <input type="hidden" class="form-control" id="id_usuario"  name="id_usuario" value="<?php echo"$linha->id_usuario";?>">
	
	<div class="form-group">
      <label for="nome">Nome do Usuário:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo"$linha->nome_usuario";?>">
    </div>
	
	<div class="form-group">
      <label for="nome">Email:</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo"$linha->email_usuario";?>">
    </div>
	
	<div class="form-group">
      <label for="nome">CEP:</label>
        <input type="text" class="form-control" id="cep" name="cep" value="<?php echo"$linha->codigo_postal";?>">
    </div>
	
	<div class="form-group">
      <label for="nome">Endereço:</label>
        <input type="text" class="form-control" id="rua" name="rua" value="<?php echo"$linha->endereco";?>">
    </div>
	
	<div class="form-group">
      <label for="nome">Bairro:</label>
        <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo"$linha->bairro";?>">
    </div>
	
	<div class="form-group">
      <label for="nome">Cidade:</label>
        <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo"$linha->cidade";?>">
    </div>
	
	<div class="form-group">
      <label for="nome">Estado:</label>
        <input type="text" class="form-control" id="uf" name="uf" value="<?php echo"$linha->estado";?>">
    </div>
	
	<div class="form-group">
      <label for="nome">Pais:</label>
        <input type="text" class="form-control" id="pais" name="pais" value="<?php echo"$linha->pais";?>">
    </div>
	
	
	<div class="form-group">
			<label for="pwd">Sexo:</label><br>
			<input type="radio" name="sexo" value="M" <?php echo"$sexo_0_checked";?>>Masculino
			<input type="radio" name="sexo" value="F" <?php echo"$sexo_1_checked";?>>Feminino
	</div>
	
	<div class="form-group">
			<label for="pwd">Ativo</label><br>
			<input type="radio" name="ativo" value="S" <?php echo"$ativo_0_checked";?>>Sim
			<input type="radio" name="ativo" value="N" <?php echo"$ativo_1_checked";?>>Não
	</div>
		
	<div class="form-group">        
        <button type="submit" class="btn btn-success">OK</button>
		<a href="usuario_consulta.php" class="btn btn-warning">Voltar</a>
    </div>
		</form>
</div>	 
	 
</body>
</html>