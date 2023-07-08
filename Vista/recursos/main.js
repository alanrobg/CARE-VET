/*
let ubicacionPrincipal  = window.pageYOffset;
window.onscroll = function() {
    let Desplazamiento_Actual = window.pageYOffset;
    if(ubicacionPrincipal >= Desplazamiento_Actual){
        document.getElementById('cabecera').style.top = '0';
    }
    else{
        document.getElementById('cabecera').style.top = '-100px';
    }
    ubicacionPrincipal = Desplazamiento_Actual;
}
*/


if (window.innerWidth < 800) {
    let ubicacionPrincipal = window.pageYOffset;
    let $nav = document.querySelector("nav");

    window.addEventListener("scroll", function() {

        let desplazamientoActual = window.pageYOffset;
        if(ubicacionPrincipal >= desplazamientoActual) {
            $nav.style.top = "0px";
        } else {
            $nav.style.top = "-250px";
        }

        ubicacionPrincipal = desplazamientoActual;
    });
}else{
    let ubicacionPrincipal = window.pageYOffset;
    let $nav = document.querySelector("nav");

    window.addEventListener("scroll", function() {

        let desplazamientoActual = window.pageYOffset;
        if(ubicacionPrincipal >= desplazamientoActual) {
            $nav.style.top = "0px";
        } else {
            $nav.style.top = "0px";
        }

        ubicacionPrincipal = desplazamientoActual;
    });
}