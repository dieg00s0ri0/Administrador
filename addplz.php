<?php
session_start();
//if((isset($_SESSION['user'])) and (isset($_SESSION['tipousuario']))){
require "../../acnxerdm/cnx.php";

    $pl="SELECT * FROM plaza
    left join proveniente on proveniente.id_proveniente=plaza.id_proveniente";
    $plz=sqlsrv_query($cnx,$pl);
    $plaza=sqlsrv_fetch_array($plz);
    
    $pro="SELECT * FROM proveniente";
    $prov=sqlsrv_query($cnx,$pro);
    $prove=sqlsrv_fetch_array($prov);

//*********************************** INICIO INSERT PLZ *******************************************************
if(isset($_POST['save'])){
    $nombre=$_POST['nombre'];
    $origen=$_POST['prov'];
    $val="select * from plaza
    where nombreplaza='$nombre'";
    $vali=sqlsrv_query($cnx,$val);
    $valida=sqlsrv_fetch_array($vali);
if($valida){
    echo '<script>alert("El nombre de plaza ya esta agregado. \nVerifique registro")</script>';
    echo '<meta http-equiv="refresh" content="0,url=addplz.php">';
} else{
    $unidad="insert into plaza values ('$origen','$nombre')";
		sqlsrv_query($cnx,$unidad) or die ('No se ejecuto la consulta isert nueva plz');
        echo '<script>alert("Plaza agregada correctamente")</script>';
        echo '<meta http-equiv="refresh" content="0,url=addplz.php">';
    }
}
//************************ FIN INSERT PLZ ******************************************************************
//****************************ACTUALIZAR DATOS DE USUARIO******************************************************
if(isset($_POST['update'])){
    $idplaza=$_POST['idplz'];
    $name=$_POST['nombreplz'];
    $prov=$_POST['prov'];
    
    $datos="update plaza set nombreplaza='$name',id_proveniente='$prov'
    where id_plaza='$idplaza'";
    sqlsrv_query($cnx,$datos) or die ('No se ejecuto la consulta update datosart');
    echo '<script> alert("Resgistro Actulizado.")</script>'; 
    echo '<meta http-equiv="refresh" content="0,url=addplz.php">';
}
//****************************FIN ACTUALIAR DATOS DE USUARIO***************************************************
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Implementta | Plazas</title>
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
            overflow-x: hidden;
            /* ocultar scrolBar horizontal*/
        }

        body {
            font-family: sans-serif;
            font-style: normal;
            font-weight: normal;
            width: 100%;
            height: 100%;
            margin-top: -2%;
            padding-top: 0px;
        }

        .jumbotron {
            margin-top: 0%;
            margin-bottom: 0%;
            padding-top: 4%;
            padding-bottom: 1%;
        }

        .padding {
            padding-right: 15%;
            padding-left: 15%;
        }

    </style>
    <?php require "include/nav.php"; ?>
</head>

<body>
    <div class="container">
        <h1 style="text-shadow: 1px 1px 2px #717171;">Panel de control</h1>
        <h3 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/external-filled-outline-wichaiwi/48/000000/external-office-digital-economy-filled-outline-wichaiwi-2.png" /> Agregar nueva plaza</h3>
        <hr>



        <form action="" method="post">
            <div class="jumbotron">
                <div class="form-group" style="text-align:center;">
                    <label for="exampleInputEmail1">Nombre de la plaza: *</label>
                    <input style="text-align:center;" type="text" class="form-control" name="nombre" placeholder="Nombre de la nueva plaza" required>
                </div>


                <div class="form-row">
                    <div class="col-md-6">
                        <div class="md-form form-group">
                            <label for="exampleInputEmail1">Origen de datos: *</label>
                            <select name="prov" class="form-control" required>
                                <option value="">Selecciona una opcion</option>
                                <?php 
            if(isset($prove)){    
                do{ ?>
                                <option value="<?php echo $prove['id_proveniente'] ?>"><?php echo ucwords(strtolower($prove['nombreProveniente'])) ?></option>
                                <?php } while($prove=sqlsrv_fetch_array($prov)); 
            } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <small id="e" class="form-text text-muted" style="font-size:14px;">*Todos los campos son requeridos.</small>
                <div style="text-align:right;">
                    <button type="submit" class="btn btn-primary " name="save"><i class="fas fa-plus"></i> Agregar nueva plaza</button>
                </div>
            </div>
        </form>
        <br>
        <div style="text-align:left;">
            <a href="origen.php" class="btn btn-dark btn-sm"><i class="fas fa-database"></i> Nuevo origen de datos</a>
        </div>
        <hr>
        <h3 style="text-shadow: 1px 1px 2px #717171;"><i class="fas fa-wrench"></i>Editar plazas</h3>
        <hr>






        <div class="container">
            <?php if(isset($plaza)){ ?>
            <table class="table table-sm table-hover">
                <thead>
                    <tr align="center">
                        <th scope="col">Plaza</th>
                        <th scope="col">Origen de datos</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php do{ ?>
                    <tr align="center">
                        <td><?php echo $plaza['nombreplaza'] ?></td>
                        <td><?php echo $plaza['nombreProveniente'] ?></td>
                        <td>
                            <a href="#" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Agregar URL de mapa"><i class="fas fa-users"></i> Colaboradores</a>

                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#datos<?php echo $plaza['id_plaza'] ?>"><span aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Datos de plaza"><i class="far fa-edit"></i></span></a>

                            <a href="delete.php?poneplz=1&plz=<?php echo $plaza['id_plaza'] ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar plaza" onclick="return Confirmar('¿Esta seguro que decea eliminar la plaza <?php echo $plaza['nombreplaza'] ?>?')"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
                <!-- *********************************MODAL PARA ACTUALIZAR UDATOS *************************************************** -->
                <form action="" method="post">
                    <div class="modal fade" id="datos<?php echo $plaza['id_plaza'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" style="text-shadow: 0px 0px 2px #717171;">Editar nombre de plaza</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php  
                                    $pro="SELECT * FROM proveniente";
                                    $prov=sqlsrv_query($cnx,$pro);
                                    $prove=sqlsrv_fetch_array($prov);
                                      ?>
                                    <label for="exampleInputEmail1">Editar nombre de plaza: </label>
                                    <input type="text" class="form-control" name="nombreplz" value="<?php echo $plaza['nombreplaza'] ?>" required>
                                    <br>
                                    <div class="md-form form-group">
                                        <label for="exampleInputEmail1">Datos provenientes: *</label>
                                        <select name="prov" class="form-control" required>
                                            <option value="<?php echo $plaza['id_proveniente'] ?>"><?php echo $plaza['nombreProveniente'] ?></option>
                                            <?php do{ ?>
                                            <option value="<?php echo $prove['id_proveniente'] ?>"><?php echo ucwords(strtolower($prove['nombreProveniente'])) ?></option>
                                            <?php } while($prove=sqlsrv_fetch_array($prov)); ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" class="form-control" name="idplz" value="<?php echo $plaza['id_plaza'] ?>" placeholder="Agregar marca">
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
            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle"></i> Aun no hay plazas para mostrar
            </div>
            <?php } ?>
        </div>
        <br><br>
        <div style="text-align:center;">
            <a href="config.php" class="btn btn-dark btn-sm"><i class="fas fa-chevron-left"></i> Regresar a panel de control</a>
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
            Created and designed by <i class="far fa-copyright"></i> <?php echo date('Y') ?> Estrategas de México<br>
        </span>
        <hr>
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
