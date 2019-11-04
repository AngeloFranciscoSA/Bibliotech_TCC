<?php
session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	//include do header
	include("header.php");
	echo"<title>Consulta Usuarios</title>";
	echo"<body>";
   ?>

	<div class='container'>
	
    <h1>Usuários<br></h1>
<form class="form-inline" action="usuario_consulta.php" method="post">
	
	<div class="form-group">
      <label for="nome">Nome do Usuário:</label>
        <input type="text" class="form-control" id="usuario" placeholder="Informe o nome do usuário" name="usuario">
		<button type="submit" class="btn btn-success">Pesquisar</button>
    </div>
	
</form>
</div>
<?php

		
		include("conexao.php");
		
		echo "<table class=\"table table-hover\">";
		echo "<tr>";
		echo "	<th width='10%'>ID</th>";
		echo "	<th>Nome</th>";
		echo "	<th>Email</th>";
		echo "	<th width='10%'>Sexo</th>";
		echo "	<th width='10%'>CEP</th>";
		echo "	<th width='25%'>Endereço</th>";
		echo "	<th width='10%'>Bairro</th>";
		echo "	<th width='25%'>Cidade</th>";
		echo "	<th width='10%'>Estado</th>";
		echo "	<th width='10%'>País</th>";
		echo "	<th width='10%'>Ativo</th>";
		echo "	<th width='10%'>Excluir</th>";
		echo "	<th width='10%'>Editar</th>";
		echo "</tr>";
		if(isset($_POST['usuario']))
		{
			$usuario = $_POST['usuario'];
			
			$sql = "select * from usuario where nome_usuario like '%$usuario%'";

			$resultado = $conexao->query($sql);
			
			while($linha = $resultado->fetch_object())
			{
				echo "<tr>";
				echo "	<td>$linha->id_usuario</td>";
				echo "	<td>$linha->nome_usuario</td>";
				echo "	<td>$linha->email_usuario</td>";
				echo "  <td>";
			            if($linha->sexo_usuario == "M")
			            {
			                echo"Masculino";
			            }
			            if($linha->sexo_usuario == "F")
			            {
			                echo"Feminino";
			            }
				echo "</td>";
				echo "	<td>$linha->codigo_postal</td>";
				echo "	<td>$linha->endereco</td>";
				echo "	<td>$linha->bairro</td>";
				echo "	<td>$linha->cidade</td>";
				echo "	<td>$linha->estado</td>";
				echo "	<td>$linha->pais</td>";
				echo "	<td>$linha->ativo</td>";
				echo "<td><a class='btn btn-danger' href='apaga_usuario.php?id=$linha->id_usuario'>Excluir</a></td>";
				echo "<td><a class='btn btn-warning' href='editar_usuario.php?id=$linha->id_usuario'>Editar</a></td>";
				echo "</tr>";
			}
		}
		
		echo "</table>";
	
?>

</body>
</html>
