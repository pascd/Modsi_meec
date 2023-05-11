<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sistema de vacinação Portuguesa | Gerir Vagas</title>

    <!-- Favicon  -->
    <link rel="icon" href="../../img/Vaccine.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../../style.css">

</head>

<body>
    
        <!-- ***** Header Area Start ***** -->
        <script src="../../jquery-3.6.4.min.js"></script>
        <script> 
            $(function(){
            $("#header-area").load("../../menu_bar.php"); 
            });
        </script>   
        <div id="header-area"></div>
        <!-- ***** Header Area End ***** -->

        <br><br><br><br>
        <br><br><br><br>
        <br><br>
    <p>

    <!-- ***** Book An Appoinment Area Start ***** -->
    <div class="medilife-book-an-appoinment-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="appointment-form-content">
                        <div class="row no-gutters align-items-center">
                            <div class="col-12 col-lg-9">
                                <div class="medilife-appointment-form">
                                    <h3 style="color: #ffffff;">Introduzir vagas para vacinação</h3>

                                    <form action="#" method="post">
                                        <div class="row align-items-end">
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="vacinas" style="color: #ffffff;">Vacina</label>
                                                    <select class="form-control" id="vacinas">
                                                        <option id="id_vacina_covid" name="vacinas" value="Covid">Covid-19</option>
                                                        <option id="id_vacina_hepatite" name="vacinas" value="Hepatite">Hepatite</option>
                                                        <option id="id_vacina_tetano" name="vacinas" value="Tetano">Tetano</option>
                                                        <option id="id_vacina_sarampo" name="vacinas" value="Sarampo">Sarampo</option>
                                                    </select><br><br>
                                                    <div id="vacina-erro" class="error"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" id="id_data" name="date" id="date" placeholder="Dia">
                                                    <br><br><div id="data-erro" class="error"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <div class="form-group">
                                                    <input type="time" class="form-control" id="id_hora" name="time" id="time" placeholder="Hora">
                                                    <br><br><div id="hora-erro" class="error"></div>        
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="id_vagas" style="color: #ffffff;">Número a Administrar</label>
                                                    <input type="number" class="form-control border-top-0 border-right-0 border-left-0" id="id_vagas" name="vagas" placeholder="Número">
                                                    <br><br>
                                                    <div id="vagas-erro" class="error"></div>   
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-5 mb-0">
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn medilife-btn">Submeter Vagas<span>+</span></button>
                                                    <br><br><div id="vagas-check" class="error"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="medilife-contact-info">
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info mb-30">
                                        <img src="img/icons/alarm-clock.png" alt="">
                                        <p>2ª a 6ª - 09h30h às 20h <br>FECHADO aos Fim de Semana</p>
                                    </div>
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info mb-30">
                                        <img src="img/icons/envelope.png" alt="">
                                        <p>+351 22 83 40 500 <br>1181808@isep.ipp.pt<br>1190937@isep.ipp.pt<br>1190939@isep.ipp.pt</p>
                                    </div>
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info">
                                        <img src="img/icons/map-pin.png" alt="">
                                        <p>Rua Dr. António Bernardino de Almeida, 431 <br>4249-015 Porto</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Book An Appoinment Area End ***** -->
    <br><br><br><br>
    
    <!-- ***** Footer Area Start ***** -->
    <script>
        $(function(){
        $("#footer-area").load("../../footer.php");
        });
    </script>   
    <div id="footer-area"></div>
    <!-- ***** Footer Area End ***** -->
</body>

</html>