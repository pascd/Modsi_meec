<?php
    session_start();
?>

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="js/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'pt'}, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<script>
    //Verifica se os valores da sessão foram establecidos, se negativo, coloca a 0
    var nivel = "<?php echo isset($_SESSION['nivel']) ? $_SESSION['nivel'] : 0 ?>";

    var primeiro_nome = "<?php echo isset($_SESSION['primeiro_nome']) ? $_SESSION['primeiro_nome'] : 0 ?>";
    var ultimo_nome = "<?php echo isset($_SESSION['ultimo_nome']) ? $_SESSION['ultimo_nome'] : 0 ?>";

    $('#bem_vindo').html("Bem vindo, <span>" + primeiro_nome + " " + ultimo_nome + "</span>");



    if (nivel==0){      //Visitante
        document.getElementById('perfil_gerir_sair').style.display = 'none';
        document.getElementById('bem_vindo').style.display = 'none';
        
    }
    if (nivel==3){      //Paciente
        document.getElementById('login_registo').style.display = 'none';

        document.getElementById('registo_enfermeiro').style.display = 'none';
        document.getElementById('utilizadores').style.display = 'none';
        document.getElementById('criar_vagas').style.display = 'none';
        document.getElementById('vacina_administracao').style.display = 'none';    }
    if (nivel==2){      //Enfermeiro
        document.getElementById('login_registo').style.display = 'none';

        document.getElementById('registo_enfermeiro').style.display = 'none';
        document.getElementById('utilizadores').style.display = 'none';
        document.getElementById('criar_vagas').style.display = 'none';    }
    if (nivel==1){      //Administrador
        document.getElementById('login_registo').style.display = 'none';
    }
</script>


<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="h-100 d-md-flex justify-content-between align-items-center">
                        <p><span>Sistema de vacinação Portuguesa</span></p>
                        <div id="google_translate_element"></div>
                        <p>Horário de atendimento: 2ª a 6ªfeira - 09h30h às 20h</p>
                        <p id="bem_vindo"></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 h-100">
                    <div class="main-menu h-100">
                        <nav class="navbar h-100 navbar-expand-lg">
                            <!-- Logo Area  -->
                            <a class="navbar-brand" href="/FrontEnd/index.php"><img src="/img/core-img/logo.png" alt="Logo"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse" id="medilifeMenu">
                                <!-- Menu Area -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/FrontEnd/index.php">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acerca</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/acerca/missao_e_valores.html">Missão e Valores</a>
                                            <a class="dropdown-item" href="/acerca/welcome.html">Mensagem de Boas Vindas</a>
                                            <a class="dropdown-item" href="/acerca/contactos.html">Contactos</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="publicacoes.html">Publicações</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Saúde Pública</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="vacinas.html">Vacinação</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="internacional.html">Internacional</a>
                                    </li>
                                </ul>
                                <!-- Appointment Button -->
                                <a href="/login/login.php" id="login_registo" class="btn medilife-appoint-btn ml-30"> <span>Área Reservada</span></a>
                                <div class="nav-item dropdown" id="perfil_gerir_sair">
                                    <a class="btn medilife-appoint-btn ml-30" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Área Reservada</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <!-- Opções globais -->
                                        <a href="/perfil/meu_perfil.php" id="perfil" class="dropdown-item"> <span>Perfil</span></a>
                                        <a href="/perfil/minhas_marcacoes.php" id="minhas_marcacoes" class="dropdown-item"> <span>Minhas Marcações</span></a>
                                        <!-- Opções paciente -->
                                        <a href="/paciente/agendar.php" id="agendar" class="dropdown-item"> <span>Agendar</span></a>
                                        <!-- Opções enfermeiro -->
                                        <a href="/enfermeiro/vacina_administracao.php" id="vacina_administracao" class="dropdown-item"> <span>Administração Vacinas</span></a>
                                        <!-- Opções administrador -->
                                        <a href="/admin/registo_enfermeiro.php" id="registo_enfermeiro" class="dropdown-item"> <span>Registo de Enfermeiro</span></a>
                                        <a href="/admin/utilizadores.php" id="utilizadores" class="dropdown-item"> <span>Gestão de Utilizadores</span></a>
                                        <a href="/admin/criar_vagas.php" id="criar_vagas" class="dropdown-item"> <span>Criar Vagas Vacinação</span></a>
                                        <!-- Opções globais -->
                                        <a href="/login/logout.php" id="sair" class="dropdown-item"> <span>Sair</span></a>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>