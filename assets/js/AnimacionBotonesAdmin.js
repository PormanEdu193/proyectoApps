
   const botones = document.querySelectorAll(".botonAdministrador");

        botones.forEach((boton,i)=>{
            botones[i].classList.add('swing-in-top-fwd')
            boton.addEventListener("mouseover",()=>{
                boton.classList.add('scale-up-center');
            })

            boton.addEventListener("mouseleave",()=>{
                boton.classList.remove('scale-up-center');
            })
        })
            setTimeout(()=>{
                botones.forEach((boton,i)=>{
                    botones[i].classList.remove('swing-in-top-fwd')
                })
            },1500)



    
