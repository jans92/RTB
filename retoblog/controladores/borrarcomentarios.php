<?php  
include_once "../conexion/conexion.php";  
        //$con = new conectarDB(); 
        $borraID    = $_POST['idComentario'];
      
     

        

        $consulta = "DELETE FROM comentarios WHERE idComentario='".$borraID."'";
            
        $result = $conn->prepare($consulta);
        if ($result->execute()) {
            print $borraID;
        
        } else {
            print "Comentario borrado";
         
        }
        $conn = null;

?>