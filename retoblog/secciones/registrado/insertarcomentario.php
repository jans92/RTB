
<!--le he quitado el action porque lo estamos haciendo en blog.php por jquery asi que
le ponemos un identificador y un name igual para identificarlo -->
 <form id="insertarcomentarioform" name="insertarcomentarioform"  method="post"> 
			<input type="hidden" id="idNoticia_form"name="idNoticia"/>
	    	<input type="hidden" id="idusuario_form"name="idusuario"/>
	    	<input type="text" name="contenido" / placeholder = "inserta un comentario...">
	    	<input type="hidden" id="nombeusuario_form" name="nombre"/>
          <button id= "enviarComentario" type="submit" >Añadir</button>
		</form>
<script>
  $( "#enviarComentario" ).click(function(e) {
        e.preventDefault();  // para que no se recargue la pagina una vez hecho el submit del form.
              //esto coje todos los valores del form y me los serializa (convierte en array)
       $.post("controladores/insertarcomentariobbdd.php",$('#insertarcomentarioform').serialize())
    .done(function(data){
       $('#notificacionesblog').html (data);
        $('#notificacionesblog').delay(1500).fadeOut (2000);
        setTimeout(function(){
                window.location.href="index.php"; 
              }, 3000);
             })
     
   .fail(function(xhr,status,error){
	   
        $('#notificacionesblog').html ('Error: '+error);
        $('#notificacionesblog').delay(1500).fadeOut (2000);
     });
    
    });
      
      
      
      </script>