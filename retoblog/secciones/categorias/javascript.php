<div class="notificacionesentrada" style="color:orange; font-size: 20px; margin-left:27em;" > </div>
<ul id="categorialista"><h1 class="listadecategoria">Categorias</h1>
    <li><div class= "m javascript_m">Javascript</div></li>
    <li><div class= "m php_m">Php</div></li>
    <li><div class= "m jquery_m">Jquery</div></li>
    <li><div class= "m problemas_m">Problemas</div></li>
  </ul>

<div class="Entradas">
   
        <h1 class="listadePost">Post Recientes</h1>

        <section class="numerodepost"></section>

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

     
$getNoticias = $conn->prepare("SELECT * FROM noticias WHERE idCategoria ='1' ");
    $getNoticias->execute();
    $noticias = $getNoticias->fetchAll();
    foreach ($noticias as $noticia) {
        $idCategoria=$noticia['idCategoria'];
        $getCategorias = $conn->prepare("SELECT * FROM categorias WHERE idCategoria='$idCategoria'");
        $getCategorias->execute(); //sentencia para sacar la categoria correspondiente a esa noticia 
        //en vez del ID 1, me salga el nombre en el recuadro negro.
        $categorias = $getCategorias->fetchAll(); 
        foreach ($categorias as $categoria) {

           
            if (isset($_SESSION['esadmin']) && $_SESSION['esadmin']){
           
                echo '<div class="entrada-'.$noticia['idNoticia'].'">';
                echo'<div class="card2">';
               
                  echo' <div class="borrarentrada"  style="float:right;  font-size: 20px; cursor:pointer; font-family:letra2; margin-left: 2em; margin-right:4em; color:black;" value="'.$noticia['idNoticia'].'"> DELETE</div> ';
                  echo' <div class="modificarjavascript" style="float:right;   font-size: 20px; cursor:pointer;font-family:letra2; margin-left: 2em;  margin-right:4em;color:black;" value="'.$noticia['idNoticia'].'"> MODIFICAR</div> ';
                    
            echo '<header class="encabezado">';
            echo '<p >
            <span class="fecha">'.$noticia['fechaModificacion'].'</span> on <a class="categoria">'.$categoria['nombre'].'</a>
            </p>';
            echo ' <form id="formq-'.$noticia['idNoticia'].'" name="formq-'.$noticia['idNoticia'].'">'; 
            echo 'TITULO  <input  class="titulo" type="text" name="titulo"  value="'.$noticia['titulo'].'"  />'; 
            echo ' <input type="hidden" name="idNoticia"  value="'.$noticia['idNoticia'].'"  />';
            echo 'CABECERA <h2 class="cabecera"><input type="text" name="cabecera"  value="'.$noticia['cabecera'].'"  /></h2>'; 
          
          
            echo "CONTENIDO <textarea  class='textarea' cols='50' class='mensajetext' placeholder='contenido' name='contenido' rows='15'>".$noticia['contenido']."</textarea>  ";      
            echo ' </form>';
           
            echo ' </header>';
            echo ' </div>';
            echo ' </div>';
            }
        else{
            echo'<div class="card2">';
                echo '<header class="encabezado">';
                echo '<p >
                <span class="fecha">'.$noticia['fechaPublicacion'].'</span> on <a class="categoria" >'.$categoria['nombre'].'</a>
                </p>';
                echo '<h2 class="titulo">'.$noticia['titulo'] .'</h2>';
                echo ' </header>';
                echo '<h2 class="cabecera" style="margin-left:5%;">'.$noticia['cabecera'] .'</h2>';
             
                echo '<div class="descripcion">';
                echo '<p>'.$noticia['contenido'] .'</p>';
                
                if (isset($_SESSION['esadmin']) &&  !$_SESSION['esadmin']) {
         
   
                    echo' <div class="insertarcomentarios_m" style="float:left; cursor: pointer; margin-left:50em; margin-bottom:1em;color:orange;" 
                    noticia="'.$noticia['idNoticia'].'" usuarioNombre="'.$_SESSION['nombre'].'" usuario="'.$_SESSION['id'].'"> <img style="width:50%; float:right"; src= "assets/images/addcomment.png"/></div> ';
                  }  
                $idNoticia=$noticia['idNoticia'];
                //sentencia de comentarios
                $getComentarios = $conn->prepare("SELECT * FROM comentarios WHERE idNoticia ='$idNoticia' ORDER BY idComentario DESC");
                $getComentarios->execute();
                $comentarios = $getComentarios->fetchAll();
                echo' <h1 class="listadePost1" style="margin-top:8%;"> Comentarios</h1><br>';
                foreach ($comentarios as $comentario) {
                  
                  echo '<div class="comentario-'.$comentario['idComentario'].'" style="margin-top:1%;">';
                    if (isset($_SESSION['id'])&& $_SESSION['id']==$comentario['idusuario']){
                    echo'<p> <div class="borrarcomentario"  value="'.$comentario['idComentario'].'" > <img style="width:3.5%; float:right"; src= "assets/images/basura.png"/></div> </p>';
                    }
                  echo '<p>'.$comentario['contenido'] .'</p>';
                  echo '<h6 style="color:gray">'.$comentario['fecha'] .'</h6>';
                  //SENTENCIAS DE USUARIO DEL COMENTARIO
                  $idusuario=$comentario['idusuario'];
                  //sentencia de comentarios
                  $getusuarios = $conn->prepare("SELECT * FROM usuarios WHERE idusuario='$idusuario'");
                  $getusuarios->execute();
                  $usuarios = $getusuarios->fetchAll();
                  foreach ($usuarios as $usuario) {
                    echo '<h4> <b>'.$usuario['nombre'] .'</b></h4>';
                  }
                  echo '</div>';
                }          
                echo '</div>';
               
             
        
       
                echo '</div>';
                
    }
    
}
    }


?>
</section>
</div>
