<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="../styles.css">

    <head>
        <link rel="icon" href="../img/Vaccine.png">

        <title>
            Sistema de vacinação Portuguesa
        </title>

        <h1>
            Sistema de vacinação Portuguesa!
        </h1>

        <script src="../jquery-3.6.4.min.js"></script>
        <script> 
            $(function(){
            $("#menu_bar").load("../menu_bar.php"); 
            });
        </script>   

        <script> 
            $(function(){
            $("#footer").load("../footer.php"); 
            });
        </script>   


    </head>

    <body href="#home">



        <div id="menu_bar"></div>

        <p>
            Neste site será possível agendar vacinações nos diferentes centros de saúde portugueses
        </p>
       
        <div class="double_column">
            <a href="cidadao.html">Cidadão</a>
            <img src="../img/cidadao.png" alt="Imagem Cidadão"> 
        </div>
        <div class="double_column">
            <a href="profissional.html">Profissional</a>
            <img src="../img/profissional.png" alt="Imagem Profissional"> 
        </div>

        <p>Fique a par das novidades!</p>
        

        <div class="newsfeed">
            <div class="newsfeed_column">
                <script src="//rss.bloople.net/?url=https%3A%2F%2Frssfeeds.webmd.com%2Frss%2Frss.aspx%3FRSSSource%3DRSS_PUBLIC&limit=1&showtitle=false&type=js"></script>            
            </div>

            <div class="newsfeed_column">
                <script src="//rss.bloople.net/?url=https%3A%2F%2Fwww.modernhealthcare.com%2Fsection%2Frss%2Fnews%3Fdays%3D7%26topics%3D81631&limit=1&showtitle=false&type=js"></script>
            </div>

            <div class="newsfeed_column">
                <script src="//rss.bloople.net/?url=https%3A%2F%2Fwwwnc.cdc.gov%2Ftravel%2Frss%2Fnotices.xml&limit=1&showtitle=false&type=js"></script>
            </div>
        </div>


        <div id="footer"></div>

    </body>    

    
    
</html>