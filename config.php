<!DOCTYPE html>
<?php
session_start();
require "../../acnxerdm/cnx.php";

$us = "select * from plaza";
$usr = sqlsrv_query($cnx, $us);
$plazas = sqlsrv_fetch_array($usr);

//************ver usuarios***********************

if (isset($_POST['verUsers'])) {
    $_SESSION['plz'] = $usuario['id_plaza'];
    echo '<meta http-equiv="refresh" content="2,url=login.php">';
}

//**********fin ver usuarios**********************

?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel de Control</title>
    <link rel="icon" href="../icono/implementtaIcon.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="sweetalert/alertas.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css" id="theme-styles">
    <style>
        body {
            background-image: url(../img/back.jpg);
            background-repeat: repeat;
            background-size: 100%;
            background-attachment: fixed;
        }

        body {
            font-family: sans-serif;
            font-style: normal;
            font-weight: bold;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
<?php if (isset($_GET['error_archivo'])) { ?>
    <script> error('El archivo no es correcto') </script>;
  <?php } ?>
<?php if (isset($_GET['error_mes'])) { ?>
    <script> error('selecciona un mes') </script>;
  <?php } ?>
<?php if (isset($_GET['error'])) { ?>
    <script> error('Error de peticion, intentelo nuevamente') </script>;
  <?php } ?>
<?php if (isset($_GET['error_sin_datos'])) { ?>
    <script> error('el archivo no tienen datos') </script>;
  <?php } ?>
<?php if (isset($_GET['error_store'])) { ?>
    <script> error('el archivo no tienen datos') </script>;
  <?php } ?>
<?php if (isset($_GET['datos_guardados'])) { ?>
    <script> compilado('Datos Guardados Correctamente') </script>;
  <?php } ?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper" style="text-align:center;">
            <div class="sidebar-heading border-bottom bg-light"><a href="selectSistem.php"><img src="../img/logoImplementtaHorizontal.png" width="200" height="65" alt=""></a></div>
            <div class="list-group list-group-flush" style="text-align:left;">
                <h5><a href="config.php" class="badge badge-primary" style="text-decoration:none;"><i class="fas fa-user-cog"></i> Admin Implementta</a></h5>
                <?php do { ?>
                    <a href="config.php?codplz=<?php echo $plazas['id_plaza'] ?>" class="list-group-item list-group-item-action list-group-item-light"><i class="fas fa-angle-right"></i> <?php echo $plazas['nombreplaza'] ?></a>
                <?php } while ($plazas = sqlsrv_fetch_array($usr)); ?>
                <br>
            </div>
        </div>


        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Page content-->
            <div class="container-fluid">


                <br>

                <?php if (isset($_GET['codplz'])) {

                    $idPlz = $_GET['codplz'];
                    $uss = "select * from plaza where id_plaza='$idPlz'";
                    $usrs = sqlsrv_query($cnx, $uss);
                    $plaza = sqlsrv_fetch_array($usrs);

                ?>
                    <div class="container">
                        <h1 style="text-shadow: 1px 1px 2px #717171;">Panel de control</h1>
                        <h4 style="text-shadow: 1px 1px 2px #717171;"><img src="../icono/implementtaIcon.png" class="img-fluid" alt="Responsive image" width="4%"> Implementta Panel de Administracion</h4>
                        <h4 style="text-shadow: 1px 1px 2px #717171;">Plaza <?php echo $plaza['nombreplaza'] ?></h4>
                        <hr>


                        <div class="card-columns">

                            <div class="card">
                                <a href="#" class="btn btn-secondary btn-sm">
                                    <img class="card-img-top" src="../img/imgAdmin/administracion.png" alt="Card image cap" width="50%" height="5%">
                                </a>
                            </div>

                            <form action="" method="post">
                                <div class="card">
                                    <!--                            <a href="usuarios.php?plz=<? php // echo $_GET['codplz'].'&adm=1' 
                                                                                                ?>" class="btn btn-dark btn-lg btn-block">-->
                                    <button type="submit" class="btn btn-dark btn-lg btn-block" name="verUsers">
                                        <img src="https://img.icons8.com/fluency/65/000000/conference-call.png" />
                                        <h4 style="text-shadow: 1px 1px 2px #717171;"> Usuarios Implementta</h4>
                                    </button>
                                    <!--                            </a>-->
                                </div>
                            </form>


                            <div class="card">
                                <a href="../excluir/excluirCuenta.php?plz=<?php echo $_GET['codplz'] ?>" class="btn btn-lg btn-block btn-outline-dark">
                                    <h4 style="text-shadow: 1px 1px 2px #717171;">Excluir cuentas <img src="https://img.icons8.com/fluency/40/000000/logout-rounded.png" /></h4>
                                </a>
                            </div>
                            <div class="card">
                                <a href="../desasignacion/inicio2.php?plz=<?php echo $_GET['codplz'] ?>" class="btn btn-lg btn-block btn-outline-dark">
                                    <h4 style="text-shadow: 1px 1px 2px #717171;">Desasignaciones <img src="https://img.icons8.com/external-flaticons-flat-flat-icons/40/000000/external-emergency-exit-emergency-services-flaticons-flat-flat-icons.png" /></h4>
                                </a>
                            </div>
                            <div class="card">
                                <a href="../cambiarTarea/inicio.php?plz=<?php echo $_GET['codplz'] ?>" class="btn btn-lg btn-block btn-dark">
                                    <h4 style="text-shadow: 1px 1px 2px #717171;">Modificar Gestiones <img src="https://img.icons8.com/fluency/40/FFFFFF/tasks.png" /></h4>
                                </a>
                            </div>

                            <?php if ($_GET['codplz'] == 15) { ?>
                                <div class="card">
                                    <a href="../WebServices/wsobtenersaldos.php" class="btn btn-lg btn-block btn-outline-dark">
                                        <h4 style="text-shadow: 1px 1px 2px #717171;">WS Consulta de Saldos <img src="https://img.icons8.com/fluency/40/null/download-from-cloud.png" /></h4>
                                    </a>
                                </div>
                            <?php } ?>
                            <!-- llamadas mexicali -->
                            <?php if ($_GET['codplz'] == 1029) { ?>
                                <div class="card">

                                    <a target="_blank" class="btn btn-lg btn-block btn-outline-dark" data-toggle="modal" data-target="#modal-llamadas" href="#">
                                        <h4 style="text-shadow: 1px 1px 2px #717171;">Cargar excel de llamadas <img src="https://img.icons8.com/fluency/40/upload-to-cloud.png" alt="upload-to-cloud" /></h4>
                                    </a>

                                </div>
                            <?php } ?>



                        <?php } else { ?>

                            <div class="alert alert-secondary" role="alert">
                                <i class="fas fa-chevron-left"></i> Selecciona una plaza para ver módulos de administración.
                            </div>


                            <hr>

                            <div class="card-columns">
                                <div class="card">
                                    <a href="soporteTec.php" class="btn btn-outline-primary btn-sm">
                                        <img class="card-img-top" src="../img/imgAdmin/Soporte.png" alt="Card image cap" width="50%" height="5%">
                                    </a>
                                </div>


                                <div class="card">
                                    <a href="addplz.php" class="btn btn-outline-dark btn-lg btn-block">
                                        <h4 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/fluency/40/000000/data-configuration.png" /> Plazas Implementta</h4>
                                    </a>
                                </div>
                                <div class="card">
                                    <a href="addplz.php" class="btn btn-outline-dark btn-lg btn-block">
                                        <h4 style="text-shadow: 1px 1px 2px #717171;"><img src="https://img.icons8.com/fluency/40/000000/module.png" /> Disponible</h4>
                                    </a>
                                </div>
                                <!--
                    <div class="card">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
-->

                                <div class="card">
                                    <a href="#" class="btn btn-secondary btn-sm">
                                        <img class="card-img-top" src="../img/imgAdmin/administracion.png" alt="Card image cap" width="50%" height="5%">
                                    </a>
                                </div>

                                <div class="card">
                                    <a href="#" class="btn btn-outline-light btn-sm">
                                        <img class="card-img-top" src="../img/imgAdmin/cartografia.png" alt="Card image cap" width="50%" height="5%">
                                    </a>

                                </div>
                            </div>
                        <?php } ?>



                        </div>
                    </div>
            </div>
        </div>
        <!-- modal subir excel llamadas mexicali -->
        <div id="modal-llamadas" class="modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <form action="./llamadas/store_monitoreo.php" method="POST" onsubmit="javascript:loadInfo_llamadas();" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="codplz" value="<?php echo $_GET['codplz'] ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Cargar Excel duración de llamadas</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Reporte Monitoreo</label>
                                <input class="form-control form-control-sm" name="Rmonitoreo" id="Rmonitoreo" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                            </div>
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Monitoreo Isabel</label>
                                <input class="form-control form-control-sm" name="monitoreoI" id="monitoreoI" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                            </div>
                            <div class="row">
                                <div class="row align-items-start form-row">
                                    <div class="col-md-6">
                                        <label for="cuenta" class="form-label mb-2">Mes a subir:*</label>
                                        <select class="form-select form-select-sm" name="mes" aria-label=".form-select-sm example" required>
                                            <option selected value=0>-- selecciona una opción --</option>
                                            <option value=1>Enero</option>
                                            <option value=2>Febrero</option>
                                            <option value=3>Marzo</option>
                                            <option value=4>Abril</option>
                                            <option value=5>Mayo</option>
                                            <option value=6>Junio</option>
                                            <option value=7>Julio</option>
                                            <option value=8>Agosto</option>
                                            <option value=9>Septiembre</option>
                                            <option value=10>Octubre</option>
                                            <option value=11>Noviembre</option>
                                            <option value=12>Diciembre</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cuenta" class="form-label mb-2">Anio:*</label>
                                        <input type="number" value="<?php echo date('Y') ?>" class="form-control form-control-sm" name="anio">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Subir Archivo</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <? php // } else{
    // header('location:inicio.php');
    //}
    ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
    <script>
        // alert carga llamadas
        var loadInfo_llamadas = function() {
            Swal.fire({
                title: 'Insertando Datos',
                html: 'Espere un momento',
                timer: 0,
                timerProgressBar: true,
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    return false;
                }
            }).then((result) => {});
        }
    </script>
</body>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

</html>