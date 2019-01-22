<?php

        $servername = "localhost"; //direccion servidor
        $database = "retoblog"; //tabla de DB
        $username = "root"; //usuario administrador 
        $password = ""; //contraseña del administrador
        
        try{
        // Crear conexion con servidor e introducirlo en una variable
        $conn = new PDO("mysql:host=$servername; dbname=$database", $username, $password);
        
        //Si falla conexion mostrar mensaje de error
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    
?>
