

<div class = "cambios">
    <div id="reproductor" >
    <video id="miVideo" name="videos"  src="assets/videos/vid2.mp4" width="640"  ></video>
    </div>

    <div id="informacion">
        
            <p> 
                    <cite>Autor:Mauri Sec </cite> <br>  
                     Video: PHP Code Injection <br>
                     Duración: 02:33
                    </p>
        
     </div>

    <div id="controles">
        <ul>
            
            <li id="vid2">PHP Code Injection</li>
            <li id="vid">Callbacks Explained </li>
            <li id="vid3">Instalar XAMPP en MAC</li>
            
            
        </ul>
        <img id="reproducir" src="assets/images/play.png" alt="" width="50">
        <img id="max" src="assets/images/max.png" alt=""width="50">
        <img id="silen" src="assets/images/nomuted.png" width="50">
        <input id="des" type="range" orient="vertical"><span id="valor"></span>
        <div id ="barra">
            <div id="progreso">
        
                </div><p id="tiempo"></p>
        </div>
     </div>

     
     </div>
     
    

    <script>
        
        //Seleccionar Videos y Modificar Informacion
        document.getElementById("vid2").addEventListener("click", vid2);
        document.getElementById("vid").addEventListener("click", vid1);
        
        document.getElementById("vid3").addEventListener("click", vid3);
        document.getElementById("controles").addEventListener("mouseover", puntero);

        galeria= new Array();

        
        galeria[0]="assets/videos/vid2.mp4";
        galeria[1]="assets/videos/vid.mp4";
        galeria[2]="assets/videos/vid3.mp4";
        


             function vid2(){
            var info2 = "<p> <cite>Autor:Mauri Sec </cite> <br>Video: PHP Code Injection<br>Duración: 02:33</p>";  
            document.getElementById("informacion").innerHTML="";
            var divInformacion = document.getElementById("informacion");
            var nuevoElemento2 = document.createElement("p");
            divInformacion.appendChild(nuevoElemento2);
            nuevoElemento2.innerHTML=info2;
            document.getElementById("miVideo").src=galeria[0];
            

          
            
        }
        function vid1(){
            
            var info2 = "<p> <cite>Autor:Daniel Niederberger</cite> <br>Video: Callbacks Explained Simply <br>Duración: 02:48</p>";  
            document.getElementById("informacion").innerHTML="";
            var divInformacion = document.getElementById("informacion");
            var nuevoElemento2 = document.createElement("p");
            divInformacion.appendChild(nuevoElemento2);
            nuevoElemento2.innerHTML=info2;
            document.getElementById("miVideo").src=galeria[1];
            
            
        }

    

         function vid3(){
            var info3 = "<p> <cite>Autor:Bemol </cite> <br>Video: Instalar XAMPP en MAC OSX!! 2018<br>Duración: 02:28</p>";  
            document.getElementById("informacion").innerHTML="";
            var divInformacion = document.getElementById("informacion");
            var nuevoElemento3 = document.createElement("p");
            divInformacion.appendChild(nuevoElemento3);
            nuevoElemento3.innerHTML=info3;
            document.getElementById("miVideo").src=galeria[2];
        }

        function puntero() {
            this.style.cursor="pointer";
        }
        
       
        //Controles del reproductor
        document.getElementById("reproducir").addEventListener("click",iniciarPausar);
        document.getElementById("max").addEventListener("click", grande);
        window.addEventListener("keydown", minimizar);
        document.getElementById("des").addEventListener("change", volumen);
        document.getElementById("silen").addEventListener("click", silenciar);
        document.getElementById("barra").addEventListener("click", manejar)
        video= document.getElementById("miVideo");
        valor=document.getElementById("valor");
        deslizar= document.getElementById("des");
        barra=document.getElementById("barra");
        progreso=document.getElementById("progreso");
        var maximo=240;
       
        
        
        

        
        
       
       
        function iniciarPausar() {
            if(video.paused){
                video.play();
                this.src="assets/images/pause.png";
                repeticion= setInterval(duracion,1000);
                
            }else{
                video.pause();
                this.src="assets/images/play.png"
            }
            
        }
        function duracion() {
           
            if(video.ended==false) {
                var total = parseInt(video.currentTime*maximo/video.duration); 
                progreso.style.width= total + "px"; 
            }
        }
        function manejar(posicion) {
            if( video.ended==false) {
                var pulsarX=posicion.pageX-barra.offsetLeft; //punto concreto de la barra. El offsetLeft devuelve el número de píxeles a la izquierda del elemento actual con respecto al nodo
                var tiempoNuevo = pulsarX*video.duration/maximo; //segundo concreto en el que pulsamos
                video.currentTime= tiempoNuevo;
                progreso.style.width= pulsarX + "px"; 
            }
        }

        function grande() {
            /* var anc=screen.width;
            var alt=screen.height; 
            alert("Pulsa Esc para salir");
            video.width=anc;
            video.height=alt; 
            window.open("#", "nombre de la ventana", width=anc, height=alt);
            ---------------------------------------------------------------*/
            alert("Pulse [Esc] para salir de modo cine")
            video.width=1000;
            document.body.style.backgroundColor="rgb(4, 19, 34)";
            document.getElementById("informacion").style.display="none";

            
                
              
        }
        function minimizar(e) {
            var tecla=e.keyCode;
            if(tecla==27){
                video.width=640;
                document.body.style.backgroundColor="";
                document.getElementById("informacion").style.display="";
            }
            
        }

 

            
        
        
        function volumen() {
            miVideo.volume=deslizar.value/100;
            valor.innerHTML=Math.round(miVideo.volume*100);
            
        }

        function silenciar() {
            
	        if (miVideo.muted){
		        miVideo.muted=false;
		        this.src="assets/images/nomuted.png"
	        }else{
		        miVideo.muted=true;
		        this.src="assets/images/muted.png"
	        }
        }
        
        

    
    
    </script>

  