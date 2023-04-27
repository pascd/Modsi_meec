<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="../styles.css">

    <head>
        <link rel="icon" href="../img/Vaccine.png">

        <title>
            Sistema de vacinação Portuguesa
        </title>
    </head>

    <body href="#home">
        <h1>
            Sistema de vacinação Portuguesa!
        </h1>

        <script src="../jquery-3.6.4.min.js"></script>
        <script> 
            $(function(){
            $("#menu_bar").load("../menu_bar.php"); 
            });
        </script>   

        <div id="menu_bar"></div>
        <p>
            Neste site será possível agendar vacinações nos diferentes centros de saúde portugueses
        </p>
        
        <button>
            Agendar Vacinação
        </button>

        <p>Fique a par das novidades!</p>
        <div class="newsfeed">
            <div class="nf">
                <script src="//rss.bloople.net/?url=https%3A%2F%2Frssfeeds.webmd.com%2Frss%2Frss.aspx%3FRSSSource%3DRSS_PUBLIC&limit=1&showtitle=false&type=js"></script>            
            </div>

            <div class="nf">
                <script src="//rss.bloople.net/?url=https%3A%2F%2Fwww.modernhealthcare.com%2Fsection%2Frss%2Fnews%3Fdays%3D7%26topics%3D81631&limit=1&showtitle=false&type=js"></script>
            </div>

            <!--https://www.dgs.pt/upload/DGSv9/rss/c5002.xml É ISTO QUE TEMOS EM PORTUGAL, UM RSS FEED VAZIO DGS-->
            <div class="nf">
                <script src="//rss.bloople.net/?url=https%3A%2F%2Fwwwnc.cdc.gov%2Ftravel%2Frss%2Fnotices.xml&limit=1&showtitle=false&type=js"></script>
            </div>
        </div>

    </body>    

    <footer class="footer" id="contactos">
        <br>
        <a class="legal t">© 2023 - 2023 Modelação e Simulação Industrial  | Porto, Portugal</a>
        <br><br>
        <div>
            <a class="legal email" href="mailto:1181808@isep.ipp.pt" target="_blank">1181808@isep.ipp.pt</a>
            <a class="legal email" href="mailto:1190937@isep.ipp.pt" target="_blank">1190937@isep.ipp.pt</a>
            <a class="legal email" href="mailto:1190939@isep.ipp.pt" target="_blank">1190939@isep.ipp.pt</a>
        </div>
        
        <a id="pt" href="?lang=pt" class="pt">Português</a>
        <a id="en" href="?lang=en" class="en">English</a>
        <br><br>
     </footer>
    
</html>