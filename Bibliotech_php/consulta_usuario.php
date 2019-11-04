<?php
	if(isset($_POST['id_usuario']))
	{
		$id_usuario = $_POST['id_usuario'];
		
		$sql = "select * from usuario where id_usuario = '$id_usuario'";
		
		include("conexao.php");
		
		$resultado = $conexao->query($sql);
		
		while($linha = $resultado->fetch_object())
		{	
			echo"<h4>";
			echo"Id: $linha->id_usuario";
			echo"<br>";
			echo"Email: $linha->email_usuario";
			echo"<br>";
			if($linha->sexo_usuario == "M")
			{
				echo"Sexo: Masculino";
				echo"<br>";
			}
			if($linha->sexo_usuario == "F")
			{
				echo"Sexo: Feminino";
				echo"<br>";
			}
			echo"<br>";
			echo"</h4>";
			echo"<h2>";
			echo"Informações de Entrega:";
			echo"<br>";
			echo"<br>";
			echo"</h2>";
			echo"<h4>";
			echo"CEP: $linha->codigo_postal";
			echo"<br>";
			echo"Endereço: $linha->endereco";
			echo"<br>";
			echo"Bairro: $linha->bairro";
			echo"<br>";
			echo"Cidade: $linha->cidade";
			echo"<br>";
			echo"Estado: $linha->estado";
			echo"<br>";
			echo"Pais: $linha->pais";
			echo"<br>";
			echo"</h4>";
			echo"<br>";
		}
		
	}
?>