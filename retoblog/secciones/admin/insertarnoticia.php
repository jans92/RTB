
    <form id="formulario4" style="width:70%; margin-left: 13em;"method = 'POST' action="controladores/insertarNoticiabbdd.php" enctype="multipart/form-data">
      <div class="imgcontainer">
        
        <h1 style="text-align:center">Añadir Noticia</h1>
         </div>
  
      <div class="contenedor">
          <input  type="text" placeholder="titulo "  name="titulo" value="titulo">
          <input  type="text" placeholder="cabecera "  name="cabecera">
          <input  type="hidden" id="idusuario_form" name="idusuario">
          <input  name="userfile"  type="file">
          <select class ="categor" name="categoria">
            <option value ="1">Javascript</option>
            <option value ="2">PHP</option>
            <option value ="3">JQuery</option>
            <option value ="4">Problemas</option>
          </select>
          <textarea  class='textarea' cols='50' class='mensajetext' placeholder="contenido" name='contenido' rows='15'></textarea>  
          <p id="mensajeN"></p>
         




          <button type="submit" >Añadir</button>
        </div>


</form>


