<?php
session_start();
require "../../acnxerdm/cnx.php";
//********************************************************
if(isset($_GET['poneplz'])){
    $idplz=$_GET['plz'];
    
    $delaccess="DELETE FROM plaza WHERE id_plaza='$idplz'";
    sqlsrv_query($cnx,$delaccess);
        echo '<script> alert("Resgistro plaza Eliminado.")</script>';
    echo '<meta http-equiv="refresh" content="0,url=addplz.php">';
}
//****************************************************************************************
//****************************************************************************************
if(isset($_GET['poneorigen'])){
    $idorigen=$_GET['origen'];
    
    $delaccess="DELETE FROM proveniente WHERE id_proveniente='$idorigen'";
    sqlsrv_query($cnx,$delaccess);
        echo '<script> alert("Resgistro origen de datos Eliminado.")</script>';
    echo '<meta http-equiv="refresh" content="0,url=origen.php">';
}
//****************************************************************************************
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>