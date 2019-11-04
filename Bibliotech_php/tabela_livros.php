<?php
	if(isset($_POST['carrinho']))
	{
		$carrinho = $_POST['carrinho'];
		
		$soma = 0;
		
		echo "<table class=\"table table-hover\">";
		echo "<tr>";
		echo "	<th width='45%'>Nome do Livro</th>";
		echo "	<th width='10%'>Valor</th>";
		echo "</tr>";
		
		foreach($carrinho as $item)
		{
			$sql = "select * from livros where id_livro ='$item'";
			
			include("conexao.php");
			
			$resultado = $conexao->query($sql);
			
			
			
			$contador=0;
			
			while($linha = $resultado->fetch_object())
			{
				$soma = $soma + $linha->valor_livro;
				echo "<tr>";
				echo "<td><p>".$linha->nome_livro."</p></td>
					  <td><p>R$ $linha->valor_livro</p></td>";
				echo"<input type=\"hidden\" id_livro='$linha->id_livro;' value=\"$linha->id_livro;\">";
				echo"</td>";
				echo "</tr>";
				$contador++;
			}
			
			echo "<input type=\"hidden\" name=\"contador\" id=\"contador\" value=\"$contador\">";			
			
		}	
		echo "<tr style=\"float: right;\">
				<td >Total: R$<div id=\"custo\">$soma</div></td> 
			  </tr>";
			  
		echo "</table>";
	}
?>