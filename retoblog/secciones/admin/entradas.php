<div class="notificacionesentrada" style="color:orange; font-size: 20px; margin-left:27em;" > </div>
<!--Contador de noticias-->
    <?php
    $getNoticias = $conn->prepare("SELECT COUNT(*) Total FROM noticias; ");
    $getNoticias->execute();
    $noticias = $getNoticias->fetchAll();
    foreach ($noticias as $noticias) {
      echo 'Noticias Totales'.'    '.' <h4 class="contadornumero">'.$noticias['Total'].'</h4>';
    }
    ?>
   
<ul id="categorialista">
    <h1 class="listadecategoria">Categorias</h1>
    <li><div class= "m javascript_m">Javascript</div></li>
    <li><div class= "m php_m">Php</div></li>
    <li><div class= "m jquery_m">Jquery</div></li>
    <li><div class= "m problemas_m">Problemas</div></li>
    <h1  class="listadecategoria">Añadir</h1>
    <?php echo' <li ><div  class= "m añadirnoticia_m" usuario="'.$_SESSION['idusuario'].'"> Crear entrada</div></li>';?>
  </ul>
  
 
<div class="Entradas" >
   
        <h1 class="listadePost">Post Recientes</h1>

        <section class="numerodepost" >
        <?php    
  
  $getNoticias = $conn->prepare("SELECT * FROM noticias "); // sentencia para sacar las noticias
  $getNoticias->execute();
  $noticias = $getNoticias->fetchAll();
  foreach ($noticias as $noticia) {
      $idCategoria=$noticia['idCategoria'];
    $getCategorias = $conn->prepare("SELECT * FROM categorias WHERE idCategoria='$idCategoria'");
    $getCategorias->execute(); //sentencia para sacar la categoria correspondiente a esa noticia 
    //en vez del ID 1, me salga el nombre en el recuadro negro.
    $categorias = $getCategorias->fetchAll(); 
    foreach ($categorias as $categoria) {
     
          echo '<div class="entrada-'.$noticia['idNoticia'].'">';
          echo'<div class="card2">';
          if (isset($_SESSION['esadmin']) && $_SESSION['esadmin']) {
         
            echo' <div class="borrarentrada"  style="float:right; cursor:pointer; font-size: 20px; font-family:letra2; margin-left: 2em; margin-right:4em; color:black;" value="'.$noticia['idNoticia'].'"> DELETE</div> ';
            echo' <div class="modificarentrada" style="float:right; cursor:pointer; font-size: 20px;font-family:letra2; margin-left: 2em;  margin-right:4em;color:black;" value="'.$noticia['idNoticia'].'"> MODIFICAR</div> ';
              }
      echo '<header class="encabezado">';
      echo '<p >
      <span class="fecha">'.$noticia['fechaModificacion'].'</span> on <a class="categoria" >'.$categoria['nombre'].'</a>
      </p>';
      echo ' <form id="form1-'.$noticia['idNoticia'].'" name="form1-'.$noticia['idNoticia'].'">'; 
      echo 'TITULO  <input  class="titulo" type="text" name="titulo"  value="'.$noticia['titulo'].'"  />'; 
      echo ' <input type="hidden" name="idNoticia"  value="'.$noticia['idNoticia'].'"  />';
      echo 'CABECERA <h2 class="cabecera"><input type="text" name="cabecera"  value="'.$noticia['cabecera'].'"  /></h2>'; 
    
    

      echo "CONTENIDO <textarea  class='textarea' cols='50' class='mensajetext' placeholder='contenido' name='contenido' rows='15'>".$noticia['contenido']."</textarea>  ";
    echo'<img src="data:image/jpeg;base64,'.base64_encode($noticia['imagen']).'">';
      echo ' </form>';
     
      echo ' </header>';
      echo ' </div>';
      echo ' </div>';
  }
}
    
    ?>
            
        
    
</section>





</div>

   
            <script>
   
 
            </script>

    
