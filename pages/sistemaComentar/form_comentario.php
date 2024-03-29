<?php
    session_start();

    if($_SESSION["Login"] != "SIM") {
    header("Location: ../../sistemaLogin/form_login.html");
    }
?>

<!DOCTYPE html>
<html lang="br">
    <head>
        <title>TF | Comentar</title>
        <meta charset="utf-8">
        <meta name="author" content="TrafficFunction">
        <meta name="description" content="Site para divilguar nossa empresa">
        <meta name="keywords" content="transito, semaforos, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
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
                <li><a href="../../index.html">Página Inicial</a></li>

                <!-- Parte Guia -->
                <li><a class="drop">Guias</a>
                    <ul>
                    <li><a href="../quemSomos.html">Quem Somos?</a></li>
                    <li><a href="../mapaInflacoes.html">Mapa de infrações</a></li>
                    <li><a href="form_comentario.php">Comentários</a></li>
                    </ul>
                </li>
                <!-- /Parte Guia -->

                <!-- Parte Cadastro -->
                <li><a class="drop">Conta</a>
                    <ul>
                    <li><a href="../sistemaPerfil/contaUsuario.php">Perfil</a></li>
                    <li><a href="../../sistemalogin/form_login.html">Login</a></li>
                    <li><a href="../../sistemalogin/form_cadastro.html">Cadastrar</a></li>
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

        <div class="wrapper row2 bgded overlay" style="background-image:url('../../images/backgrounds/background_servicos.jpg');">
            <section class="hoc cta clear"> 
            <div class="sectiontitle">
                <h6 class="heading">Mostre a sua opinião!</h6>
                <p>Escreva a sua experiencia sobre os nossos serviços</p>
            </div>
            <form action="inserir_comentario.php" method="post">
                <fieldset>
                    <center>
                        <textarea type="text" name="coment" style="color: black;" rows="4" cols="50"></textarea>
                        <!-- <input type="text" name="coment" placeholder="Escreva seu comentario"> -->
                        <button type="submit" value="submit">Enviar</button>
                    </center>
                </fieldset>
            </form>
            </section>
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
                <li><a href="comentario.html">Comentarios</a></li>
                <li><a href="../quemSomos.html">Nossa Empresa</a></li>
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
        <script src="../../layout/scripts/jquery.min.js"></script>
        <script src="../../layout/scripts/jquery.backtotop.js"></script>
        <script src="../../layout/scripts/jquery.mobilemenu.js"></script>
    </body>
</html>