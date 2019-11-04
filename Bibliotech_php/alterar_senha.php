<?php
	if(isset($_POST['id_usuario']))
	{
		$id_usuario = $_POST['id_usuario'];
		$senha_antiga = md5($_POST['senha_antiga']);
		$senha_nova = md5($_POST['senha_nova']);
		$myObj = new stdClass();
		
		$sql_consulta = "select * from usuario where id_usuario='$id_usuario'";
		
		include("conexao.php");
		
		$resultado_consulta = $conexao->query($sql_consulta);
		if($resultado_consulta->num_rows >0)
		{
			$linha = $resultado_consulta->fetch_object();
			
		
			$senha_BD = $linha->senha_usuario;
			
			
			if($senha_BD == $senha_antiga)
			{
				$sql_update = "update usuario
								set id_usuario ='$id_usuario',
								senha_usuario ='$senha_nova'
										where id_usuario ='$id_usuario'";
										
				$conexao->query($sql_update);
				
				$myObj->alterar = "alterado";
				
			}
			else
			{
				$myObj->alterar = "erro_senha";
			}
		}
		else
		{
				$myObj->alterar = "erro";
		}
		
		echo json_encode($myObj);	
		
	}
?>