<?php
    //Conexão com o Banco de Dados
	require "../../sistemaLogin/conectar.php";

    //Iniciar a sessão que foi aberta
    session_start();

    //Se o usuario não estiver logado manda ele para o formulario de login
    if ($_SESSION["Login"] != "SIM") {
        header("Location: ../../sistemaLogin/form_login.html");
    }

	//Recupera os dados dos campos
	$nome = $_POST['Nome'];
    $cpf = $_POST['CPF'];
    $email = $_POST['Email'];
	$telefone = $_POST['Telefone'];
	$senha = $_POST['Senha'];

	//Insere os dados no banco
    $sqlUP = "UPDATE dados_usuarios SET
    Nome ='$nome',
    CPF='$cpf',
    Email ='$email',
    Telefone ='$telefone',
    Senha ='$senha' WHERE Email = '" . $_SESSION['emailUser'] . "'";
    
    $UPdate = mysqli_query($conexao, $sqlUP);
    
    //Se os dados forem inseridos com sucesso
    if ($UPdate) {
            $mensagem = "Informações atualizadas com sucesso!<br> Aguarde ... <br> <img class='' src=''>";
            header("Location: ../../sistemaLogin/form_login.html");
    }
    else {
            $mensagem = "Houve um erro!<br> Aguarde ...";
    }
    
    require "../../sistemaLogin/desconectar.php";

    echo $mensagem;
?>