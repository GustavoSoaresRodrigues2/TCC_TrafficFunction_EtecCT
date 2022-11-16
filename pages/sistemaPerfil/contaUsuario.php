<?php
    //Conexão com o Banco de Dados
	require "../../sistemaLogin/conectar.php";
    //Iniciar a sessão que foi aberta
    session_start();
    //Se o usuario não estiver logado manda ele para o formulario de login
    if($_SESSION["Login"] != "SIM") {
        header("Location: ../../sistemaLogin/form_login.html");
    }
?>
<!DOCTYPE html>
<html lang="br">
  <head>
    <title>Perfil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <style>
        .btn {
            width: 145px;
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
              <li><i class="fa fa-phone"></i> +55 (11) 8552-7890</li>
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
            <h1 id="logo_top"><a href="../../index.html"><img src="../../images/logo_trafficfunction.png"></a></h1>
            <!-- /LogoImagem -->

          </div>
          <nav id="mainav" class="fl_right">
            <ul class="clear">

              <li><a href="../../index.html">Página Inicial</a></li>

              <!-- Parte Guia -->
              <li><a class="drop">Guias</a>
                <ul>
                  <li><a href="../quemSomos.html">Quem Somos?</a></li>
                  <li><a href="../mapaInflacoes.html">Mapa de infrações</a></li>
                  <li><a href="../sistemaComentar/form_comentario.php">Comentários</a></li>
                </ul>
              </li>
              <!-- /Parte Guia -->

              <!-- Parte Cadastro -->
              <li><a class="drop">Conta</a>
                <ul>
                  <li><a href="contaUsuario.php">Perfil</a></li>
                  <li><a href="../../sistemaLogin/form_login.html">Login</a></li>
                  <li><a href="../../sistemaLogin/form_cadastro.html">Cadastrar</a></li>
                  <li><a href="../../sistemaLogin/logoff.php">Sair</a></li>
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
        <!-- Parte Esquerda -->
        <div class="sidebar one_quarter first">
        <!-- Perfil pessoa -->
            <nav class="sdb_holder">
            <?php
                echo "<h6>" . $_SESSION['nomeUser'] . "</h6>";
                //Faz uma consulta a dados_usuarios e retorna a linha que contem o cliente digitado
                $strSQL = "SELECT Email, Telefone FROM dados_usuarios WHERE Email = '" . $_SESSION['emailUser'] . "'";
                //Executa a consulta(query) a variavel $consulta contem o resultado da consulta
                $consulta = mysqli_query($conexao, $strSQL);
                //Cada linha vai para um array ($row) usando mysql_fetch_array
                while($linha = mysqli_fetch_array($consulta)) {        
                   //Exibimos as informações          
                    echo "
                        <table>
                            <tr>
                                <td>
                                    E-mail: ". $linha['Email'] ."
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   Contatos: ". $linha['Telefone'] ."
                                </td>
                            </tr>
                        </table>
                        ";
                    }
                //Encerra conexão
                require "../../sistemaLogin/desconectar.php";        
            ?>
            
                <button class="btn" value="Editar Perfil">Editar Perfil</button>
            
            </nav>
        <!-- / Perfil pessoa -->
        </div>
        <!-- Parte Esquerda -->
        <div class="content three_quarter"> 
            <!-- Comentario sobre ela msm -->
  
          <!-- / Comentario sobre ela msm -->
        </div>
      </main>
    </div>
    <!-- FOOTER -->
    <div class="wrapper row4">
      <footer id="footer" class="hoc clear"> 
        <article class="one_third first">
          <h6 class="heading">Motivação</h6>
          <p>Não é de hoje que encontramos problemas no transito que atrapalham nosso dia a dia.</p>
          <p>Diversas irregularidades de trânsito (incluindo semáforos, placas danificadas &hellip;</p>
          <p class="nospace"><a href="../quemSomos.html">Ler mais</a></p>
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
            <li><a href="../mapaInflacoes.html">Mapa</a></li>
            <li><a href="../sistemaComentar/form_comentario.php">Comentarios</a></li>
            <li><a href="../quemSomos.html">Nossa Empresa</a></li>
          </ul>
        </div>
      </footer>
    </div>
    <!-- /FOOTER -->
    <div class="wrapper row5">
      <div id="copyright" class="hoc clear"> 
        <p class="fl_left">Copyright &copy; 2022 - Todos os Direitos Reservados a TrafficFunction</p>
      </div>
    </div>
    <!-- JAVASCRIPTS -->
    <script src="../../layout/scripts/jquery.min.js"></script>
    <script src="../../layout/scripts/jquery.backtotop.js"></script>
    <script src="../../layout/scripts/jquery.mobilemenu.js"></script>
  </body>
</html>
