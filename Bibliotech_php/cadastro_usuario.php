<meta charset="utf-8">
<?php
	include("conexao.php");
	
	
	if(isset($_POST["nome"]))
	{
		$nome 	= 	$_POST['nome'];
		$email	=	$_POST['email'];
		$senha	=	md5($_POST['senha']);
		$sexo	=	$_POST['sexo'];
		$cep	=	$_POST['cep'];
		$rua	=	$_POST['rua'];
		$bairro	=	$_POST['bairro'];
		$cidade	=	$_POST['cidade'];
		$pais	=	$_POST['pais'];
		$uf   	=	$_POST['uf'];
		
		
		
		$sql = "insert into usuario (nome_usuario,email_usuario,senha_usuario,sexo_usuario,codigo_postal,endereco,bairro,cidade,estado,pais)
				values('$nome','$email','$senha','$sexo','$cep','$rua','$bairro','$cidade','$uf','$pais');";
				
		echo"$sql";
		
		$resultado = $conexao->query($sql);
		
		$myObj = new stdClass();
		
		$myObj-> cadastro = "S";
		
		echo json_encode($myObj);	
	}
   
?>