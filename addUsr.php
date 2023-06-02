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
    $r="select * from rol";
    $ro=sqlsrv_query($cnx,$r);
    $rol=sqlsrv_fetch_array($ro);
//*******************************************************************************

if(isset ($_POST['add'])) {
    
    $nombre=$_POST['nombre'];
    $app=$_POST['app'];
    $apm=$_POST['apm'];
    $correo=$_POST['correo'];
    $password=$_POST['pass'];
    $plz=$idplz;
    $rol=$_POST['rol'];
    
    $va="select * from usuarioNuevo
    where correo='$correo'";
    $val=sqlsrv_query($cnx,$va);
    $valida=sqlsrv_fetch_array($val);
    
if(isset($valida)){
    echo '<script>alert("El correo ya está registrado en implementta.")</script>';
    echo '<meta http-equiv="refresh" content="0,url=usuarios.php">';
} else{
    
    if((($rol == 1) or ($rol == 6)) and ($_SESSION['rol'] <> 1)){
        echo '<script>alert("Su usuario no está autorizado para crear usuarios administradores, solamente el área de sistemas puede ejecutar esta acción.")</script>';
        echo '<meta http-equiv="refresh" content="0,url=usuarios.php">';
    } else{

        $usN="insert into usuarioNuevo (id_plaza,nombre,app,apm,correo) 
        values ('$plz','$nombre','$app','$apm','$correo')";
        sqlsrv_query($cnx,$usN) or die ('No se ejecuto la consulta isert usuarioNuevo');;
        
        $re="select * from usuarioNuevo
        where correo='$correo'";
        $reg=sqlsrv_query($cnx,$re);
        $registro=sqlsrv_fetch_array($reg);
        
        $idUsrNew=$registro['id_usuarioNuevo'];
        $us="insert into usuario (id_usuarioNuevo,clave,id_rol)
        values ('$idUsrNew','$password','$rol')";
        sqlsrv_query($cnx,$us) or die ('No se ejecuto la consulta isert usuario');;
        
        }
    }
}
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
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
<style>
  body {
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
    <h2 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/fluency/45/000000/user-male-circle.png"/> Nuevo usuario</h2>
    <h4 style="text-shadow: 1px 1px 2px #717171;">Plaza <?php echo $plaza['nombreplaza'] ?></h4>
    <hr>

<form action="" method="POST">
   
    <div class="form-row">
        <div class="col-md-4">
            <div class="md-form form-group">
                <label for="nombe" class="form-label">Nombre(s):*</label>
                <input type="text" name="nombre" class="form-control" required autofocus>
            </div>
        </div>
        <div class="col-md-4">
            <div class="md-form form-group">
                <label for="apellidop" class="form-label">Apellido paterno:*</label>
                <input type="text" name="app" id="apellidoP" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="md-form form-group">
                <label for="apellidoM" class="form-label">Apellido materno:*</label>
                <input type="text" name="apm" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class="md-form form-group">
                <label for="email" class="form-label">Email:*</label>
                <input type="email" name="correo" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="md-form form-group">
                <label for="contraseña" class="form-label">Contraseña:*</label>
                <input type="text" name="pass" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class="md-form form-group">
                <label for="contraseña" class="form-label">Rol de usuario:*</label>
                <select name="rol" class="form-control" required>
                    <option value="">Selecciona un rol de usuario</option>
                <?php do{ ?>
                    <option value="<?php echo $rol['id_rol'] ?>"><?php echo $rol['nomRol'] ?></option>
                <?php } while($rol=sqlsrv_fetch_array($ro)); ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
        
            <label for="contraseña" class="form-label"><br></label>
            <div style="text-align:center;">
            <?php if(isset($_GET['adm'])){ ?>   
                <a href="usuarios.php?plz=<?php echo $_GET['plz'].'&adm=1' ?>" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Cancelar</a>
            <?php } else{ ?>
                <a href="usuarios.php" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Cancelar</a>
            <?php } ?>
                <button type="submit" name="add" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Guardar nuevo usuario</button>
            </div>
            
        </div>
    </div>
    <hr>

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