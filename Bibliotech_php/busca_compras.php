<?php	
	if(isset($_POST['id_usuario']))
	{
		$id_usuario = $_POST['id_usuario'];
	
		$sql = "select * from historico where id_usuario = '$id_usuario'";
	
			echo "<table class=\"table table-hover\">";
			echo "<tr>";
			echo "	<th>Custo da Compra</th>";
			echo "	<th>Data da compra</th>";
			echo "	<th>Detalhes</th>";
			echo "</tr>";
				
		include("conexao.php");
		
		$resultado = $conexao->query($sql);
		
		while($linha = $resultado->fetch_object())
		{
				echo "<tr>";
				echo "	<td>R$ $linha->custo_total</td>";
				echo "	<td>$linha->data_compra</td>";
				echo "  <td><button type=\"button\" id_compra='$linha->id_historico_compra' class=\"btn btn-info btn-lg btn_detalhes\" >Detalhes</button></td>";
				echo "</tr>";
		}
		echo "<table>";
	}
?>