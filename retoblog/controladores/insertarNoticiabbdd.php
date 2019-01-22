<?php    
        //$con = new conectarDB(); 
        $titulo    = $_POST['titulo'];
        $idusuario    = $_POST['idusuario'];
        $cabecera = $_POST['cabecera'];
        $contenido = $_POST['contenido'];
        $categoria = $_POST['categoria'];
       
        $imagen=addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
     
         include "../conexion/conexion.php";

         $consulta1 = "INSERT INTO noticias
           (titulo, cabecera, idusuario, idCategoria, contenido, imagen)
             VALUES (:titulo, :cabecera, :idusuario, :idCategoria, :contenido, :imagen)";
         $result = $conn->prepare($consulta1);
         if ($result->execute([":titulo" => $titulo, ":cabecera" => $cabecera, ":idusuario" => $idusuario, ":idCategoria" => $categoria, ":contenido" => $contenido, "imagen" =>$imagen])) {
             echo "Noticia creada correctamente";
             header("Location: ../index.php");  
         } else {
             echo "Error al crear la noticia";
      }
       $conn = null;

 ?>

