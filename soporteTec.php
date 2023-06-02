<?php
//*************INICIO DE SESION****************************************************************************
session_start();
require "../../acnxerdm/cnx.php";
//***********************FIN INICIO DE SESION**************************************************************
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Panel de Control</title>
<link rel="icon" href="../icono/implementtaIcon.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link href="../fontawesome/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css" id="theme-styles">
<style>
  body {
        background-image: url(../img/back.jpg);
        background-repeat: repeat;
        background-size: 100%;
        background-attachment: fixed;
        overflow-x: hidden; /* ocultar scrolBar horizontal*/
}
    body {
    font-family: sans-serif;
    font-style: normal;
    font-weight:normal;
    width: 100%;
    height: 100%;
    margin-top:-2%;
    padding-top:0px;
}
    .jumbotron {
        margin-top:0%;
        margin-bottom:0%;
        padding-top:4%;
        padding-bottom:1%;
}
    .padding {
        padding-right:15%;
        padding-left:15%;
    }
</style>
<?php require "include/nav.php"; ?>
</head>
<body>
    <div class="container">
    <h1 style="text-shadow: 1px 1px 2px #717171;">Soporte Tecnico</h1>
    <h3 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/fluency/48/000000/approved-delivery.png"/> Implementta Administracion</h3>
    <hr>
       
       
       
       
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">WS Ensenada Agua</h5>
            <p class="card-text">Proceso de consumo de Web Service de la plaza Ensenada Agua.</p>
            <a href="../WebServices/wsEnsenada.php" class="btn btn-primary btn-sm"><i class="fas fa-server"></i> WS EnsenadaA</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Fichas Toluca Agua</h5>
            <p class="card-text">Generar fichas PDF de plaza TolucaA</p>
            <a href="../aFichasImplementta/cargaPlantilla.php" class="btn btn-warning btn-sm"><i class="fas fa-file-pdf"></i> Fichas TolucaA</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">WS Mexicali Agua</h5>
              <p class="card-text">Proceso de consumo de Web Service.</p>
              <a href="../WebServices/WSMexicali/WSMexicali.php" class="btn btn-dark btn-sm call-webservice-mexicali"><i class="fas fa-server"></i> WS Mexicali Agua</a>
            </div>
          </div>
        </div>
    </div>
       
       
       
       
       
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
    
    </div>
<br><br><br>
<!--*************************INICIO FOOTER***********************************************************************-->
<nav class="navbar sticky-bottom navbar-expand-lg">
    <span class="navbar-text" style="font-size:12px;font-weigth:normal;color: #7a7a7a;">
        Implementta Web <i class="far fa-registered"></i><br>
        Estrategas de México <i class="far fa-registered"></i><br>
        Centro de Inteligencia Informática y Geografía Aplicada CIIGA
        <hr style="width:105%;border-color:#7a7a7a;">
        Created and designed by <i class="far fa-copyright"></i> 2021 Estrategas de México<br>
    </span><hr>
    <span class="navbar-text" style="font-size:12px;font-weigth:normal;color: #7a7a7a;">
        Contacto:<br>
        <i class="fas fa-phone-alt"></i> Red: 187<br>
        <i class="fas fa-phone-alt"></i> 66 4120 1451<br>
        <i class="fas fa-envelope"></i> sistemas@estrategas.mx<br>
    </span>
    <ul class="navbar-nav mr-auto">
        <br><br><br><br><br><br><br><br>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a href="../../index.php"><img src="../img/logoImplementta.png" width="155" height="150" alt=""></a>
        <a href="http://estrategas.mx/" target="_blank"><img src="../img/logoTop.png" width="200" height="85" alt=""></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </form>
</nav>
<!--***********************************FIN FOOTER****************************************************************-->
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/wsmexicali.js"></script>
<script>
  var wsmexicali = new WSMexicali();
  wsmexicali.init();
</script>
</html>