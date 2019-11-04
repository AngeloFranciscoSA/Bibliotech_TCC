<?php
header("Content-Type: application/json; charset=UTF-8");
  	if(isset($_REQUEST['email']) && isset($_REQUEST['senha']))
	{
		//verificar se o usuario existe no banco
		$email = $_REQUEST['email'];
		$senha = md5($_REQUEST['senha']);
		$myObj = new stdClass();	
		
		include("conexao.php");
		
		$sql = "select id_usuario, nome_usuario, email_usuario, senha_usuario from usuario where
				ativo = 'Ativo' and email_usuario='$email'";
				
		$resultado = $conexao->query($sql);
		
		if($resultado->num_rows > 0)
		{
			$linha = $resultado->fetch_object();
			
		
			$id_usuario = $linha->id_usuario;
			$Nome_usuario = $linha->nome_usuario;
			$SenhaBD   = $linha->senha_usuario;
			
			
			if($senha == $SenhaBD)
			{
				$myObj->id_usuario ="$id_usuario";
				$myObj->nome = "$Nome_usuario";
				$myObj->logado = "S";
				
			}
			else
			{
				$myObj->nome = "erro_senha";
				$myObj->logado = "N";
			}
		}
		else
		{
				$myObj->nome = "erro_email";
				$myObj->logado = "N";
		}
		
		echo json_encode($myObj);
	}
?>