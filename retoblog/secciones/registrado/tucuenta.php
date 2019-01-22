
<?php
$idusuario = $_SESSION['id'];
$getUsuarios = $conn->prepare("SELECT * FROM usuarios WHERE idusuario = '$idusuario'  ");
    $getUsuarios->execute();
    $usuarios = $getUsuarios->fetchAll();
    foreach ($usuarios as $usuario) {
      echo '<div class="card">';
      echo '  <img src="assets/images/avatar.png" alt="usuario" style="width:40%; margin-left:30%;">';
        echo '<header class="cuentanombre">';
 
        echo '<h2 style="text-align:center";>'.$usuario['nombre'].'</h2>  <h2 style="text-align:center"; >'.$usuario['apellidos'].'</h2>';
       
        echo '<p class="title" style="text-align:center">'.$usuario['email'] .'</p>';
        echo ' </header>';
        echo ' </div>';
    }

    ?>



