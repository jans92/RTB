<div class="notificacionesusuarios" style="color:orange; font-size: 20px; margin-left:27em;" > </div>
<!--Contador de usuarios-->
<div id="usuarioslista" ><h1 class="contador">Usuarios Totales</h1>
    <?php
    $getUsuarios = $conn->prepare("SELECT COUNT(*) Total FROM usuarios; ");
    $getUsuarios->execute();
    $usuarios = $getUsuarios->fetchAll();
    foreach ($usuarios as $usuario) {
      echo '<p style="text-align:center; color:orange">' . $usuario['Total'] . '</p>';
    }
    ?>
   
  </div>

<div style="width:65%; margin-left:4em; margin-top: 1em; margin-left:5em;">
 <h1 class="listadePost"> Usuarios</h1>
 <?php


$getUsuarios = $conn->prepare("SELECT * FROM usuarios ");
$getUsuarios->execute();
$usuarios = $getUsuarios->fetchAll();
foreach ($usuarios as $usuario) {

  echo '<div style="margin-top:2em"; id="usuario-' . $usuario['idusuario'] . '">';
  echo '<div class="card2">';
  if (isset($_SESSION['esadmin']) && $_SESSION['esadmin']) {

    echo ' <div class="borrar" style="float:right; font-size: 18px; cursor:pointer; font-family:letra2; margin-left: 2em; margin-right:4em; color:black;" value="' . $usuario['idusuario'] . '"> DELETE</div> ';
    echo ' <div class="modificar" style="float:right; font-size: 18px; cursor:pointer; font-family:letra2;margin-left: 2em; margin-right:4em; color:black;" value="' . $usuario['idusuario'] . '"> MODIFICAR</div> ';
  }                                           //creo un atributo el ID del usuario que corresponde a ese boton

  echo '<header  class="encabezado">';
  echo 'ID <a class="categoria" >' . $usuario['idusuario'] . '</a><span>';
  echo ' <form id="form-' . $usuario['idusuario'] . '" name="form-' . $usuario['idusuario'] . '">';  //formulario para modificar usuarios
  echo '<input type="text" name="nombre" placeholder="nombre" value="' . $usuario['nombre'] . '"  />';
  echo '<input type="text" name="apellidos"  placeholder="apellidos" value="' . $usuario['apellidos'] . '"  />';
  echo '<input type="hidden" name="idusuario"  value="' . $usuario['idusuario'] . '"  />';
  echo '<input type="text" name="email"  placeholder="email" value="' . $usuario['email'] . '"  />';
  echo ' </form>';
  echo '<h5>Contraseña cifrada: <a style="color:orange"; class="password" > ' . $usuario['password1'] . '</a><span></h5>';
  echo ' </header>';
  echo ' </div>';
  echo ' </div>';
}
$conn = null;


?>
</div>



