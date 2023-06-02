<?php
session_start();
if(isset($_SESSION['user'])){
require "../../acnxerdm/cnx.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Implementta - Inicio</title>
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
    margin-top:-1%;
    margin-bottom:0%;
    padding-top:0px;
}
    .jumbotron {
        margin-top:0%;
        margin-bottom:0%;
        padding-top:4%;
        padding-bottom:1%;
}
    .padding {
/*        padding-right:15%;*/
        padding-left:14%;
    }
.carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='000000' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
}

.carousel-control-next-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='000000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
}
.carousel-indicators .active{
    background-color: #000000;
}    
.carousel-indicators li {
    background-color: #7a7a7a;
    }
</style>
<?php require "include/nav.php"; ?>
</head>
<body>
   
   
<!--<div class="container">   -->
   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

</nav>
  
<!--  </div>-->
  
<div class="container">  
<br>
   
    <div class="form-row padding" style="text-align:center;">
     
        <div class="form-group">    
            <a href="reportes.php" class="btn btn-light"><img src="../img/reportes.png" alt="..." class="rounded float-center" data-aos="fade" data-aos-duration="2000" height="110"></a>
            <h5 style="text-shadow: 0px 0px 2px #717171;" width="90%">Reportes</h5>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="form-group">    
            <a href="#" class="btn btn-light"><img src="../img/call.png" alt="..." class="rounded float-center" data-aos="fade" data-aos-duration="2000" height="110"></a>
            <h5 style="text-shadow: 0px 0px 2px #717171;" width="90%">CallCenter</h5>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="form-group">    
            <a href="https://gallant-driscoll.198-71-62-113.plesk.page/kpis/login.php" class="btn btn-light"><img src="../img/kpis.png" alt="..." class="rounded float-center" data-aos="fade" data-aos-duration="2000" height="110"></a>
            <h5 style="text-shadow: 0px 0px 2px #717171;" width="90%">KPIs</h5>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="form-group">    
            <a href="https://gallant-driscoll.198-71-62-113.plesk.page/cartomaps/login.php" class="btn btn-light"><img src="../img/fidi.png" alt="..." class="rounded float-center" data-aos="fade" data-aos-duration="2000" height="110"></a>
            <h5 style="text-shadow: 0px 0px 2px #717171;" width="90%">Fidi</h5>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="form-group">    
            <a href="#" class="btn btn-light"><img src="../img/directorio.png" alt="..." class="rounded float-center" data-aos="fade" data-aos-duration="2000" height="110"></a>
            <h5 style="text-shadow: 0px 0px 2px #717171;" width="90%">Directorio</h5>
        </div>
    </div>
</div>
   
   
   
<hr>
  
  
  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-aos="zoom-out-down" data-aos-duration="1600">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" data-aos="zoom-out-down" data-aos-duration="1600">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../img/carrusel/implementta1.png" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:#000000;text-shadow: 0px 0px 2px #717171;">Implementta Web ©</h5>
        <p style="color:#000000;text-shadow: 0px 0px 2px #717171;">Estrategas de México</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/carrusel/carto1.png" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:#000000;text-shadow: 0px 0px 2px #717171;">Sistema Fidi</h5>
        <p style="color:#000000;text-shadow: 0px 0px 2px #717171;">Sistema de información cartográfico </p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/carrusel/kpis1.png" alt="First slide">
<!--
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:#000000;text-shadow: 0px 0px 2px #717171;">Sistema de KPIs</h5>
        <p style="color:#000000;text-shadow: 0px 0px 2px #717171;">Indicadores clave de rendimiento</p>
      </div>
-->
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
  
  
  
  
   
   
   
   
   
   
</body>
<?php require "include/footer.php"; ?>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
 AOS.init();
 </script>      
<script>
<?php } else{
    echo '<meta http-equiv="refresh" content="1,url=../../login.php">';
} ?>
</html>