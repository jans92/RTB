<?php  
include_once "../conexion/conexion.php";  
        //$con = new conectarDB(); 
        $idNoticia    = $_POST['idNoticia'];
        $titulo    = $_POST['titulo'];
        $cabecera = $_POST['cabecera'];
     
        $contenido     = $_POST['contenido'];
        

        

        $consulta = "UPDATE noticias SET titulo= '".$titulo."' , cabecera = '".$cabecera."' , fechaModificacion= CURRENT_TIMESTAMP, contenido='".$contenido."'  WHERE idNoticia ='$idNoticia'";
            
        $result = $conn->prepare($consulta);
        if ($result->execute()) {
            print "Entrada modificada";
            
        } else {
            print "Error al modificar";
        }
        $conn = null;

?>


    