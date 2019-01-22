  <div id="contacto" class="ventana-modal" style="display:none">
  
 
  <span class="close">&times;</span>
  <form id="formulario2"  method = 'POST' action="./controladores/procesarContacto.php">
      <div class="imgcontainer">
        
        <h1 style="text-align:center">Contacto</h1>
      </div>
  
      <div class="contenedor">
        <input  type="text" placeholder="Introduce el nombre" id="nombreC" name="name">   
        <input  type="email" placeholder="Introduce tu email" id="correoC" name="email">                    
        <div id="cont">
        <textarea  id="contadorcontacto" placeholder="Escribe tu mensaje aqui..." class='textarea'   name='message' rows='4' onKeyDown="contar()"></textarea>     
        <p id="mensaje"></p>
        <div style="float:right; margin-right:5em";>
        <label>Caracteres restantes:</label>
         <input disabled size="3" value="300" id="contador">
         <br/> 
         </div>
        </div> 



        
        <button type="submit">Enviar</button>
      </div>
      
    </form>
<script>
  //FUNCION PARA CONTACTO LIMITAR TEXTAREA
  function contar() {
    var max = "300";
    var cadena = document.getElementById("contadorcontacto").value;
    var longitud = cadena.length;

        if(longitud <= max) {
             document.getElementById("contador").value = max-longitud;
        } else {
             document.getElementById("contadorcontacto").value = cadena.substr(0, max);
        }
}  </script>
    
</div>
