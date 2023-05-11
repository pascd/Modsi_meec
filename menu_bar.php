<?php
    session_start();
?>

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="../js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="../js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="../js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="../js/plugins.js"></script>
<!-- Active js -->
<script src="../js/active.js"></script>

<script>
    //Verifica se os valores da sessão foram establecidos, se negativo, coloca a 0
    var nivel = "<?php echo isset($_SESSION['nivel']) ? $_SESSION['nivel'] : 0 ?>";
    var login = "<?php echo isset($_SESSION['login']) ? $_SESSION['login'] : 0 ?>";

    if (login == 1) {
        if (nivel == 3) //Paciente
        {
            document.getElementById('login_registo').style.display = 'none';

        }
        if (nivel == 2) //Enfermeiro
        {
            document.getElementById('login_registo').style.display = 'none';

        }
        if (nivel == 1) //Administrador
        {
            document.getElementById('login_registo').style.display = 'none';
        }
    } else if (login == 0) //Visitante
    {
        document.getElementById('perfil_sair').style.display = 'none';
    }
</script>


<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="h-100 d-md-flex justify-content-between align-items-center">
                        <p>Bem vindo ao Website do <span>Sistema de vacinação Portuguesa</span> </p>
                        <p>Horário de atendimento: 2ª a 6ªfeira - 09h30h às 20h</p>
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
                            <a class="navbar-brand" href="/FrontEnd/index.php"><img src="../img/core-img/logo.png" alt="Logo"></a>

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
                                            <a class="dropdown-item" href="../acerca/missao_e_valores.html">Missão e Valores</a>
                                            <a class="dropdown-item" href="../acerca/welcome.html">Mensagem de Boas Vindas</a>
                                            <a class="dropdown-item" href="../acerca/contactos.html">Contactos</a>
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
                                <a href="../login/login.php" id="login_registo" class="btn medilife-appoint-btn ml-30"> <span>Área Reservada</span></a>
                                <a href="../login/logout.php" id="perfil_sair" class="btn medilife-appoint-btn ml-30"> <span>Sair</span></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>