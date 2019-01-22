
<?php
 include "../conexion/conexion.php";
	$idNoticia = $_POST["idNoticia"];
	$idUsuario = $_POST["idusuario"];
	$contenido = $_POST["contenido"];
	$nombre = $_POST["nombre"];
	// create PDO instance; assign it to $db variable
	
     $query3 = " INSERT INTO comentarios
     	(idNoticia, idUsuario, contenido, nombre)
            VALUES (:idNoticia, :idusuario, :contenido, :nombre)";
     $result = $conn->prepare($query3); 
	 if ($result->execute([":idNoticia" => $idNoticia, ":idusuario" => $idUsuario, ":contenido" => $contenido, ":nombre" => $nombre])) {
		echo "Comentario creado correctamente";

	} else {
		echo "Error al crear el comentario";
	}
	

?>
