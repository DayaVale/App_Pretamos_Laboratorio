function mostrarVentanaEmergente(button) {
    // Accedo a los datos del boton donde le di click
    var fila = button.parentNode.parentNode;
    // obtengo las filas que necesito
    var nserial = fila.cells[0].textContent; // Obtiene el texto del primer <td> (nombre)
    var nombresi = fila.cells[1].textContent;
    var cantidad = fila.cells[2].textContent;
    var obse = fila.cells[3].textContent;
    // Estas las muestro en la ventana emergente
    document.getElementById("nserialInput").value = nserial;
    document.getElementById("nombresiInput").value = nombresi;
    document.getElementById("cantidadInput").value = cantidad;
    document.getElementById("obseInput").value = obse;
    
    var exampleModal = document.getElementById("exampleModal");
    exampleModal.style.display = "block";
}

function mostrarImagen(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById("imagenPreview").src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
}  

function mostrarImagen2(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById("imagenPreview2").src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
}


