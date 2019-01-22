// Ready se ejecuta cuando la pagina esta cargada
var gustos = localStorage.getItem("lenguaje", gustos);
//COOKIE-ALMACENAMIENTO LOCAL JS

document.addEventListener("DOMContentLoaded", function(){


  
  if(!Notification){
      alert("Este navegador no soporta Notificaciones");
      return;
  }
  //Si no se acepta las notificaciones se vuelve a preguntar.
  if(Notification.permission !== "granted"){
      Notification.requestPermission();
  }
  if("lenguaje" in localStorage){
    //la primera vez que entra un usuario a la pagina se genera una localstorage de 
    //notificacion inicial, evitando asi que cada vez que entre en una pagina salga la notificacion
    if (localStorage.getItem("notificacionesinicial")===null){
      notificar();
      localStorage.setItem("notificacionesinicial",true);
    }
  
  }else{
      gustos=prompt("¿Que te interesa saber?  1-JavaScript   2-PHP");
          while(gustos != 1 && gustos!=2){
          gustos=prompt("Introduzca solo el numero:  1-JavaScript   2-PHP");
      }
  }       localStorage.setItem("lenguaje", gustos);
  });
  
  setInterval('notificar()',300000);
  function notificar(){
  
  if(Notification.permission !== "granted"){
      Notification.requestPermission();
  }else{
      var u = Math.round(Math.random()*3);
      var js =["Curso JavaScript desde 0","Curso de JavaScript para principiantes (Jesús Conde)","Master en Javascript","Fundamentos de Javascript"];
      var jsR =["https://www.youtube.com/watch?v=m2nscBtQEIs&list=PLU8oAlHdN5BmpobVmj1IlneKlVLJ84TID","https://www.youtube.com/watch?v=nsdjNe78BMk&list=PLEtcGQaT56cij4cilDUzKYcu6-wW44kTx","https://www.udemy.com/master-en-javascript-aprender-js-jquery-angular-nodejs-y-mas/","http://www.cursopedia.com/Ficha-Fundamentos-de-Javascript"];
      var php=["Cursos para PHP (Udemy)", "Introduccion a PHP (keepcoding)","Tutorial PHP (ComunidadDePHP)","Cómo conectar PHP con MySQL"];
      var phpR=["https://www.udemy.com/es/tema/php/","https://plataforma.keepcoding.io/p/introduccion-php-7-online-desde-cero","https://www.youtube.com/watch?v=RBhtPO-aLzA","https://www.hostinger.es/tutoriales/conectar-php-mysql/#gref"];
      switch(gustos){
    case "1":
    notificacion = new Notification("JS",
      {
          icon: "assets/images/js.jpg",
          body: js[u]
          
      }
      );
      notificacion.onclick=function(){
          window.open(jsR[u]);
      }
    break;
    case "2":
    notificacion = new Notification("PHP",
      {
          icon: "assets/images/php.png",
          body: php[u]
          
      }
      );
      notificacion.onclick=function(){
          window.open(phpR[u]);
      }
    break;
  }
  }
  
  
  
  }
