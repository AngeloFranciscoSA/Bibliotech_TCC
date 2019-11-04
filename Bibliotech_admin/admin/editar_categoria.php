<?php
	session_start();
	
	if($_SESSION['logado'] != "Sim")
	{
		header("location:index.php");
	}
	
	include("conexao.php");
	
	if(isset($_POST['nome']))
	{
		$id 	= $_POST['id'];
		$nome = $_POST['nome'];
		$ativo = $_POST['ativo'];
		
		$sql = "update categoria
						set id_categoria ='$id',
						 nome_categoria ='$nome',
						 ativo ='$ativo'
						
						where id_categoria ='$id'";
		
		include("../conexao.php");
		$conexao->query($sql);
		
		header("location:categoria_consulta.php");
	}
	
	
	//include do header
	include("header.php");
	
			    $id_categoria = $_GET['id'];
				$sql = "select * from categoria where
						id_categoria = '$id_categoria'";
					
							
				$resultado = $conexao->query($sql);
				
				$linha = $resultado->fetch_object();
				
				$ativo= $linha->ativo;
				
				$ativo_0_checked = "";
				$ativo_1_checked = "";
                  if ($ativo == "S"){
						$ativo_0_checked = "checked";
						}
						if ($ativo == "N"){
						$ativo_1_checked = "checked";
						}				
				
?>
<div class="container">
	<h1>Editar Categorias</h1>
	
	<form action="editar_categoria.php" method="post">
	
        <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo"$linha->id_categoria";?>"; >


	  <div class="form-group">
		<label for="email">Nome da Categoria:</label>
		<input type="text" class="form-control" name="nome" required value="<?php echo"$linha->nome_categoria";?>";>
	  </div>
	  <div class="form-group">
		<label for="pwd">Ativo</label><br>
		<input type="radio" name="ativo" value="S" <?php echo $ativo_0_checked; ?> >Sim <br>
		<input type="radio" name="ativo" value="N" <?php echo $ativo_1_checked; ?>>Não
	  </div>
	  
	  <button type="submit" class="btn btn-success">Confirma</button>
	  <a href="categoria_consulta.php" class="btn btn-warning">Voltar</a>
	</form>
</div>
	</body>
	</html>