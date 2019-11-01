window.addEventListener("load",()=>{
    var boton = document.querySelector("#botonMenu");
    var menu = document.querySelector("#navMenu");
    var cerrar = document.querySelector("#botonMenuCerrar");
    var usuario = document.querySelector("#botonPerfil");
    var opcionesUsuario = document.querySelector("#opcionesUsuario");
    var jugar = document.querySelector("#palabra");

function cambiarColor(){
    setInterval(()=>{
        if(jugar.style.backgroundColor == "#f7b733" ){
        jugar.style.backgroundColor = "#fc4a1a";
        }else{
            jugar.style.backgroundColor = "#f7b733"
        }},500)
    }



    boton.addEventListener("click", ()=>{
        
        menu.className = "abierto";
        cambiarColor;
        
    
    })
    cerrar.addEventListener("click",()=>{
        menu.className = "";
        clearInterval(proceso)

    })
    usuario.addEventListener("click",()=>{
        if(opcionesUsuario.className == ""){
        opcionesUsuario.className = "cerrar";
        console.log("sirve");
            }else{
                opcionesUsuario.className = "";
            }
    })

    
    
   
})