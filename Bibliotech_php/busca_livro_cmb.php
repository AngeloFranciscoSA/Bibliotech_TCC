<meta charset="utf-8">
<?php
   include("conexao.php");
   
   $sql = "select * from livros where ativo='S' order by id_livro";
      
   $resultado = $conexao->query($sql);
   echo"<select class='form-control' id='id_livro'>";
   while($linha = $resultado->fetch_object())
   {	
		echo "<option value='$linha->id_livro'>$linha->nome_livro</option>";
   }
   echo"</select>";
?>