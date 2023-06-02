<?php
//*************INICIO DE SESION****************************************************************************
session_start();
require "../../acnxerdm/cnx.php";
//********VERIFICANDO DATABASES DE IMPLEMENTTA************************************
    $da="SELECT name FROM sys.databases
    where name like '%implementta%'";
    $base=sqlsrv_query($cnx,$da);
    $datBase=sqlsrv_fetch_array($base);

//********FIN VERIFICANDO DATABASES DE IMPLEMENTTA************************************
//******************LISTA DE PLAZAS DADAS DE ALTA*********************************
    $pl="SELECT * FROM proveniente";
    $plz=sqlsrv_query($cnx,$pl);
    $plaza=sqlsrv_fetch_array($plz);

//*****************LISTA DE PLAZAS DADAS DE ALTA**********************************
//*********************************** INICIO INSERT PLZ *******************************************************
if(isset($_POST['save'])){
    $nombre=$_POST['nombreOrigen'];
    $base=$_POST['base'];
    $val="select * from proveniente
    where nombreProveniente='$nombre' or data='$base'";
    $vali=sqlsrv_query($cnx,$val);
    $valida=sqlsrv_fetch_array($vali);
if($valida){
    echo '<script>alert("El origen de datos ya esta agregado. \nVerifique registro")</script>';
    echo '<meta http-equiv="refresh" content="0,url=origen.php">';
} else{
    $unidad="insert into proveniente values ('$nombre','$base')";
		sqlsrv_query($cnx,$unidad) or die ('No se ejecuto la consulta isert nuevo origen de datos');
        echo '<script>alert("Origen de datos agregado correctamente")</script>';
        echo '<meta http-equiv="refresh" content="0,url=origen.php">';
    }
}
//************************ FIN INSERT PLZ ******************************************************************
//****************************ACTUALIZAR DATOS DE USUARIO******************************************************
if(isset($_POST['update'])){
    $idprov=$_POST['idprov'];
    $name=$_POST['nombre'];
    $data=$_POST['datos'];
    
    $datos="update proveniente set nombreProveniente='$name',data='$data'
    where id_proveniente='$idprov'";
    sqlsrv_query($cnx,$datos) or die ('No se ejecuto la consulta update datosart');
    echo '<script> alert("Resgistro Actulizado.")</script>'; 
    echo '<meta http-equiv="refresh" content="0,url=origen.php">';
}
//****************************FIN ACTUALIAR DATOS DE USUARIO***************************************************    

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Origen de Datos</title>
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
    <h1 style="text-shadow: 1px 1px 2px #717171;">Implementta Web</h1>
    <h4 style="text-shadow: 1px 1px 2px #717171;"><i class="fas fa-database"></i> Agregar nuevo origen de datos</h4>
    <div class="alert alert-info" role="alert">
      <i class="fas fa-code"></i> Para asegurar el correcto funcionamiento de la plataforma, confirme datos con el área de sistemas.
    </div>
<form action="" method="post">
<div class="jumbotron">
    
    <div class="form-row">
    <div class="col-md-6">
    <div class="form-group" style="text-align:center;">
    <label for="exampleInputEmail1">Nombre: *</label>
    <input style="text-align:center;" type="text" class="form-control" name="nombreOrigen" placeholder="Nombre del recurso o plaza" required autofocus>
  </div>
    </div>
    <div class="col-md-6"> 
    <div class="form-group" style="text-align:center;">
        <label for="exampleFormControlSelect1">Base de datos: *</label>
        <select class="form-control" name="base" required>
          <option value="">Selecciona una opcion</option>
        <?php do{ ?>
            <option value="<?php echo $datBase['name'] ?>"><?php echo $datBase['name'] ?></option>
        <?php } while($datBase=sqlsrv_fetch_array($base)); ?>
        </select>
    </div>  
    </div>
</div>
    <small id="e" class="form-text text-muted" style="font-size:14px;">*Todos los campos son requeridos.<br>
    El origen de la base de datos es proveniente del SQLserver Implementta.<br>
    Si no conoce el nombre correcto del recurso db, contacte al área de sistemas.</small>
<div style="text-align:right;">
    <button type="submit" class="btn btn-primary " name="save"><i class="fas fa-plus"></i> Agregar nuevo origen de datos</button>
</div>
    </div>
</form>
    
    
    
    
    <br><hr><br>
    <h3 style="text-shadow: 1px 1px 2px #717171;"><i class="fas fa-server"></i> Editar Origen de datos</h3>
    <br>
</div>
<div class="container">
<?php if(isset($plaza)){ ?>    
<table class="table table-sm table-hover">
  <thead>
    <tr align="left">
      <th scope="col">Nombre</th>
      <th scope="col">DB implementta SQLserver</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php do{ ?>  
    <tr align="left">
      <td><?php echo $plaza['nombreProveniente'] ?></td>
      <td><?php echo $plaza['data'] ?></td>
      <td>
          
    <a href="" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#datos<?php echo $plaza['id_proveniente'] ?>"><span aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Datos de origen"><i class="far fa-edit"></i></span></a>
          
    <a href="delete.php?poneorigen=1&origen=<?php echo $plaza['id_proveniente'] ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar Origen de datos" onclick="return Confirmar('¿Esta seguro que decea eliminar el origen de datos <?php echo $plaza['nombreProveniente'] ?>?')"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
  </tbody>
<!-- *********************************MODAL PARA ACTUALIZAR UDATOS *************************************************** -->
<form action="" method="post">
<div class="modal fade" id="datos<?php echo $plaza['id_proveniente'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="text-shadow: 0px 0px 2px #717171;">Editar origen de datos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="exampleInputEmail1">Nombre: *</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $plaza['nombreProveniente'] ?>" required>
          <br>
        <label for="exampleInputEmail1">Base de datos: *</label>
        <input type="text" class="form-control" name="datos" value="<?php echo $plaza['data'] ?>" required>
            <small id="e" class="form-text text-muted" style="font-size:14px;">*Todos los campos son requeridos.<br> 
            El origen de la base de datos es proveniente del SQLserver Implementta.<br> 
            Si no conoce el nombre correcto del recurso db, contacte al área de sistemas.</small>
      </div>
      <div class="modal-footer">
        <input type="hidden" class="form-control" name="idprov" value="<?php echo $plaza['id_proveniente'] ?>">
          <button type="submit" class="btn btn-primary" name="update">Actualizar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>
</form>    
<!-- ***********************************FIN MODAL ACTUALIZAR DATOS *************************************************** -->   
<?php } while($plaza=sqlsrv_fetch_array($plz)); ?>
    </table>
<?php } else{ ?>
    <div class="alert alert-danger" role="alert">
      <i class="fas fa-info-circle"></i> Aun no hay nombres de origen de datos para mostrar
    </div>
<?php } ?>
    </div>
<br><br>
    <div style="text-align:center;">
        <a href="addplz.php" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Regresar a ver plazas</a>
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
</html>