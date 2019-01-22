<?php
session_start();
include "../conexion/conexion.php";


$usuario = $_POST['email'];
$password = sha1($_POST['password1']);
$tipo = $_POST['tipo'];

$query = $conn->prepare("SELECT * FROM usuarios WHERE 
email=? AND password1=?");
$query->execute(array($usuario,$password));
$row = $query->fetch(PDO::FETCH_BOTH);
$existe= false;	

//para saber la sesion, estoy guaradando el tipo

if($query->rowCount() > 0 && $usuario && $row['tipo'] == 1) {
  setcookie('esadmin', $row['tipo'], time() + (86400 /5), "/"); // 86400 = 1 dia	//Generamos una cookie que almacene el tipo de usuario
  setcookie('nombre', $row['nombre'], time() + (86400 /5), "/");
  setcookie('idusuario', $row['idusuario'], time() + (86400 /5), "/");
  $_SESSION['esadmin'] = true;
  $_SESSION['email'] = $usuario;
  $_SESSION['id'] = $row['idusuario'];
  $_SESSION['nombre'] = $row['nombre'];
  header('location:../index.php');
  
    
}
   elseif ($query->rowCount() > 0 && $usuario && $row['tipo'] == 0)  {
    setcookie('esadmin', $row['tipo'], time() + (86400 /5), "/"); // 86400 = 1 dia	//Generamos una cookie que almacene tipo de usuario
    setcookie('nombre', $row['nombre'], time() + (86400 /5), "/");
    setcookie('idusuario', $row['idusuario'], time() + (86400 /5), "/");
    $_SESSION['esadmin'] = false;
    $_SESSION['email'] = $usuario;
    $_SESSION['id'] = $row['idusuario'];
    //para sacar el nombre para que me ponga quien soy
    $_SESSION['nombre'] = $row['nombre'];
    header('location:../index.php');

 } else {
  ?>
           
  <script>
  alert('El Email o la Password es erronea');
  window.location.href='../index.php'; </script> 
      <?php
  
  
 }




 
  

 


?>