<?php  
include_once "../conexion/conexion.php";  
        //$con = new conectarDB(); 
        $borraID    = $_POST['idNoticia'];
      
     

        

        $consulta = "DELETE FROM noticias WHERE idNoticia='".$borraID."'";
            
        $result = $conn->prepare($consulta);
        if ($result->execute()) {
            print $borraID;
        
        } else {
            print "Entrada borrada";
         
        }
        $conn = null;

?>


    