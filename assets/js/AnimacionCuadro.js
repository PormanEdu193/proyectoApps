document.addEventListener("DOMContentLoaded", function() {

    const cuadro = document.querySelector(".logoContainer");
    const barco = document.querySelector(".logoContainer__imagen")
  
    setTimeout(function() {
      cuadro.style.opacity = "1";

      setTimeout(function() {
        barco.style.transform = "scale(1)"; 
      }, 1000);
    }, 500);
  });