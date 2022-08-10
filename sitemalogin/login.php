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
	require "conectar.php";

	//Faz uma consulta a tbl_cliente e retorna a linha que contem o usuario digitado
	$strSQL = "SELECT Email, Senha FROM tbl_TF_Usuario where Email = '$emailDigitado'";

	//Executa a consulta(query) a variavel $consulta contem o resultado da consulta
	$consulta = mysqli_query($conexao, $strSQL);

	//Loop pelo resultado da $consulta
	//Cada linha vai para um array ($row) usuario mysql_fetch_array
	//O usuario e senha encontrados no BD são armazenados nas novas variaveis
	while ($linha = mysqli_fetch_array($consulta)) {
                $emailBD = $linha["Email"];
		$senhaBD = $linha["Senha"];
	}

	//Encerra conexão
	require "desconectar.php";

		//Verifica usuario e senha
		if ($emailDigitado == $emailBD && $senhaDigitada == $senhaBD) {

			//Se estiver correto a sessão fica yes
			session_start();
                        $_SESSION["Login"] = "SIM";
                        $_SESSION["EmailUser"] = $emailBD;
			                  $msg_body = "<h1 align='center'>Você está logado!</h1>";
                        echo "<br>";
                        $msg_body = $msg_body . "<p align='center'>Podemos começar a iluminar!</p>";
		}
		else {
			//Se estiver errado fica NO
			session_start();
			$_SESSION["Login"] = "NÃO";
			$msg_body = "<h1 align='center'>Você NÃO está logado</h1>";
			$msg_body = $msg_body . "<p><a href='form_login.html'>Tentar Novamente</a></p>";
		}
?>
<!-- #PHP -->

<html lang="br">
<head>
	<title>TF | Login</title>
	<meta charset="UTF-8">
	<meta name="author" content="TrafficFunction">
	<meta name="description" content="Site para divilguar nossa empresa">
	<meta name="keywords" content="transito, semaforos, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<body id="top">
<div class="bgded overlay light" style="background-image:url('../images/backgrounds/background_home.jpeg');"> 
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 

      <div class="fl_left">
        <ul class="nospace">
           <!-- Contato -->
           <li><i class="fa fa-phone"></i> +55 (11) 8552-7890</li>
           <li><i class="fa fa-envelope-o"></i> trafficfunction@gmail.com</li>
           <!-- /Contato -->
        </ul>
      </div>

      <div class="fl_right">

        <ul class="nospace">
          <li><a href="../index.html"><i class="fa fa-lg fa-home"></i></a></li>
          <li><a href="form_login.html" title="Login"><i class="fa fa-lg fa-sign-in"></i></a></li>
          <li><a href="form_cadastro.html" title="Cadastrar"><i class="fa fa-lg fa-edit"></i></a></li>
        </ul>

      </div>
    </div>
  </div>
  
  <!-- NavBar -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">

        <!-- LogoImagem -->
        <h1 id="logo_top"><a href="../index.html"><img src="../images/logo_trafficfunction.png" alt=""></a></h1>
        <!-- /LogoImagem -->

      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">

          <li><a href="../index.html">Home</a></li>

          <!-- Parte Guia -->
          <li><a class="drop" href="../pages/empresa.html">Guias</a>
            <ul>
              <li><a href="../pages/empresa.html">Quem Somos?</a></li>
              <li><a href="../pages/empresa.html">Nosso App</a></li>
              <li><a href="../pages/empresa.html">Mapa de inflações</a></li>
              <li><a href="../pages/empresa.html">Comentários</a></li>
            </ul>
          </li>
          <!-- /Parte Guia -->

          <!-- Parte Cadastro -->
          <li><a class="drop" href="../sitemalogin/form_login.html">Conta</a>
            <ul>
              <li><a href="form_login.html">Login</a></li>
              <li><a href="form_cadastro.html">Cadastrar</a></li>
              <li><a href="logoff.php">Sair da Conta</a></li>
            </ul>
          </li>
          <!-- /Parte Cadastro -->
          
          <li><a href="../pages/empresa.html">Nosso Serviços</a></li>
          <li><a href="../pages/empresa.html">Suporte</a></li>
        </ul>
      </nav>
    </header>
  </div>
  <!-- /NavBar -->
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul>
      <li><a href="../index.html">Home</a></li>
      <li><a href="form_login.html">Login</a></li>
	  <li><a href="#">Logando</a></li>
	  
    </ul>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- End Top Background Image Wrapper -->

	<!-- TRECHO DE PHP QUE MOSTRA A MENSAGEM -->
	<?php
		echo $msg_body;
	?>
	<!-- /Fim da mensagem -->

	<!-- ################################################################################################ -->
<div class="wrapper row2 bgded overlay" style="background-image:url('../images/backgrounds/background_servicos.jpg');">
  <section class="hoc cta clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">Se Mantenha atualizado</h6>
      <p>Forneça um contato diferente para receber nóticias e atualizações do nosso site</p>
    </div>
    <form method="post" action="#">
      <fieldset>
        <legend>Newsletter:</legend>
        <input class="btmspace-15" type="text" value="" placeholder="Insira seu contato aqui"&hellip;>
        <button type="submit" value="submit">Enviar</button>
      </fieldset>
    </form>
    <!-- ################################################################################################ -->
  </section>
</div>

<!-- FOOTER -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article class="one_third first">
      <h6 class="heading">Motivação</h6>
      <p>Não é de hoje que encontramos problemas no transito que atrapalham nosso dia a dia.</p>
      <p>Diversas irregularidades de trânsito (incluindo semáforos, placas danificadas &hellip;</p>
      <p class="nospace"><a href="#">Ler mais</a></p>
    </article>
    <div class="one_third">
      <h6 class="heading">Nossos Contatos</h6>
      <ul class="nospace btmspace-30 linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Rua &amp; nº, São Paulo, Cidade Tiradentes
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +55 (11) 2285-1369</li>
        <li><i class="fa fa-envelope-o"></i> trafficfunction@gmail.com</li>
      </ul>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Nossos serviços</h6>
      <ul class="nospace linklist">
        <li><a href="index.html">App Mobile</a></li>
        <li><a href="index.html">Mapa</a></li>
        <li><a href="pages/empresa.html">Comentarios</a></li>
        <li><a href="pages/empresa.html">Nossa Empresa</a></li>
        <li><a href="index.html">Suporte</a></li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
	<!-- ################################################################################################ -->
	<div class="wrapper row5">
	<div id="copyright" class="hoc clear"> 
		<!-- ################################################################################################ -->
		<p class="fl_left">Copyright &copy; 2022 - Todos os Direitos Reservados - <a href="#"></a></p>
		<p class="fl_right">Modelo de Template do site <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">Free Templates</a></p>
		<!-- ################################################################################################ -->
	</div>
	</div>
	<!-- ################################################################################################ -->
	<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
	<!-- JAVASCRIPTS -->
	<script src="../layout/scripts/jquery.min.js"></script>
	<script src="../layout/scripts/jquery.backtotop.js"></script>
	<script src="../layout/scripts/jquery.mobilemenu.js"></script>
	</body>
</html>
