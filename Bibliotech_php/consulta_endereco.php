<?php
	if(isset($_POST['id_usuario']))
	{
		$id_usuario = $_POST['id_usuario'];
		$myObj = new stdClass();
		
		$sql ="select * from usuario where id_usuario='$id_usuario'";
		
		include("conexao.php");
		
		$resultado = $conexao->query($sql);
		
		while($linha = $resultado->fetch_object())
		{	
			$myObj->nome = "$linha->nome_usuario";
			$myObj->sexo = "$linha->sexo_usuario";
			$myObj->cep  = "$linha->codigo_postal";
			$myObj->endereco  = "$linha->endereco";
			$myObj->cidade = "$linha->cidade";
			$myObj->bairro = "$linha->bairro";
			$myObj->estado = "$linha->estado";
			$myObj->pais = "$linha->pais";

		}
		echo json_encode($myObj);
	}
?>