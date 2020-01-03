<?php  require ("conexao.php"); 
  //error_reporting(0);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form  action="#"  method="post">
Nome:
  <input type="text" name="nome"><br><br>
E-mail:
  <input type="text" name="email"><br><br>
Blog ou site
  <input type="text" name="site"><br><br>
Comentario:<br>
  <textarea name="comentario">
  	
  </textarea>
  <br>
  <input type="submit" value="Comentar" name="enviar"><br>
  <input type="reset" value="Limpar">


 </form>
 <?php require 'inserir.php';  ?>
<hr size="4">
 <?php include 'mostrar.php';  ?>
</body>
</html>