<?php
	if(isset($_POST['login']) && isset($_POST['senha']))
	{
		//verificar se o usuario existe no banco
		$login = $_POST['login'];
		$senha = md5($_POST['senha']);
		
		include("conexao.php");
		
		$sql = "select id_funcionario, nome_funcionario, login_funcionario, senha_funcionario from funcionario where
				ativo = 'Ativo' and login_funcionario='$login'";
			
		$resultado = $conexao->query($sql);
		
		if($resultado->num_rows > 0)
		{
			$linha = $resultado->fetch_object();
			
		
			$id_funcionario = $linha->id_funcionario;
			$NomeFuncionario = $linha->nome_funcionario;
			$SenhaBD   = $linha->senha_funcionario;
			
			if($senha == $SenhaBD)
			{		
				session_start();
				$_SESSION['logado'] = "Sim";
				$_SESSION['nome_funcionario'] = $NomeFuncionario;
				$_SESSION['id_funcionario'] = $id_funcionario;
				header("location:inicio.php");
			}
			else
			{
				echo "Senha ou Login Incorretos";
				echo "<br><a href='index.php'>Voltar</a>";
			}
		}
		else
		{
				echo "Senha ou Login Incorretos";
				echo "<a href='index.php'>Voltar</a>";
		}
	}
	else
	{
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Indetificação Do Funcionário</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
		<body>

		<div class="container" style="width:40%">
		  <h2>Identificação do Funcionário</h2>
		  <form action="index.php" method="post">
			<div class="form-group">
			  <label for="email">Login:</label>
			  <input type="text" class="form-control" id="email" placeholder="Login" name="login">
			</div>
			<div class="form-group">
			  <label for="pwd">Senha:</label>
			  <input type="password" class="form-control" id="pwd" placeholder="Senha" name="senha">
			</div>
			
			<button type="submit" style="width:100%" class="btn btn-primary">OK</button>
		  </form>
		</div>

		</body>
		</html>
		<?php
	}
	?>
