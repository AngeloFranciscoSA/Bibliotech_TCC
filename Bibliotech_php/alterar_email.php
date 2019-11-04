<?php
	if(isset($_POST['id_usuario']))
	{
		$id_usuario = $_POST['id_usuario'];
		$email_antigo = $_POST['email_antigo'];
		$email_novo = $_POST['email_novo'];
		$myObj = new stdClass();
		
		$sql_consulta = "select * from usuario where id_usuario='$id_usuario'";
		
		include("conexao.php");
		
		$resultado_consulta = $conexao->query($sql_consulta);
		if($resultado_consulta->num_rows >0)
		{
			$linha = $resultado_consulta->fetch_object();
			
		
			$email_BD = $linha->email_usuario;
			
			
			if($email_BD == $email_antigo)
			{
				$sql_update = "update usuario
								set id_usuario ='$id_usuario',
								email_usuario ='$email_novo'
										where id_usuario ='$id_usuario'";
										
				$conexao->query($sql_update);
				
				$myObj->alterar = "alterado";
				
			}
			else
			{
				$myObj->alterar = "erro_email";
			}
		}
		else
		{
				$myObj->alterar = "erro";
		}
		
		echo json_encode($myObj);	
		
	}
?>