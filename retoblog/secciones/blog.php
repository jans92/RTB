
 <div id="notificacionesblog" style="color:orange; font-size: 20px; margin-left:27em;" > </div>
 
 <ul id="categorialista" class = "cambios"><h1 class="listadecategoria">Categorias</h1>
    <li><div class= "m javascript_m">Javascript</div></li>
    <li><div class= "m php_m">Php</div></li>
    <li><div class= "m jquery_m">Jquery</div></li>
    <li><div class= "m problemas_m">Problemas</div></li>
  </ul>

<div id="entradas" style="width:80%;" class = "cambios">
<div>
        <h1 class="listadePost" >Post Recientes</h1>

        <section class="numerodepost"  >
        <?php    
  
    $getNoticias = $conn->prepare("SELECT * FROM noticias  ");
    $getNoticias->execute();
    $noticias = $getNoticias->fetchAll();
    foreach ($noticias as $noticia) {
      $idCategoria=$noticia['idCategoria'];
      $getCategorias = $conn->prepare("SELECT * FROM categorias WHERE idCategoria='$idCategoria'");
      $getCategorias->execute(); //sentencia para sacar la categoria correspondiente a esa noticia 
      //en vez del ID 1, me salga el nombre en el recuadro negro.
      $categorias = $getCategorias->fetchAll(); 
      foreach ($categorias as $categoria) {
  echo'<div id="card1" style="margin-right:0%;">';
        echo '<header class="encabezado">';
        echo '<p >
        <span class="fecha">'.$noticia['fechaPublicacion'].'</span> on <a class="categoria" >'.$categoria['nombre'].'</a>
        </p>';
        echo '<h2 class="titulo">'.$noticia['titulo'] .'</h2>';
        echo ' </header>';
        echo '<h2 class="cabecera" style="margin-left:5%;">'.$noticia['cabecera'] .'</h2>';
       
        echo '<div class="descripcion">';
        echo '<p>'.$noticia['contenido'] .'</p>';
        echo'<img width="550px" height="350px" src="data:image/png;base64,'.base64_encode($noticia['imagen']).'">';
        if (isset($_SESSION['esadmin']) &&  !$_SESSION['esadmin']) {
         
   
          echo' <div class="insertarcomentarios_m" style="float:left; cursor: pointer; margin-left:37.3em; position: absolute; margin-top: -4%;margin-bottom:1em;color:orange;" 
          noticia="'.$noticia['idNoticia'].'" usuarioNombre="'.$_SESSION['nombre'].'" usuario="'.$_SESSION['id'].'"> <img style="width:16%; float:right"; src= "assets/images/addcomment.png"/></div> ';
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
          echo'<p> <div class="borrarcomentario"  value="'.$comentario['idComentario'].'" > <img style="width:3%; float:right"; src= "assets/images/basura.png"/></div> </p>';
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
            echo '<h4 style="color:orange;"> <b>'.$usuario['nombre'] .'</b></h4>';
          
          }
          echo '</div>';
        }          
        echo '</div>';
        echo'</div>';
        

}
    }
    ?>
            
             
   
   
  
</section>


</div>
</div>


   
            

    

 