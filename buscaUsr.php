<?php
session_start();

if(isset($_POST['alumnos'])) {
require "../../acnxerdm/cnx.php";
  $plz=$_GET['mp'];

    echo $_GET['mp'];
    
    $busqueda=$_POST['alumnos'];
    $se="select * from usuarioNuevo
    inner join usuario on usuario.id_usuarioNuevo=usuarioNuevo.id_usuarioNuevo
    where ((nombre like '%$busqueda%') or (app like '%$busqueda%') or (apm like '%$busqueda%') or (correo like '%$busqueda%') 
    and (id_plaza='$plz'))";
    $search=sqlsrv_query($cnx,$se);
    $roarch=sqlsrv_fetch_array($search);
    
?>
<table class="table table-hover table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
<?php do{ ?>
    <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>amdo</td>
    </tr>
<?php } while($roarch=sqlsrv_fetch_array($search)); ?>
  </tbody>
</table>


<?php } ?>
















