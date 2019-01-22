<!--Buscador-->
<div class="controls" style="width:20%; float:right; margin-top:-5.5%;">
			<input id="search" type="text"/>
			<img id="button" style="width:10%;"src="assets/images/lupa.png"/>
			<span id="results" style="display:block;"></span>
    </div>
    
<div id="content">

    
<?php
/* SENTENCIA PARA SACAR TODOS LOS COMENTARIOS, 
CON SUS RESPECTIVAS NOTICIAS (sIN CONTENIDO)*/

include "./conexion/conexion.php";
echo'<div id="comentarios">';
$getNoticias = $conn->prepare("SELECT * FROM noticias");
$getNoticias->execute();
$noticias = $getNoticias->fetchAll();
foreach ($noticias as $noticia) {
  $idCategoria=$noticia['idCategoria'];
  $getCategorias = $conn->prepare("SELECT * FROM categorias WHERE idCategoria='$idCategoria'");
  $getCategorias->execute(); //sentencia para sacar la categoria correspondiente a esa noticia 
  //en vez del ID 1, me salga el nombre en el recuadro negro.
  $categorias = $getCategorias->fetchAll(); 
  foreach ($categorias as $categoria) {
    echo'<div id="card4" style="margin-top:4%; margin-right:8%;">';
    echo '<header class="encabezado">';
    echo '<p >
    <span class="fecha">'.$noticia['fechaPublicacion'].'</span> on <a class="categoria" >'.$categoria['nombre'].'</a>
    </p>';
    echo '<h2 class="titulo">'.$noticia['titulo'] .'</h2>';
    echo ' </header>';
    
    $idNoticia=$noticia['idNoticia'];
    //sentencia de comentarios
    
    $getComentarios = $conn->prepare("SELECT * FROM comentarios WHERE idNoticia ='$idNoticia' ORDER BY idComentario DESC");
    $getComentarios->execute();
    $comentarios = $getComentarios->fetchAll();
    echo' <h1 class="listadePost1" style="margin-top:8%; margin-left:5%;"> Comentarios</h1><br>';
    foreach ($comentarios as $comentario) {
      
      echo '<div class="comentario-'.$comentario['idComentario'].'" style="margin-top:1%; margin-left:5%;">';
    
    
      echo'<p> <div class="borrarcomentario"  value="'.$comentario['idComentario'].'" > <img style="width:3%; float:right"; src= "assets/images/basura.png"/></div> </p>';
      
   
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
  
    

}
}
    
   echo'"</div>"';

?>
</div>