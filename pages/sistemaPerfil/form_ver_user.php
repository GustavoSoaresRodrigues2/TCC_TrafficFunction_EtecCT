<?php 
	//Conexão com o Banco de Dados
	require "../../sistemaLogin/conectar.php";
        
    //Iniciar a sessão que foi aberta
    session_start();

    //Se o usuario não estiver logado manda ele para o formulario de login
    if ($_SESSION["Login"] != "SIM") {
        header("Location: ../../sistemaLogin/form_login.html");
    }
?>

<!DOCTYPE html>
<html lang="br">
    
  <head>
    <title>TF | Atualização</title>
    <meta charset="utf-8">
    <meta name="author" content="TrafficFunction">
    <meta name="description" content="Site para divilguar nossa empresa">
    <meta name="keywords" content="transito, semaforos, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <style type="text/css">

        h1, p {
          margin-left: 9%;
          margin-right: 9%;
        }

        .form_cadastro{
            width: 80%;
            height: 100%;
            background-color:#fdd05e;
            border-radius: 15px;
            padding: 10px;
        }
        .form_cadastro h1, label{
            color: #FFFFFF;
            font-family: "Arial";
            
        }
        .form_cadastro h1{
            font-size: 7mm;
        }
        .form_cadastro label{
            margin-top: 10px;
            font-size:5mm;
        }
        .form_cadastro input{ 
            width: 90%;
            height: 40px;
            padding: 15px;
            border: none;
            outline: none;
            border-radius: 7px;
        }
        #Email{
            margin-bottom: 20px;
        }

    </style>
  </head>

  <body id="top">
    
    <!-- Top Background Image Wrapper -->
    <div class="bgded overlay light" style="background-image:url('../../images/backgrounds/background_home.jpeg');">
      <div class="wrapper row0">
        <div id="topbar" class="hoc clear"> 
          <div class="fl_left">
            <ul class="nospace">
              <!-- Contato -->
              <li><i class="fa fa-phone"></i> +55 (11) xxxxx-xxxx</li>
              <li><i class="fa fa-envelope-o"></i> trafficfunction@gmail.com</li>
              <!-- /Contato -->
            </ul>
          </div>
        </div>
      </div>
      
      <!-- NavBar -->
      <div class="wrapper row1">
        <header id="header" class="hoc clear"> 
          <div id="logo" class="fl_left">

            <!-- LogoImagem -->
            <h1 id="logo_top"><a href="../index.html"><img src="../../images/logo_trafficfunction.png" alt=""></a></h1>
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

    <div class="wrapper row3">
      <main class="hoc container clear"> 
        <div class="content">
            <h1>Faça as suas atualizações! </h1>
            <p>Qualquer visitante do nosso site tem acesso aos mais diversos assuntos sobre o transito. Mas apenas aqueles que criam uma conta podem verdadeiramente fazer a diferença!</p>
            <p>Você também pode se interessar em <a href="#">nosso App</a>, muito simples e prático de usar.</p>
            </br>
            <?php
			    $codigo = $_GET['cod']; //Função GET do php

			    //Conexão com o bd
                require "../../sistemaLogin/conectar.php";

                $sql = "SELECT * FROM dados_usuarios WHERE Email = '" . $_SESSION['emailUser'] . "'";

                $dados = mysqli_query($conexao, $sql);

                $membro = mysqli_fetch_array($dados);
                //como retorna apenas um registro não é necessario a utilização do while

                require "../../sistemaLogin/desconectar.php";

                $msg_body = "<p align = 'right'>Login feito por " . $_SESSION["nomeUser"] . "</p>";
            ?>
            <!-- Form Cadastro -->
            <center>
            <div class="form_cadastro">
                <h1>FORMULÁRIO DE ATUALIZAÇÃO</h1>
                <form action="atualizar_user.php" method="post"> 
                <div class="txtformL">
                    <label for="Nome">Nome: <span>*</span></label>
                    <input type="text" name="Nome" id="Nome" placeholder="Insira seu nome" value="<?php echo $membro["Nome"]; ?>" size="22" required>
                </div>
                <div class="txtformR">
                    <label for="Telefone">Telefone: </label>
                    <input type="text" name="Telefone" id="Telefone" placeholder="Ex: (DDD) 12345-4321" value="<?php echo $membro["Telefone"]; ?>" size="22" required>
                </div>
                <div class="txtformL">
                    <label for="CPF">CPF: <span>*</span></label>
                    <input type="text" name="CPF" id="CPF" value="<?php echo $membro["CPF"]; ?>" placeholder="Insira seu CPF" size="22" required>
                </div>
                <div class="txtformR">
                    <label for="Senha">Senha: <span>*</span></label>
                    <input type="password" name="Senha" id="Senha" value="<?php echo $membro["Senha"]; ?>" placeholder="Crie uma senha forte" size="22" required>
                </div>
                <div class="txtform">
                    <label for="Email">E-mail: <span>*</span></label>
                    <input type="email" name="Email" id="Email" value="<?php echo $membro["Email"]; ?>" placeholder="Ex: conta@gmail.com" size="22" required>
                </div>
                <!-- BOTOES -->
                <div>
                  <button class="btn" type="submit" name="submit" value="update">ATUALIZAR</button>
                  &nbsp;
                  <button class="btn" type="reset" name="reset" value="limpar">LIMPAR</button>
                </div>
                <!-- /BOTOES -->
              </form>
            </div>
          </center>
        </div>
        <!-- /Form Cadastro -->
      </main>
    </div>

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
            <li><a href="#" download>App Mobile</a></li>
            <li><a href="../pages/mapaInflacoes.html">Mapa</a></li>
            <li><a href="../pages/sistemaComentar/form_comentario.php">Comentarios</a></li>
            <li><a href="../pages/quemSomos.html">Nossa Empresa</a></li>
          </ul>
        </div>
      </footer>
    </div>
    <div class="wrapper row5">
      <div id="copyright" class="hoc clear"> 
        <p class="fl_left">Copyright &copy; 2022 - Todos os Direitos Reservados a TrafficFunciton</p>
      </div>
    </div>

    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

    <!-- JAVASCRIPTS -->
    <script src="../layout/scripts/jquery.min.js"></script>
    <script src="../layout/scripts/jquery.backtotop.js"></script>
    <script src="../layout/scripts/jquery.mobilemenu.js"></script>
  </body>
</html>