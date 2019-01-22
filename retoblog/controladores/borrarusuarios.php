<?php  
include_once "../conexion/conexion.php";  
        //$con = new conectarDB(); 
        $borraID    = $_POST['idusuario'];
      
        

        

        $consulta = "DELETE FROM usuarios WHERE idusuario='".$borraID."'";
            
        $result = $conn->prepare($consulta);
        if ($result->execute()) {
            print $borraID;
            
        } else {
            print "Error al borrar usuario";
        }
        $conn = null;

?>


    