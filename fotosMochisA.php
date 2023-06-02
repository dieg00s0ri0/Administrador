<?php
$serverName = "implementta.mx";
$connectionInfo = array( 'Database'=>'implementtaMochisA', 'UID'=>'sa', 'PWD'=>'vrSxHH3TdC', 'Encrypt' => true, 'TrustServerCertificate'=> true);
$cnx = sqlsrv_connect($serverName, $connectionInfo);
date_default_timezone_set('America/Mexico_City');


$da="select * from registro_formato_ficha";
$dat=sqlsrv_query($cnx,$da);
$datos=sqlsrv_fetch_array($dat);

do{
    
    $cuenta=$datos['cuenta'];
    $va="select * from registrofotomovil
    where cuenta='$cuenta' order by fechaCaptura DESC";
    $val=sqlsrv_query($cnx,$va);
    $valida=sqlsrv_fetch_array($val);
    
if(isset($valida)){
    
    $foto=$valida['urlImagen'];
    $datos="update registro_formato_ficha set foto1='$foto'
    where cuenta='$cuenta'";
    sqlsrv_query($cnx,$datos) or die ('No se ejecuto la consulta update datosart');
    
    
} else{
    $datos="update registro_formato_ficha set foto1='https://implementta.net/fotos/sin_foto.gif'
    where cuenta='$cuenta'";
    sqlsrv_query($cnx,$datos) or die ('No se ejecuto la consulta update else');
}
    
    
    

    
    
} while($datos=sqlsrv_fetch_array($dat));

echo '<script> alert("PROCESO TERMINADO")</script>';
















?>