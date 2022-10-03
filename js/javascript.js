
function todosLosDias(){
    
    y = document.querySelectorAll(".card")
    for (i = 0; i < y.length; i++) {
        y[i].style.backgroundColor = "bisque";
    }
}

function diaSabado(){
    
    y = document.querySelectorAll(".sabado")
    for (i = 0; i < y.length; i++) {
        y[i].style.backgroundColor = "bisque";
    }
}

/*Cuando se deje de hacer clic*/
function limpiar() {
    x = document.querySelectorAll(".card")
    for (i = 0; i < x.length; i++) {
        x[i].style.removeProperty("background-color");
    }
  };
  