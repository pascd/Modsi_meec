<script>
    <?php 
    session_start();
    ?>
    //Verifica se os valores da sessão foram establecidos, se negativo, coloca a 0
    var nivel = "<?php echo isset($_SESSION['nivel']) ? $_SESSION['nivel'] : 0 ?>";
    var login = "<?php echo isset($_SESSION['login']) ? $_SESSION['login'] : 0 ?>";
    
    if(login == 1)
    {
       if(nivel == 3) //Paciente
       {
        document.getElementById('conta').style.display = 'none';
        document.getElementById('admin').style.display = 'none';
        document.getElementById('enfermeiro').style.display = 'none';
       } 
       if(nivel == 2) //Enfermeiro
       {
        document.getElementById('conta').style.display = 'none';
        document.getElementById('admin').style.display = 'none';
       }
       if(nivel == 1) //Administrador
       {
        document.getElementById('conta').style.display = 'none';
        document.getElementById('enfermeiro').style.display = 'none';
       }
    }else if(login == 0) //Visitante
    {
        document.getElementById('perfil').style.display = 'none';
        document.getElementById('logout').style.display = 'none';
        document.getElementById('admin').style.display = 'none';
        document.getElementById('enfermeiro').style.display = 'none';
    }

</script>

<div class="nav_bar">
    <a href="../pagina_inicial/index.php">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Saúde Pública</button>
        <div class="dropdown-content">
            <a href="#vacinas">Vacinação</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Acerca</button>
        <div class="dropdown-content">
            <a href="#contactos">Contactos</a>
            <a href="#sobre">Sobre</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" id="enfermeiro">Painel Enfermeiro</button>
        <div class="dropdown-content">
            <a href="#contactos">Marcações</a>
            <a href="#contactos">Acompanhamento</a>               
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn" id="admin">Painel Admin</button>
        <div class="dropdown-content">
            <a href="#contactos">Gerir enfermeiros</a>
            <a href="#contactos">Gerir utilizadores</a>
            <a href="#contactos">Gerir marcações</a> 
            <a href="#contactos">Gerir stock</a>               
        </div>
    </div>
    <div class="dropdown">
            <button class="dropbtn" id="conta">Conta</button>
            <div class="dropdown-content">
                <a href="../login/login.php">Login</a>
                <a href="../registo/registo.php">Registar</a>
            </div>
    </div>
    <div class="dropdown">
            <button class="dropbtn" id="perfil">Perfil</button>
            <div class="dropdown-content">
                <a href="../perfil/meu_perfil.php" id="perfil">Meu perfil</a>
                <a href="../registo/registo.php" id="perfil">Minhas marcações</a>
            </div>
    </div>
    <a href="../login/logout.php" id="logout">Sair</a>
</div>