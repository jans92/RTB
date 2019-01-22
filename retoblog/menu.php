

<?php


//Si existe el usuario pero no es admin O no existe (es decir es invitado)
if((isset($_SESSION['esadmin'])&& !$_SESSION['esadmin']) || (!isset($_SESSION['esadmin']))){
    

?>
<div class="menu-section">
    <nav id = "menu">
            <div class="barrasmenu">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </div>
            <ul  role="navigation" class="hidden">
                <li><a href="?state=0">BLOG</a></li>
                <li><a href="?state=1">TUTORIALES</a></li>
                <li><a onclick="$('#contacto').css({'display':'block','opacity':'1','pointer-events':'auto'})">CONTACTO</a></li>
                <li><a href="index.php" id="volverboton" style= "display: none">INICIO</a></li> 
                <!-- añado el boton de volver al inico, pero solo si esta en otro lado -->
                 
            
                
            </ul>  
    </nav>
</div>


<?php
}
echo '<ol style="margin-top: 1em"; id="botones">';
    
// PARA JULIA: Quiero hacerlo asi, hay id que no puedo repetir poniendo dos veces
//el cerrar sesion en los dos (Admin y no admin).
// Si coloco el tu cuenta y cerrar sesion en el "SI HAY SESION" me lo muestra antes
//que los "entradas, comentarios y usuarios del ADMINISTRADOR y no quiero eso.
//Prefiero quedarme con mi version. Habra otra forma, pero no tengo tiempo para esto.
if (!isset($_SESSION['esadmin'])){  //si no existe sesion 
    echo '<li><div class= "m" style="cursor: default"; id="login_m">Iniciar Sesion</div></li>';
    echo '<li><div class= "m" style="cursor: default"; id="registro_m">Registrarse</div></li>';
}

else if (isset($_SESSION['esadmin'])&& !$_SESSION['esadmin']) //si existe independientemente cual
    echo '<li><div class= "m" style="cursor: default"; id="tucuenta_m">Tu Cuenta</div></li>';

//por eso se añade tu cuenta al admin porque son dos ifs difentes y no lo iba a pegar
//dos veces.
else if (isset($_SESSION['esadmin']) && $_SESSION['esadmin']){ //si es admin
    echo '<li><div class= "m" style="cursor: default"; id="entradas_m">Entradas</div></li>'; 
    echo '<li><div class= "m" style="cursor: default"; id="usuarios_m">Usuarios</div></li>';
    echo '<li><div class= "m" style="cursor: default";  id="comentarios_m">Comentarios</div></li>';
    
}

if (isset($_SESSION['esadmin'])) //si existe sesion ya sea admin o no
    echo'<li><div class= "m" style="cursor: default"; id="cerrarsession_m">Cerrar Sesion</div></li>';

echo '</ol>';

    require_once ('menus/login.php');
    require_once ('menus/registro.php');
    require_once ('menus/contacto.php');
?>

<script>


            </script>