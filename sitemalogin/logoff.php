<?php
	//Iniciar a sessão que foi aberta
	session_start();

	//Finalizamos a sessão
	session_destroy();

	//Limpamos as variaveis globais das sessões
	session_unset();

	//Direcionamos o usuario para o formulario de LOGIN
	header("Location: form_login.html");
?>