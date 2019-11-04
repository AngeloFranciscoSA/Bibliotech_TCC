<?php
session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	//include do header
	include("header.php");
	echo"<title>Consulta Funcionários</title>";
	echo"<body>";
	echo"<div class='container'>";
	echo "<h1>Funcionários<br>";
	echo "<a href='funcionarios_cadastro.php' class='btn btn-primary'>Adicionar Novos Funcionários</a>";
	echo "</h1>";
?>
<form class="form-inline" action="consulta_funcionarios.php" method="post">
	
	<div class="form-group">
      <label for="nome">Nome do Funcionários:</label>
        <input type="text" class="form-control" id="funcionario" placeholder="Informe o nome do funcionário" name="funcionario">
		<button type="submit" class="btn btn-success">Pesquisar</button>
    </div>
	
</form>
<?php
		include("conexao.php");
		
		echo "<table class=\"table table-hover\">";
		echo "<tr>";
		echo "	<th width='10%'>ID</th>";
		echo "	<th>Nome</th>";
		echo "	<th>Email</th>";
		echo "	<th width='10%'>Login</th>";
		echo "	<th width='10%'>Sexo</th>";
		echo "	<th width='10%'>Ativo</th>";
		echo "	<th width='10%'>Excluir</th>";
		echo "	<th width='10%'>Editar</th>";
		echo "</tr>";
		
		if(isset($_POST['funcionario']))
		{
			$funcionario = $_POST['funcionario'];
			
			 $sql = "select * from funcionario where nome_funcionario like '%$funcionario%'";

			$resultado = $conexao->query($sql);
			
			while($linha = $resultado->fetch_object())
			{	
				echo "<tr>";
				echo "	<td>$linha->id_funcionario</td>";
				echo "	<td>$linha->nome_funcionario</td>";
				echo "	<td>$linha->email_funcionario</td>";
				echo "	<td>$linha->login_funcionario</td>";
				echo "	<td>";
					if($linha->sexo_funcionario == "M")
						{echo"Masculino </td>";}
					if($linha->sexo_funcionario == "F")
						{echo"Feminino </td>";}
				echo "	<td>$linha->ativo</td>";
				echo "<td><a class='btn btn-danger' href='apaga_funcionario.php?id=$linha->id_funcionario'>Excluir</a></td>";
				echo "<td><a class='btn btn-warning' href='editar_funcionario.php?id=$linha->id_funcionario'>Editar</a></td>";
				echo "</tr>";
			}
		}
		
		echo "</table>";
  
   ?>
</div>

</body>
</html>
