<?php 
   require 'conexao.php';
   $sql = mysqli_query($conn,"SELECT * FROM comentarios WHERE Mostrar = true ");

   $conta = @mysqli_num_rows($sql);

   if ($conta <= 0) {
    	echo "nenhum comentario";
    } else {

    	echo '('.$conta.')comentarios encontrados <br><br>';



    	while ($dados = mysqli_fetch_array($sql)) {

                   echo 
                   '
                     '.$dados['Nome'].'<br>
                     '.$dados['Email'].'<br>
                     '.$dados['Site'].'<br>
                    
                     <p>'.$dados['Comentario'].'</p>

                     <a href="?Id='.$dados['id'].' &Acao=Deletar" ><button>Deletar</button></a> <a href="?Id='.$dados['id'].' &Acao=Alterar"><button>Não Mostrar</button></a><hr size="1">





                     ';
    		
    	}


    }

  if(isset($_GET['Acao']) && $_GET['Acao'] == 'Deletar'){



        	$Id = $_GET['Id'];

        	$sql = mysqli_query($conn, "DELETE FROM `comentarios` WHERE `comentarios`.`id` ='$Id' ");
        	header("location: index.php");

        	if ($sql){

                        echo ' <script> alert("Comentario Deletado");</script>';

        	}else{
                        echo ' <script> alert("erro");</script>';


        	}
        }elseif(isset($_GET['Acao']) && $_GET['Acao'] == 'Alterar'){



        	$Id = $_GET['Id'];

        	$sql = mysqli_query($conn," UPDATE `comentarios` SET `Mostrar` = '0' WHERE `comentarios`.`id` = '$Id'");
        	header("location: index.php");

        	if ($sql){

                        echo ' <script> alert("Comentario Ocultado");</script>';



        	}else{
                        echo ' <script> alert("erro");</script>';


        	}
        }








 ?>