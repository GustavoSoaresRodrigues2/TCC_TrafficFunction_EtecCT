<?php 
	//Verifica se usuario digitado é nulo
	if ($_POST["Email"] == null) {

	//Usuario e enviado de volta ao formulario
	header("Location: form_login.html");

	}
	else {

		//O usuario e senha digitados são colocados e suas respectivas variaveis
		$emailDigitado = $_POST["Email"];
		$senhaDigitada = $_POST["Senha"];
	}

	//Conexão com o Banco de Dados
	require "BDconectar.php";

	//Faz uma consulta a tbl_cliente e retorna a linha que contem o usuario digitado
	$strSQL = "SELECT cod, Nome, Email, Senha FROM dados_usuarios where Email = '$emailDigitado'";

	//Executa a consulta(query) a variavel $consulta contem o resultado da consulta
	$consulta = mysqli_query($conexao, $strSQL);

	//Loop pelo resultado da $consulta
	//Cada linha vai para um array ($row) usuario mysql_fetch_array
	//O usuario e senha encontrados no BD são armazenados nas novas variaveis
	while ($linha = mysqli_fetch_array($consulta)) {
        	$codBD = $linha["cod"];
        	$nomeBD = $linha["Nome"];
        	$emailBD = $linha["Email"];
		$senhaBD = $linha["Senha"];
	}

	//Encerra conexão
	require "BDdesconectar.php";

		//Verifica usuario e senha
		if ($emailDigitado == $emailBD && $senhaDigitada == $senhaBD) {

			//Se estiver correto a sessão fica yes
			session_start();
            $_SESSION["Login"] = "SIM";
            $_SESSION["codUser"] = $codBD;
            $_SESSION["emailUser"] = $emailBD;
            $_SESSION["nomeUser"] = $nomeBD;
            
           header("Location: ../pages/sistemaPerfil/contaUsuario.php");
		}
		else {
			//Se estiver errado fica NO
			session_save_path("/tmp"); session_start();
			$_SESSION["Login"] = "NÃO";

            header("Location: form_login.php");
		}
?>
