function scroll_inicio(){
    document.querySelector('#inicio').scrollIntoView({ 
        behavior: 'smooth' 
      });
}




function todosLosDias(){
    
    y = document.querySelectorAll(".semana")
    for (i = 0; i < y.length; i++) {
        y[i].style.backgroundColor = "bisque";
        console.log (y[i])
    }
}

function diaSabado(){
    
    y = document.querySelectorAll(".sabado")
    for (i = 0; i < y.length; i++) {
        y[i].style.backgroundColor = "bisque";
        console.log (y[i])
    }
}

/*Cuando se deje de hacer clic*/
function limpiar() {
    x = document.querySelectorAll(".limpiar")
    for (i = 0; i < x.length; i++) {
        x[i].style.removeProperty("background-color");
        console.log (y[i])
    }
  };
  