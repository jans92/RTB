<?php
if(isset($_REQUEST['state']) ){

  echo"<script language='javascript'>

  $('#logo').css('display','none');
  $('#volverboton').css('display','block'); 
  
  </script>";
} // se ha añadido un boton de volver al inicio en el menu si no se encuentra en el index 


if(isset($_REQUEST['state']) && $_REQUEST['state']=='0'){ //va a blog.php
  require_once ('./secciones/blog.php');
  
 
  
}

  
else if(isset($_REQUEST['state']) && $_REQUEST['state']=='1'){  //va a tutoriales.php
  require_once ('./secciones/tutoriales.php');

}


?>