$(document).ready(function () {

  //ESTO ES EL MENU BURGER, para cargar el BLOG, RECURSOS O TUTORIALES. 
  $("#menu > ul > li > a").click(function () {
    $('.menu-section').toggleClass("on");
    $(".barrasmenu").toggleClass("on");
    $("nav ul").toggleClass('hidden');


  });

  $(".barrasmenu").click(function () {
    
    $(this).toggleClass("on");
    $('.menu-section').toggleClass("on");
    $("nav ul").toggleClass('hidden');


    if ($(this).hasClass('on')) {
      $("#botones").css({
        "visibility": "hidden"
      });
    } else {
      $("#botones").css({
        "visibility": "visible"
      });
    }


  });
 
;
  //Cerrar todos los modals. Al principio se cerraban dandole fuera, y no queriamos eso. 
  //Se cierran dandole a la X
  $(".close").click(function () {
    $("#login").css({
      "opacity": "0",
      "pointer-events": "none"
    });
    $("#registro").css({
      "opacity": "0",
      "pointer-events": "none"
    });
    $("#contacto").css({
      "opacity": "0",
      "pointer-events": "none"
    });
    $("#botones").css({
      "visibility": "visible"
    });
  });

//funciones categoria


//FORMULARIOS VALIDACION - REGISTRO
(function () {
  document.getElementById("formulario").addEventListener("submit", validarFormulario);
})();

function validarFormulario(e) {

  var error = 0;
  var nombre = document.getElementById("nombreR").value;

  var apellidos = document.getElementById("apellidosR").value;

  var correo = document.getElementById("correoR").value;
  var pass = document.getElementById("passR").value;
  var pass2 = document.getElementById("pass2R").value;
  var politicas = document.getElementById("politicas");

  var expNom = /[a-zA-Z]/;
  var expPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/;



  if (nombre == null || nombre.length == 0 || !expNom.test(nombre)) {
    alert(nombre);
    document.getElementById("mensajeR").innerHTML = "El campo nombre no debe estar vacio";
    error = 1;

  }
  if (apellidos == null || apellidos.length == 0 || !expNom.test(apellidos)) {
    document.getElementById("mensajeR").innerHTML = "El campo apellidos no debe estar vacio";
    error = 1;


  }
  if (!(/\S+@\S+\.\S+/.test(correo))) {
    document.getElementById("mensajeR").innerHTML = "El correo no es valido";
    error = 1;


  }
  if (pass != pass2 || pass.length < 8 || pass == null || !expPass.test(pass)) {
    document.getElementById("mensajeR").innerHTML = "Contraseña incorrecta; Minimo 8 caracteres, deben utilizarse numeros, letras mayusculas y minusculas y un simbolo";
    error = 1;


  }
  if (!politicas.checked) {
    document.getElementById("mensajeR").innerHTML = "Es obligatorio marcar la politicas de privacidad";
    error = 1;


  }
  if (error == 1) {

    e.preventDefault();
  }
}

//FORMULARIO CONTACTO LOGIN

(function () {
  document.getElementById("formulario3").addEventListener("submit", validarFormulario3);
})();

function validarFormulario3(e) {
  false;
  var error = 0;

  var correo = document.getElementById("correoI").value;
  var pass = document.getElementById("passI").value;

  var expPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/;
  //TEXT AREA




  if (!(/\S+@\S+\.\S+/.test(correo))) {
    document.getElementById("mensajeL").innerHTML = "El correo no es valido";
    error = 1;
  }
  if (pass.length < 8 || pass == null || !expPass.test(pass)) {
    document.getElementById("mensajeL").innerHTML = "Contraseña incorrecta";
    error = 1;


  }
  if (error == 1) {

    e.preventDefault();
  }


}



  //FORMULARIO CONTACTO CONTACTO

  (function () {
    document.getElementById("formulario2").addEventListener("submit", validarFormulario2);
  })();

  function validarFormulario2(e) {
    false;
    var error = 0;
    var nombre = document.getElementById("nombreC").value;
    var correo = document.getElementById("correoC").value;
    var expNom = /[a-zA-Z]/;
    //TEXT AREA

    if (nombre == null || nombre.length == 0 || !expNom.test(nombre)) {

      document.getElementById("mensaje").innerHTML = "El campo nombre no debe estar vacio";
      error = 1;

    }

    if (!(/\S+@\S+\.\S+/.test(correo))) {
      document.getElementById("mensaje").innerHTML = "El correo no es valido";
      error = 1;
    }
    if (error == 1) {

      e.preventDefault();
    }


  }


//borrar ususario
// //si no es nulo al clickar entra a la funcion modificar
$( ".modificar" ).click(function(e) {
  e.preventDefault();  // para que no se recargue la pagina una vez hecho el submit del form.
        //esto coje todos los valores del form y me los serializa (convierte en array)
 $.post("controladores/modificarusuarios.php", $("#form-"+$(this).attr('value')).serialize())
 .done(function(data){
     
  $('.notificacionesusuarios').html (data).fadeIn (3000);
  $('.notificacionesusuarios').delay(1500).fadeOut (2000);
 })
 .fail(function(xhr,status,error){
  $('.notificacionesusuarios').html (error);
 });

});

$( ".borrar" ).click(function(e) {
  e.preventDefault();  // para que no se recargue la pagina una vez hecho el submit del form.
        //esto coje todos los valores del form y me los serializa (convierte en array)
 $.post("controladores/borrarusuarios.php", {idusuario: $(this).attr('value')})
 .done(function(data){
  $('.notificacionesusuarios').html ("Usuario borrado");
  $('.notificacionesusuarios').delay(1500).fadeOut (2000);
  $('#usuario-'+data).fadeOut (1500);
 
 })
 .fail(function(xhr,status,error){
  $('.notificacionesusuarios').html ('Error: '+error);
  $('.notificacionesusuarios').delay(1500).fadeOut (2000);
 });

});


  $( ".javascript_m" ).click(function() {
    $( ".cambios" ).hide();
    $( "#javascript" ).fadeIn(500);
  });
                                                              
    $( ".php_m" ).click(function() {
      $( ".cambios" ).hide();
      $( "#php" ).fadeIn(500);                                                                      
    });
  
    $( ".jquery_m" ).click(function() {
      $( ".cambios" ).hide();
      $( "#jquery" ).fadeIn(500);                                                                    
   });
   
  $( ".problemas_m" ).click(function() { 
    $( ".cambios" ).hide();
    $( "#problemas" ).fadeIn(500);                                                                     
  });

  $( ".añadirnoticia_m" ).click(function() { 
    $( ".cambios" ).hide();
    $( "#añadirnoticia" ).fadeIn(500);                                                                     
  });


  $( "#tucuenta_m" ).click(function() { 
  
    $( ".cambios" ).hide();
    $( "#tucuenta" ).fadeIn(500);                                                                     
  });


//borrar y modificar entradas

//MODIFICAR ENTRADAS EN EL ADMIN
            // //si no es nulo al clickar entra a la funcion modificar
            $( ".modificarentrada" ).click(function(e) {
              e.preventDefault();  // para que no se recargue la pagina una vez hecho el submit del form.
                    //esto coje todos los valores del form y me los serializa (convierte en array)
             $.post("controladores/modificarentradas.php", $("#form1-"+$(this).attr('value')).serialize())
             .done(function(data){
              $('.notificacionesentrada').html (data).fadeIn (3000);
              $('.notificacionesentrada').delay(1500).fadeOut (2000);
              setTimeout(function(){
            
                window.location.href="index.php"; 
              }, 3000);
             })
            
             .fail(function(xhr,status,error){
              $('.notificacionesentrada').html (error);
              $('.notificacionesentrada').delay(1500).fadeOut (2000);
             });
          
         });  

         //MODIFICAR EN JAVASCRIPT
            $( ".modificarjavascript" ).click(function(e) {
              e.preventDefault();  // para que no se recargue la pagina una vez hecho el submit del form.
                    //esto coje todos los valores del form y me los serializa (convierte en array)
             $.post("controladores/modificarentradas.php", $("#formj-"+$(this).attr('value')).serialize())
             .done(function(data){
              $('.notificacionesentrada').html (data).fadeIn (3000);
              $('.notificacionesentrada').delay(1500).fadeOut (2000);
              setTimeout(function(){
                window.location.href="index.php"; 
              }, 3000);
             })
           
             .fail(function(xhr,status,error){
              $('.notificacionesentrada').html (error);
              $('.notificacionesentrada').delay(1500).fadeOut (2000);
             });
          
         });
           //MODIFICAR EN PHP
           $( ".modificarphp" ).click(function(e) {
            e.preventDefault();  // para que no se recargue la pagina una vez hecho el submit del form.
                  //esto coje todos los valores del form y me los serializa (convierte en array)
           $.post("controladores/modificarentradas.php", $("#formp-"+$(this).attr('value')).serialize())
           .done(function(data){
            $('.notificacionesentrada').html (data).fadeIn (3000);
            $('.notificacionesentrada').delay(1500).fadeOut (2000);
            setTimeout(function(){
              window.location.href="index.php"; 
            }, 3000);
           })
         
           .fail(function(xhr,status,error){
            $('.notificacionesentrada').html (error);
            $('.notificacionesentrada').delay(1500).fadeOut (2000);
           });
        
       });
         //MODIFICAR EN jquery
         $( ".modificarjquery" ).click(function(e) {
          e.preventDefault();  // para que no se recargue la pagina una vez hecho el submit del form.
                //esto coje todos los valores del form y me los serializa (convierte en array)
         $.post("controladores/modificarentradas.php", $("#formq-"+$(this).attr('value')).serialize())
         .done(function(data){
          $('.notificacionesentrada').html (data).fadeIn (3000);
          $('.notificacionesentrada').delay(1500).fadeOut (2000);
          setTimeout(function(){
            window.location.href="index.php"; 
          }, 3000);
         })

        
         .fail(function(xhr,status,error){
          $('.notificacionesentrada').html (error);
          $('.notificacionesentrada').delay(1500).fadeOut (2000);
         });
      
     });
       //MODIFICAR EN problemas
       $( ".modificarproblemas" ).click(function(e) {
        e.preventDefault();  // para que no se recargue la pagina una vez hecho el submit del form.
              //esto coje todos los valores del form y me los serializa (convierte en array)
       $.post("controladores/modificarentradas.php", $("#formpr-"+$(this).attr('value')).serialize())
       .done(function(data){
        $('.notificacionesentrada').html (data).fadeIn (3000);
        $('.notificacionesentrada').delay(1500).fadeOut (2000);
        setTimeout(function(){
          window.location.href="index.php"; 
        }, 3000);
       })
       .fail(function(xhr,status,error){
        $('.notificacionesentrada').html (error);
        $('.notificacionesentrada').delay(1500).fadeOut (2000);
       });
    
   });
      
          $( ".borrarentrada" ).click(function(e) {
              e.preventDefault();  // para que no se recargue la pagina una vez hecho el submit del form.
                    //esto coje todos los valores del form y me los serializa (convierte en array)
             $.post("controladores/borrarentradas.php", {idNoticia: $(this).attr('value')})
             .done(function(data){
           
              $('.notificacionesentrada').html ("Entrada borrada");
              $('.notificacionesentrada').delay(1500).fadeOut (2000);
              $('.entrada-'+data).fadeOut (1500);
             })
             .fail(function(xhr,status,error){
              $('.notificacionesentrada').html ('Errors: '+error);
              $('.notificacionesentrada').delay(1500).fadeOut (2000);
             });
          
         });
         //borrar propio comentario siendo usuario
         $( ".borrarcomentario" ).click(function(e) {
          e.preventDefault();  // para que no se recargue la pagina una vez hecho el submit del form.
                //esto coje todos los valores del form y me los serializa (convierte en array)
         $.post("controladores/borrarcomentarios.php", {idComentario: $(this).attr('value')})
         .done(function(data){
       
          $('.notificacionesblog').html ("Comentario borrado");
          $('.notificacionesblog').delay(1500).fadeOut (2000);
          $('.comentario-'+data).fadeOut (1500);
         })
         .fail(function(xhr,status,error){
          $('.notificacionesblog').html ('Errors: '+error);
          $('.notificacionesblog').delay(1500).fadeOut (2000);
         });
      
     });
     
      
          $( ".añadirnoticia_m" ).click(function(e) {
              $('#idusuario_form').val($(this).attr('usuario'));
          });

// insertar comentario
$( ".insertarcomentarios_m" ).click(function(e) {
  $( ".cambios" ).hide();
  $( "#insertarcomentario" ).fadeIn(500);  
  
  $('#idNoticia_form').val($(this).attr('noticia'));
  $('#idusuario_form').val($(this).attr('usuario'));
  $('#nombeusuario_form').val($(this).attr('usuarioNombre'));
});



  
//////////////////////////////////////////////////////////////////////////////////////SECCION JAVASCRIPT ////////////////////////////////////////////////////////
//EXPANTA A LA VISTA :: epilepsia visual!!!!
//PARA INSTSAUSTI este tochazo me lo habria evitado usando mi querido JQUERY!!!!!;D

// esto es para el admin. si pincha en entradas o etc que tiene que hacer
if( document.getElementById("login_m") != null)  
{
    document.getElementById("login_m").addEventListener("click",
     function(){ 
        $('#login').css({'display':'block','opacity':'1','pointer-events':'auto'});
    });
}


if( document.getElementById("registro_m") != null)  
{
    document.getElementById("registro_m").addEventListener("click",
     function(){ 
        $('#registro').css({'display':'block','opacity':'1','pointer-events':'auto'});
    });
}




if( document.getElementById("entradas_m") != null)  
{                                                               
    document.getElementById("entradas_m").addEventListener("click", function(){ 
                                                                                document.getElementById('logo').style.display ='none';
                                                                                document.getElementById('entradas').style.display ='block';
                                                                                document.getElementById('usuarios').style.display ='none';
                                                                                document.getElementById('comentarios').style.display ='none';
                                                                                //pongo ahora lo de categorias por si estan alguno de los
                                                                                // includes me los oculte tambien
                                                                                document.getElementById('javascript').style.display ='none';
                                                                                document.getElementById('php').style.display ='none';
                                                                                document.getElementById('jquery').style.display ='none';
                                                                                document.getElementById('problemas').style.display ='none';
                                                                                document.getElementById('añadirnoticia').style.display ='none';
                                                                                document.getElementById('categorialista').style.display ='block';
                                                                                document.getElementById('noticiaslista').style.display ='block';


                                                                              });
}

if( document.getElementById("usuarios_m") != null)  
{   
    document.getElementById("usuarios_m").addEventListener("click", function(){ 
                                                                                document.getElementById('logo').style.display ='none';
                                                                                document.getElementById('entradas').style.display ='none';
                                                                                document.getElementById('usuarios').style.display ='block';
                                                                                document.getElementById('comentarios').style.display ='none';
                                                                                 //pongo ahora lo de categorias por si estan alguno de los
                                                                                // includes me los oculte tambien
                                                                                document.getElementById('javascript').style.display ='none';
                                                                                document.getElementById('php').style.display ='none';
                                                                                document.getElementById('jquery').style.display ='none';
                                                                                document.getElementById('problemas').style.display ='none';
                                                                                document.getElementById('añadirnoticia').style.display ='none';
                                                                                document.getElementById('categorialista').style.display ='none';
                                                                                document.getElementById('comentarios').style.display ='none';
                                                                                document.getElementById('noticiaslista').style.display ='none';

                                                                                




                                                                              });
}

if( document.getElementById("comentarios_m") != null)  
{ 
    document.getElementById("comentarios_m").addEventListener("click", function(){ 
                                                                                document.getElementById('logo').style.display ='none';
                                                                                document.getElementById('entradas').style.display ='none';
                                                                                document.getElementById('usuarios').style.display ='none';
                                                                                document.getElementById('comentarios').style.display ='block';
                                                                                 //pongo ahora lo de categorias por si estan alguno de los
                                                                                // includes me los oculte tambien
                                                                                document.getElementById('javascript').style.display ='none';
                                                                                document.getElementById('php').style.display ='none';
                                                                                document.getElementById('jquery').style.display ='none';
                                                                                document.getElementById('problemas').style.display ='none';
                                                                                document.getElementById('añadirnoticia').style.display ='none';
                                                                                document.getElementById('categorialista').style.display ='none';
                                                                                document.getElementById('noticiaslista').style.display ='none';



                                                                              });
}

if( document.getElementById("cerrarsession_m") != null)  
{
    document.getElementById("cerrarsession_m").addEventListener("click", function(){ 
                                                                                window.location= "menus/logout.php";
                                                                              });
}



//FUNCION BUSQUEDA COMENTARIOS
//---Función de realizar la búsqueda
function searchInText( word, html ) {

  //---Eliminar los spans
  html = html.replace(/<strong class="finded">(.*?)<\/strong>/g, "$1");

  //---Crear la expresión regular que buscará la palabra
  var reg = new RegExp(word.replace(/[\[\]\(\)\{\}\.\-\?\*\+]/, "\\$&"), "gi");
  var htmlreg = /<\/?(?:a|b|br|em|font|img|p|span|strong)[^>]*?\/?>/g;

  //---Añadir los spans
  var array;
  var htmlarray;
  var len = 0;
  var sum = 0;
  var pad = 28 + word.length;

  while ((array = reg.exec(html)) != null) {

    htmlarray = htmlreg.exec(html);

    //---Verificar si la búsqueda coincide con una etiqueta html
      if(htmlarray != null && htmlarray.index < array.index && htmlarray.index + htmlarray[0].length > array.index + word.length){
        reg.lastIndex = htmlarray.index + htmlarray[0].length;
      
        continue;

      }

      len = array.index + word.length;

      html = html.slice(0, array.index) + "<span class='finded'>" + html.slice(array.index, len) + "</span>" + html.slice(len, html.length);

      reg.lastIndex += pad;

      if(htmlarray != null) htmlreg.lastIndex = reg.lastIndex;
      
      sum++;

  }

  return {total: sum, html: html};

}

//---Al presionar el botón de buscar
document.getElementById("button").addEventListener("click", function(){

var search = document.getElementById("search").value;


if(search.length == 0) return;

  var props = searchInText( search, document.getElementById("content").innerHTML );
  
  document.getElementById("results").innerHTML = (props.total > 0) ? "Veces encontradas: " + props.total : "No se ha encontrado";
  
  if(props.total > 0) document.getElementById("content").innerHTML = props.html;

});






      });

      

      