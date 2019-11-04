<?php
	
	if(isset($_POST['id_usuario']))
	{
		$id 		= $_POST['id_usuario'];
		$custo		= $_POST['custo'];
		$data 		= date('Y-m-d');
		
		
		$sql = "insert into historico (id_usuario,data_compra,custo_total)
				values('$id','$data','$custo')";
		echo $sql;
		echo"<br>";
		include("conexao.php");
		
		$resultado = $conexao->query($sql);
		
		$ultimoID = mysqli_insert_id($conexao);
		
		$contador = $_POST["contador"];
		
		for($i=0;$i<$contador;$i++)
		{
			if(isset($_POST["carrinho"]))
			{	
				$carrinho = $_POST['carrinho'];
				
				foreach($carrinho as $item)
				{
					$livro = $item;
				
					$sql_cat ="insert into livro_historico (id_livro,id_historico)
								values('$livro','$ultimoID')";
				
					$resultado = $conexao->query($sql_cat);
				
					echo $sql_cat;
				}
			}
		}
		
	}
?>