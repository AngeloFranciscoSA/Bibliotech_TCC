<meta charset="utf-8">
<?php
   include("conexao.php");
   
   $sql = "select * from categoria where ativo='S' order by nome_categoria";
      
   $resultado = $conexao->query($sql);
   echo"<select class='form-control' id='id_categoria'>";
   while($linha = $resultado->fetch_object())
   {	
		echo "<option value='$linha->id_categoria'>$linha->nome_categoria</option>";
   }
   echo"</select>";
?>