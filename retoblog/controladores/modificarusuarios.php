<?php  
include_once "../conexion/conexion.php";  
        //$con = new conectarDB(); 
        $idusuario    = $_POST['idusuario'];
        $nombre    = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email     = $_POST['email'];
      
        

        

        $consulta = "UPDATE usuarios SET nombre= '".$nombre."' , apellidos = '".$apellidos."' , email='".$email."'  WHERE idusuario='$idusuario'";
            
        $result = $conn->prepare($consulta);
        if ($result->execute()) {
            //guardo el nombre la id y el email al mdificar usuario para que salga en Bienvenido todo actualizado
            print "Usuario modificado";
            setcookie('nombre', $nombre, time() + (86400 /5), "/");
            setcookie('idusuario', $idusuario, time() + (86400 /5), "/");
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $idusuario;
            
        } else {
            print "Error al modificar usuario";
        }
        $conn = null;

?>


    