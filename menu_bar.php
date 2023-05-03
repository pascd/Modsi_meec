<script>
    <?php
    session_start();
    ?>
    //Verifica se os valores da sessão foram establecidos, se negativo, coloca a 0
    var nivel = "<?php echo isset($_SESSION['nivel']) ? $_SESSION['nivel'] : 0 ?>";
    var login = "<?php echo isset($_SESSION['login']) ? $_SESSION['login'] : 0 ?>";

    if (login == 1) {
        if (nivel == 3) //Paciente
        {
            document.getElementById('login').style.display = 'none';
            document.getElementById('registo').style.display = 'none';
        }
        if (nivel == 2) //Enfermeiro
        {
            document.getElementById('conta').style.display = 'none';
            document.getElementById('admin').style.display = 'none';
        }
        if (nivel == 1) //Administrador
        {
            document.getElementById('conta').style.display = 'none';
            document.getElementById('enfermeiro').style.display = 'none';
        }
    } else if (login == 0) //Visitante
    {
        document.getElementById('meu_perfil').style.display = 'none';
        document.getElementById('minhas_reservas').style.display = 'none';
        document.getElementById('logout').style.display = 'none';
    }
</script>




<div class="nav_bar">
    <a href="/pagina_inicial/index.php">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Acerca</button>
        <div class="dropdown-content">
            <a href="misao.html">Missão e Valores</a>
            <a href="welcome.html">Mensagem de Boas Vindas</a>
            <a href="contactos.html">Contactos</a>
            <a href="#sobre">Sobre</a>
        </div>
    </div>
    <a href="publicacoes.html">Publicações</a>
    <div class="dropdown">
        <button class="dropbtn">Saúde Pública</button>
        <div class="dropdown-content">
            <a href="vacinas.html">Vacinação</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Acerca</button>
        <div class="dropdown-content">
            <a href="misao.html">Missão e Valores</a>
            <a href="welcome.html">Mensagem de Boas Vindas</a>
            <a href="contactos.html">Contactos</a>
            <a href="#sobre">Sobre</a>
        </div>
    </div>
    <a href="internacional.html">Internacional</a>
    <div class="dropdown">
        <button class="dropbtn">Área Reservada</button>
        <div class="dropdown-content">
            <a href="/login/login.php" id="login">Login</a>
            <a href="/registo/registo.php" id="registo">Registo</a>
            <a href="/perfil/meu_perfil.php" id="meu_perfil">Meu Perfil</a>
            <a href="/perfil/minhas_marcacoes.php" id="minhas_reservas">Minhas reservas</a>
            <a href="/login/logout.php" id="logout">Sair</a>
        </div>
    </div>

</div>