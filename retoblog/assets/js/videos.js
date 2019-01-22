//VIDEOS TUTORIALES
document.getElementById("reproducir").addEventListener("click",iniciarPausar);
        document.getElementById("max").addEventListener("click", grande);
        document.getElementById("des").addEventListener("change", volumen);
        document.getElementById("silen").addEventListener("click", silenciar);
        document.getElementById("barra").addEventListener("click", manejar)
        video= document.getElementById("miVideo");
        valor=document.getElementById("valor");
        deslizar= document.getElementById("des");
        barra=document.getElementById("barra");
        progreso=document.getElementById("progreso");
        maximo=640;
        total=0;
       
        function iniciarPausar() {
            if(video.paused){
                video.play();
                this.src="images/pause.png";
                repeticion= setInterval(duracion,1000);
                
            }else{
                video.pause();
                this.src="images/play.png"
            }
            
        }
        function duracion() {
           
            if(video.ended==false) {
                var total = parseInt(video.currentTime*maximo/video.duration); 
                progreso.style.width= total + "px"; 
            }
        }
        function manejar(posicion) {
            if((video.paused==false) && video.ended==false) {
                var pulsarX=posicion.pageX-barra.offsetLeft; //punto concreto de la barra
                var tiempoNuevo = pulsarX*video.duration/maximo; //segundo concreto en el que pulsamos
                video.currentTime= tiempoNuevo;
                progreso.style.width= pulsarX + "px"; 
            }
        }

        function grande() {
            video.width=740;
            video.height=420;
        }
        
        function volumen() {
            miVideo.volume=deslizar.value/100;
            valor.innerHTML=Math.round(miVideo.volume*100);
            
        }

        function silenciar() {
            
	        if (miVideo.muted){
		        miVideo.muted=false;
		        this.src="images/nomuted.png"
	        }else{
		        miVideo.muted=true;
		        this.src="images/muted.png"
	        }
        }