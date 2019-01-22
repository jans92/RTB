<!-- ESTO ES IGUAL QUE EN EL MENU INVITADO,
Al igual que en ese menu, se ha cambiado y se ha echo un include para no repetir codigo
ya que era igual en los dos

la unica diferencia, es el include de insertar comentario.-->


<?php
         require_once ('categoriasopciones.php'); ?>

 <div id="tucuenta" class="cambios" style="display:none;">
        <?php include "secciones/registrado/tucuenta.php"; ?>
                    </div>
            <div id="insertarcomentario" class="cambios" style="display:none;">
        <?php include "secciones/registrado/insertarcomentario.php"; ?>
                    </div>
