<?php
session_start();
require "../../acnxerdm/cnx.php";
//*******************************************************************************
if(isset($_GET['adm'])){
    $idplz=$_GET['plz'];
} else{
    $idplz=$_SESSION['plz'];
}

    $pl="select * from plaza
    where id_plaza='$idplz'";
    $pla=sqlsrv_query($cnx,$pl);
    $plaza=sqlsrv_fetch_array($pla);

//*******************************************************************************
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Usuarios Implementta</title>
<link rel="icon" href="../icono/implementtaIcon.png">
<!-- Bootstrap -->
<link rel="stylesheet" href="../css/bootstrap.css">
<link href="../fontawesome/css/all.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../js/ajaxUsers.js"></script>
<style>
    body{
        background-image: url(../img/back.jpg);
        background-repeat: repeat;
        background-size: 100%;
        background-attachment: fixed;
        overflow-x: hidden; /* ocultar scrolBar horizontal*/
    }
    body{
    font-family: sans-serif;
    font-style: normal;
    font-weight:bold;
    width: 100%;
    height: 100%;
    margin-top:-1%;
    padding-top:0px;
    }
    .jumbotron {
        margin-top:0%;
        margin-bottom:0%;
        padding-top:3%;
        padding-bottom:2%;
    }
    .padding {
        padding-right:35%;
        padding-left:35%;
    }
</style>
<?php require "include/nav.php"; ?>
</head>
<body>
<div class="container">
    <h2 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/fluency/50/000000/conference.png"/> Usuarios Implementta</h2>
    <h4 style="text-shadow: 1px 1px 2px #717171;">Plaza <?php echo $plaza['nombreplaza'] ?></h4>
    <hr>

<form action="" method="post">
  
  
<div class="form-row">
    <div class="col-md-6">
        <div style="text-align:center;">
            <a href="addUsr.php?plz=<?php echo $_GET['plz'].'&adm=1' ?>" class="btn btn-primary btn-sm"><i class="fas fa-user-plus"></i> Agregar Nuevo Usuario</a>
        </div>
    </div>
    <div class="col-md-6">
      <div class="input-group justify-content-center">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-search"></i></span>
        </div>
        <input type="text" class="form-control border border-secondary" placeholder="Buscar nombre de usuario" name="alumnos" id="busqueda" required autofocus>
        <input type="hidden" class="form-control border border-secondary" value="<?php echo $idplz ?>" name="mp" id="mp">
      </div>
    </div>
</div>
<br>

<section id="tabla_resultado" style="text-align:center;">
<!-- **********tabla resultado******** -->
</section>

<br><br>
<div style="text-align:center;">
    <?php if(isset($_GET['adm'])){ ?>
        <a href="config.php?codplz=<?php echo $_GET['plz'] ?>" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Regresar</a>
    <?php } else{ ?>
        <a href="config.php" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Regresar</a>
    <?php } ?>
</div>




</form>
</div>
<br><br>
    
<?php 
require "include/footer.php";
    ?>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script>
    function Confirmar(Mensaje){
        return (confirm(Mensaje))?true:false;
    }
</script>
</html>