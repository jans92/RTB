<div id="registro" class="ventana-modal" style="display:none">
  
  <span class="close">&times;</span>
    <form id="formulario" method = 'POST' action="./controladores/procesarRegistro.php">
      <div class="imgcontainer">
        
        <h1 style="text-align:center">Registro</h1>
      </div>
  
      <div class="contenedor">
          <input  type="text" placeholder="Mete tu nombre " id="nombreR" name="nombre" >
          <input  type="text" placeholder="Mete tus apellidos " id="apellidosR" name="apellidos">
          <input type="email" placeholder="Introduce tu email" id="correoR" name="email">
          <input  type="password" placeholder="Enter Password" id="passR" name="password1">     
          <input  type="password" placeholder="Repetir Contraseña" id="pass2R" name="password2">       
         <p style="margin-left:2em;"> Politicas de privacidad: <input type="checkbox" id="politicas" name="politicas"> </div> <br> <br></p>
          <p id="mensajeR"></p>
          <button type="submit" id="enviar">Entrar</button>
           
          
        </div>
      
    </form>

  </div>