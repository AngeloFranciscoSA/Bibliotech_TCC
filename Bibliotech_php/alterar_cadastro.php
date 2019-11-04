<?php
	if(isset($_POST['id_usuario']))
	{
		$id_usuario = $_POST['id_usuario'];
		$nome = $_POST['nome'];
		$sexo=	$_POST['sexo'];
		$cep=	$_POST['cep'];
		$rua=	$_POST['rua'];
		$bairro=$_POST['bairro'];
		$cidade=$_POST['cidade'];
		$pais=	$_POST['pais'];
		$uf=	$_POST['uf'];
		
		
		$sql = "update usuario set
					nome_usuario ='$nome',
					sexo_usuario ='$sexo', 
					codigo_postal = '$cep',
					endereco ='$rua',
					bairro ='$bairro',
					cidade = '$cidade',
					estado ='$uf',
					pais = '$pais'
					where id_usuario ='$id_usuario'";
		
		
		include("conexao.php");
		
		$conexao->query($sql);
		
	}
?>