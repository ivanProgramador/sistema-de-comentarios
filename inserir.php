<?php 

require ("conexao.php");
//verificando se o botao de nome enviar foi apertado
//e assim que o php identifica que boato foi clicado
//detro de um formulario
// tudo oue eu digitar dentro do if vai acintecer quando o botao for clicado

    if (isset($_POST['enviar'])) {
        
    	//echo "funcionando";

    	//pegando o valor das variaveis
        // aqui estao sendo usado 3 tipos de sistmas de segurança 
        // mysqli_real_escape_string() -> evita que o sistema leia instrucoes sql enviadas atraves do formulario ATAQUE SQL 
        // INJECTION
        // TRIM - elimina os espacos e le somente as letras digitadas
        // strip_tags -> se o usuario tentar digitar tags html o sistema nao le
        
        // ATENCAO O PROBLEMA UE EU TINHA COM A FUNÇAO mysqli_real_escape_string() ERA PORQUE ELA PRECISA DE 2 PARAMETROS SERIAM ELES A VARIAVEL DE CONEXAO MAIS A STRING QUE EU VOU SALVAR.EXTAMENTE NESTA ORDEM.


    	$nome = mysqli_real_escape_string($conn,trim(strip_tags($_POST['nome'])));


    	$email = mysqli_real_escape_string($conn,trim(strip_tags($_POST['email'])));

    	$site = mysqli_real_escape_string($conn,trim(strip_tags($_POST['site'])));

    	$comentario = mysqli_real_escape_string($conn,trim(strip_tags($_POST['comentario'])));

        //verificando se os campos foram preenchidos

        if(empty($nome) || empty($email) || empty($comentario)) {

        	
        	echo '<script> alert("preencha os campos"); </script>';


        }elseif (!preg_match('@^(?:http://)?([^/]+)@i', $email) ) {  
        // o problema aqui foi porque eu nao demlitei da forma certa


        	echo '<script> alert("email invalido"); </script>';

        }else{

            // o problema aqui e que esuqci de botar as pas simples nas variaveis pois como elas sao strings o banco nao le //sem aspas isso deu erro de sintaxe somente numeros podem ser salvos sem usar aspas.

        	$sql = mysqli_query($conn,"INSERT INTO comentarios (nome,email,site,comentario,mostrar) VALUES ('$nome','$email','$site','$comentario',0)");

             
        	if ($sql) {

        		echo '<script> alert("enviado com sucesso !"); </script>';


        	} else {

        		echo '<script> alert("erro de envio"); </script>';
        		echo mysqli_error($conn);
        	}
        	
        }

    }


 ?>