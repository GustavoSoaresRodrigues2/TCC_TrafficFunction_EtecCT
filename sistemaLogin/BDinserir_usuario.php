<?php 
  //Conexão com o Banco de Dados
	require "conectar.php";

	//Recupera os dados dos campos
	$nome = $_POST['Nome'];
    $cpf = $_POST['CPF'];
    $email = $_POST['Email'];
	$telefone = $_POST['Telefone'];
	$senha = $_POST['Senha'];

	//Insere os dados no banco
	$sql = mysqli_query($conexao, "INSERT INTO dados_usuarios VALUES ('', '".$nome."', '".$cpf."', '".$email."', '".$telefone."', '".$senha."')");

	//Se os dados forem inseridos com sucesso
	if ($sql) {
		$msg = "<br>Você foi cadastrado com sucesso!";
	  }	else {
		    $msg = "Houve um erro! Veja o último usuario cadastrado com sucesso.";
	}
?>

<!DOCTYPE html>
<html>

	<head>
		<TITLE>TF | Cadastrando</TITLE>
		<META charset="UTF-8">
        <meta name="author" content="TrafficFunction">
        <meta name="description" content="Site para divilguar nossa empresa">
        <meta name="keywords" content="transito, semaforos, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
		    <style>
                table {
                font-size: 20px;
                margin: 0 auto;
                width: 40%;
                padding: 0px;
                margin-bottom: 4%;
                color: black;
                }
                table tr {
                word-spacing: 5px;
                padding: 0;
                margin: 0;
                background-color: #E6E6E6;
                }
                table td {
                padding: 5px 15px;
                }
                table tr:nth-child(1) {
                padding: 0;
                text-align: center;
                }
                table tr:nth-child(1) td {
                background: #00BFFF;
                color: white;
                }
            </style>
	</head>

	<body id="top">

    <!-- Top Background Image Wrapper -->
    <div class="bgded overlay light" style="background-image:url('../images/backgrounds/background_home.jpeg');">
      <div class="wrapper row0">
        <div id="topbar" class="hoc clear"> 
          <div class="fl_left">
            <ul class="nospace">

              <!-- Contato -->
              <li><i class="fa fa-phone"></i> +55 (11) 95841-5296</li>
              <li><i class="fa fa-envelope-o"></i> trafficfunction@gmail.com</li>
              <!-- /Contato -->

            </ul>
          </div>
          <div class="fl_right">
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
              
              <li><a href="../index.html">Página Inicial</a></li>

              <!-- Parte Guia -->
              <li><a class="drop">Guias</a>
                <ul>
                  <li><a href="../pages/quemSomos.html">Quem Somos?</a></li>
                  <li><a href="../pages/mapaInflacoes.html">Mapa de infrações</a></li>
                  <li><a href="../pages/sistemaComentar/form_comentario.php">Comentários</a></li>
                </ul>
              </li>
              <!-- /Parte Guia -->

              <!-- Parte Cadastro -->
              <li><a class="drop">Conta</a>
                <ul>
                  <li><a href="../pages/sistemaPerfil/contaUsuario.php">Perfil</a></li>
                  <li><a href="form_login.html">Login</a></li>
                  <li><a href="form_cadastro.html">Cadastrar</a></li>
                  <li><a href="logoff.php">Sair</a></li>
                </ul>
              </li>
              <!-- /Parte Cadastro -->
              
            </ul>
          </nav>
        </header>
      </div>
      <!-- /NavBar -->

    </div>
    <!-- End Top Background Image Wrapper -->

	<?php
      echo "<h1 align='center'>$msg</h1>";

      //Selecione todos os usuarios
      $sql = mysqli_query($conexao, "SELECT * FROM dados_usuarios ORDER BY cod DESC limit 1");

      //Exibe as informações de cada usuario
      while ($usuario = mysqli_fetch_object($sql)) {
        //Exibimos as informações
        echo "<table>";
        echo "<tr><td><b>Seus Dados</b></td></tr>";
        echo "<tr><td><b>Nome:</b> " . $usuario->Nome . "</td></tr>";
        echo "<tr><td><b>CPF:</b> " . $usuario->CPF . "</td></tr>";
        echo "<tr><td><b>Email:</b> " . $usuario->Email . "</td></tr>";
        echo "<tr><td><b>Telefone:</b> " . $usuario->Telefone . "</td></tr>";
        echo "</table>";		
      }

        //Encerra conexão
        require "desconectar.php";
	?>
    
    <!-- FOOTER -->		
    <div class="wrapper row4">
      <footer id="footer" class="hoc clear"> 
        <article class="one_third first">
          <h6 class="heading">Motivação</h6>
          <p>Não é de hoje que encontramos problemas no transito que atrapalham nosso dia a dia.</p>
          <p>Diversas irregularidades de trânsito (incluindo semáforos, placas danificadas &hellip;</p>
          <p class="nospace"><a href="../pages/quemSomos.html">Ler mais</a></p>
        </article>
        <div class="one_third">
          <h6 class="heading">Nossos Contatos</h6>
          <ul class="nospace btmspace-30 linklist contact">
            <li><i class="fa fa-map-marker"></i>
              <address>
              Rua &amp; nº, São Paulo, Cidade Tiradentes
              </address>
            </li>
            <li><i class="fa fa-phone"></i> +55 (11) xxxxx-xxxx</li>
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
            <li><a href="">App Mobile</a></li>
            <li><a href="../pages/mapaInflacoes.html">Mapa</a></li>
            <li><a href="../pages/sistemaComentar/form_comentario.php">Comentarios</a></li>
            <li><a href="../pages/quemSomos.html">Nossa Empresa</a></li>
          </ul>
        </div>
      </footer>
    </div>
	<!-- /FOOTER -->

    <div class="wrapper row5">
      <div id="copyright" class="hoc clear"> 
        <p class="fl_left">Copyright &copy; 2022 - Todos os Direitos Reservados a TrafficFunciton</p>
      </div>
    </div>

    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

    <!-- JAVASCRIPTS -->
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>

	</body>
</html>
