
  <div id="login" class="ventana-modal" style="display:none">
  
 
  <span class="close">&times;</span>
    <form id="formulario3"  method= 'POST' action="./controladores/procesarLogin.php">
      <div class="imgcontainer">
        
        <h1 style="text-align:center">Iniciar Sesion</h1>
      </div>
  
      <div class="contenedor">
        <input  type="email" placeholder="Introduce tu email" id="correoI" name="email">
        <input  type="password" placeholder="Enter Password" id="passI"name="password1">        
        <button type="submit">Entrar</button>
        <p id="mensajeL"></p>
         
        <!-- <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a> -->
      </div>
      
    </form>
</div>