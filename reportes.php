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
<title>Implementta - Reportes</title>
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
</style>
<?php require "include/nav.php"; ?>
</head>
<body>
   
<?php require "../include/implementtaNav.php"; ?>
  <br>
<div style="text-align:center;">  
    <img src="../img/carrusel/reportesBaner.png" class="img-fluid" alt="Responsive image">
</div>
  <br>
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