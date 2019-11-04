<?php
	if(isset($_POST['login']) && isset($_POST['senha']))
	{
		//verificar se o usuario existe no banco
		$login = $_POST['login'];
		$senha = md5($_POST['senha']);
		
		include("conexao.php");
		
		$sql = "select id_admin, nome_admin, login_admin, senha_admin from administrador where
				ativo = 'Ativo' and login_admin='$login'";
				
		$resultado = $conexao->query($sql);
		
		if($resultado->num_rows > 0)
		{
			$linha = $resultado->fetch_object();
			
		
			$id_admin = $linha->id_admin;
			$NomeAdmin = $linha->nome_admin;
			$SenhaBD   = $linha->senha_admin;
		
			if($senha == $SenhaBD)
			{		
				session_start();
				$_SESSION['logado'] = "Sim";
				$_SESSION['nome_admin'] = $NomeAdmin;
				$_SESSION['id_admin'] = $id_admin;
				header("location:inicio.php");
			}
			else
			{
				echo"$sql";
				echo "Senha ou Login incorretos";
				echo "<br><a href='index.php'>Voltar</a>";
			}
		}
		else
		{
				echo "Senha ou Login incorretos";
				echo "<a href='index.php'>Voltar</a>";
		}
	}
	else
	{
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
		  <title>Indetificação Do Administrador</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		</head>
		<body>

		<div class="container" style="width:40%">
		  <h2>Identificação do Administrador</h2>
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
