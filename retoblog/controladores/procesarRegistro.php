<?php  
include_once "../conexion/conexion.php";  
        //$con = new conectarDB(); 
        $nombre    = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email     = $_POST['email'];
        $password1 = sha1($_POST['password1']);
        $password2 = sha1($_POST['password2']);
        

        

        $consulta = "INSERT INTO usuarios
            (nombre, apellidos, email, password1 )
            VALUES (:nombre, :apellidos, :email, :password1)";
        $result = $conn->prepare($consulta);
        if ($result->execute([":nombre" => $nombre, ":apellidos" => $apellidos, ":email" => $email, ":password1" => $password1])) {
            ?>
           
            <script>
            alert('El Registro se ha realizado');
            window.location.href='../index.php'; </script> 
                <?php
            
            
        } else {
            ?>
             <script>
            alert('Error del registro');
            window.location.href='../index.php'; </script> 
                <?php
        }
        $conn = null;

?>


    