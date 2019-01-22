<?php
session_start();
// Si existen coodkies con los datos del usuario se genera una session permitiendo asi que
//el usuario se looogea.
// se hace un if para ver si existen coockies, si la coockie tiene valor, porque si no daria error.

if (isset ($_COOKIE['esadmin'])){
    
    $_SESSION['esadmin']= $_COOKIE['esadmin'];
    $_SESSION['nombre']= $_COOKIE['nombre'];
    $_SESSION['idusuario']= $_COOKIE['idusuario'];
 }
include_once "conexion/conexion.php";

?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>RETO JAVASCRIPT - PHP</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> 
    <script type="text/javascript" src="assets/js/index.js"></script>
    
  </head>

  <body>
      

<?php



    require_once ('menu.php'); 
    if (isset($_SESSION['esadmin'])){   //logeado

        print_r('<div style="margin-left:4em";> Bienvenido '.$_SESSION['nombre'].'</div>');
    }
    ?> <img id= "logo" class = "cambios" src="./assets/images/cabecera.png" > <?php
    require_once ('contenido/contenidoHamburguesa.php'); 

  
    
    if (isset($_SESSION['esadmin'])){   //logeado

         
            
        if ($_SESSION['esadmin']) {     //es admin
            require_once ('admin.php');
        }
        else{                            //no es admin
            require_once ('registrado.php');
        }
    }
    else                                 //no conectado
        require_once ('invitado.php');

        
  
    

   

require_once ('footer.php'); 
?>
  </body>
  
</html>
