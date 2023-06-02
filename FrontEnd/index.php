<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sistema de vacinação Portuguesa | Home</title>

    <link rel="stylesheet" href="../chatbot/chat.css">
    <!-- <link rel="stylesheet" href="chatbot/home.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicon  -->
    <link rel="icon" href="../img/Vaccine.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <!-- Preloader -->
    <!-- <div id="preloader">
        <div class="medilife-load"></div>
    </div> -->

    <!-- ***** Header Area Start ***** -->
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <script>
        $(function() {
            $("#header-area").load("../menu_bar.php");
        });
    </script>
    <div id="header-area"></div>
    <!-- ***** Header Area End ***** -->

    <!-- ***** ChatBot Start ***** -->

    <div class="chat-bar-collapsible">
        <button id="chat-button" type="button" class="collapsible">Sistema de Vacinação Chatbot
            <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
        </button>

        <div class="content">
            <div class="full-chat-block">
                <!-- Message Container -->
                <div class="outer-container">
                    <div class="chat-container">
                        <!-- Messages -->
                        <div id="chatbox">
                            <h5 id="chat-timestamp"></h5>
                            <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                            <!-- <p id="options_1" class="first_questions">Yes</p> -->
                            <div class="first_questions">
                                <div class="button_layout" onclick="default_responses_1()">Como alterar o meu perfil</div>
                                <p></p>
                                <div class="button_layout" onclick="default_responses_2()">Ver as minhas marcações</div>
                                <p></p>
                                <div class="button_layout" onclick="default_responses_3()">Agendar vacinação</div>
                                <p></p>
                            </div>
                        </div>

                        <!-- User input box -->
                        <!-- <div class="chat-bar-input-block">
                            <div id="userInput">
                                <input id="textInput" class="input-box" type="text" name="msg" placeholder="Pressionar 'Enter' para enviar mensagem">
                                <p></p>
                            </div> -->

                            <!-- <div class="chat-bar-icons">
                                <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send" onclick="sendButton()"></i>
                            </div> -->
                        </div>

                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- ***** Chat Bot End ***** -->


    <!-- ***** Hero Area Start ***** -->

    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url(../img/bg_img/00000-3993320424.png);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Serviços de Vacinação <br>Em que pode Confiar</h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">Somos Sistema de Vacinação Portuguesa</h6>
                                <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Discover Medifile <span>+</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url(../img/bg_img/00001-3993320425.png);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Marcações que fazem a <br> Diferença<br></h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">Somos Sistema de Vacinação Portuguesa</h6>
                                <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Discover Medifile <span>+</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url(../img/bg_img/00011-1621470304.png);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Serviços de Vacinação <br>Em que pode Confiar</h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">Somos Sistema de Vacinação Portuguesa</h6>
                                <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Discover Medifile <span>+</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Hero Area End ***** -->


    <!-- ***** Cool Facts Area Start ***** -->
    <section class="medilife-cool-facts-area section-padding-100-0">
        <div class="container">
            <div class="row">


                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100">
                        <i class="icon-blood-transfusion-2"></i>

                        <?php

                        require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

                        $sel_sql = "SELECT * FROM marcacao WHERE estado='Resolvido'";
                        $ans = mysqli_query($db, $sel_sql);

                        $marcacao = mysqli_num_rows($ans);
                        echo '<h2><span class="counter">' .  $marcacao . '</span></h2>';
                        ?>

                        <h6>Administrações</h6>
                        <p>Registo de todas as administrações realizadas pelo nosso serviço</p>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100">
                        <i class="icon-atoms"></i>

                        <?php

                        $sel_sql = "SELECT * FROM users WHERE nivel='3'";
                        $ans = mysqli_query($db, $sel_sql);

                        $utente = mysqli_num_rows($ans);
                        echo '<h2><span class="counter">' .  $utente . '</span></h2>';
                        ?>

                        <h6>Utentes</h6>
                        <p>Número de utentes que têm acesso aos nossos serviços especializados de vacinação</p>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100">
                        <i class="icon-microscope"></i>

                        <?php

                        $sel_sql = "SELECT * FROM vacinas";
                        $ans = mysqli_query($db, $sel_sql);

                        $vacinas = mysqli_num_rows($ans);
                        echo '<h2><span class="counter">' .  $vacinas . '</span></h2>';
                        ?>

                        <h6>Vacinas</h6>
                        <p>Quantidade de vacinas armazenadas em stock no sistema</p>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-fact-area text-center mb-100">
                        <i class="icon-doctor-1"></i>

                        <?php

                        $sel_sql = "SELECT * FROM users WHERE nivel='2'";
                        $ans = mysqli_query($db, $sel_sql);

                        $enfermeiro = mysqli_num_rows($ans);
                        echo '<h2><span class="counter">' .  $enfermeiro . '</span></h2>';
                        ?>

                        <h6>Enfermeiro</h6>
                        <p>Número de profissionais de saúde que prestam o serviço</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Cool Facts Area End ***** -->


    <!-- ***** Blog Area Start ***** -->
    <div class="medilife-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-area mb-100">
                        <script src="https://rss.bloople.net/?url=https%3A%2F%2Fportal-chsj.min-saude.pt%2Fpages%2F748.rss&detail=50&limit=1&showtitle=false&type=js"></script>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-area mb-100">
                        <!-- Link usado da RSS de https://portal-chsj.min-saude.pt/pages/746 -->
                        <script src="https://rss.bloople.net/?url=https%3A%2F%2Fportal-chsj.min-saude.pt%2Fpages%2F747.rss&detail=50&limit=1&showtitle=false&type=js"></script>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-area mb-100">
                        <!-- Link usado da RSS de https://rr.sapo.pt/rss#info -->
                        <script src="https://rss.bloople.net/?url=https%3A%2F%2Frr.sapo.pt%2Frss%2Frssfeed.aspx%3Ftag%3D1450&detail=50&limit=1&type=js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Blog Area End ***** -->

    <script src="../chatbot/responses.js"></script>
    <script src="../chatbot/chat.js"></script>

    <!-- ***** Footer Area Start ***** -->
    <script>
        $(function() {
            $("#footer-area").load("../footer.php");
        });
    </script>
    <div id="footer-area"></div>
    <!-- ***** Footer Area End ***** -->

</body>



</html>