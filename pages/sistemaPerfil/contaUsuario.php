<?php
	require "../../sistemaLogin/BDconectar.php";
    
    session_save_path("/tmp"); session_start();
    
    if($_SESSION["Login"] != "SIM") {
        header("Location: ../../sistemaLogin/form_login.html");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>TF | Perfil</title>
    <meta charset="utf-8">
    <meta name="author" content="TrafficFunction">
    <meta name="description" content="Perfil de usuarios logados">
    <meta name="keywords" content="transito, semaforos, mapa, tcc, html">
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
              <li><i class="fa fa-phone"></i> +55 (11) 95841-5296</li>
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
                  <li><a href="../../sistemaLogin/BDlogoff.php">Sair</a></li>
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
    <div class="wrapper row5">
      <main class="hoc container clear"> 
        <!-- Parte Esquerda -->
        <div class="sidebar one_quarter first">
            <!-- Perfil pessoa -->
            <nav class="sdb_holder">
            <?php
                echo "<h6>" . $_SESSION['nomeUser'] . "</h6>";
                
                $strSQL = "SELECT cod, Email, Telefone FROM dados_usuarios WHERE Email = '" . $_SESSION['emailUser'] . "'";
                
                $consulta = mysqli_query($conexao, $strSQL);
               
                while($linha = mysqli_fetch_array($consulta)) {        
                   //Exibimos as informações          
                    echo "
                        <table class='tab_perfil'>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src='mail.svg'> ". $linha['Email'] ."
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <img src='phone.svg'> ". $linha['Telefone'] ."
                                    </td>
                                </tr>
                            </tbody>
                        </table>";
                    }
                echo "<a class='btn' value='editar-pefil' href=form_ver_user.php?codigo=" . $_SESSION['codUser'] . ">Editar Perfil</a>";
            ?>

            </nav>
            <!-- / Perfil pessoa -->
        </div>
            <div class="content three_quarter">
            <?php
                    //<!-- Tabela ocorrencias -->
                    $strSQL = "SELECT ID_Ocorrencia, Rua, CEP, Ocorrencia, Descricao, Observacao, Data FROM tabela_ocorrencias WHERE codUser = '" . $_SESSION['codUser'] . "'";
                    
                    echo "<table class='tab_reportes' border = '1' align='center'><tr><td>ID</td><td>Rua</td><td>CEP</td><td>Ocorrencia</td><td>Descricao</td><td>Observação</td><td>Data</td><td>Editar</td><td>Excluir</td></tr>";
                    
                    $consulta = mysqli_query($conexao, $strSQL);

                    while($linha = mysqli_fetch_array($consulta)) {
                            echo "<tr>";
                            echo "<td>" . $linha['ID_Ocorrencia'] . "</td>";
                            echo "<td>" . $linha['Rua'] . "</td>";
                            echo "<td>" . $linha['CEP'] . "</td>";
                            echo "<td>" . $linha['Ocorrencia'] . "</td>";
                            echo "<td>" . $linha['Descricao'] . "</td>";
                            echo "<td>" . $linha['Observacao'] . "</td>";
                            echo "<td>" . $linha['Data'] . "</td>";
                            echo "<td>
                            <a href = form_ver_ocorrencia.php?codigo=" . $linha['ID_Ocorrencia'] . ">
                            <img src = 'ibagens/icon_editar.jpg' width = '30px'>
                            </a></td>";
                            echo "<td><a href = 'bd_excluir_usuario.php'><img src = 'ibagens/icone_excluir.png' width = '30px'></a></td>";
                            echo "</tr>";	
                            }
                            echo "</table";
                    //<!-- /Tabela ocorrencias -->

                require "../../sistemaLogin/BDdesconectar.php";       
            ?>
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
            <li><i class="fa fa-phone"></i> +55 (11) 95841-5296</li>
            <li><i class="fa fa-envelope-o"></i> trafficfunction@gmail.com</li>
          </ul>
          <ul class="faico clear">
            <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
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
