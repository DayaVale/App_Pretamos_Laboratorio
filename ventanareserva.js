function mostrarVentanaReserva(button) {
    // Accedo a los datos del boton donde le di click
    var fila = button.parentNode.parentNode;
    // obtengo las filas que necesito
    var nserial1 = fila.cells[0].textContent; // Obtiene el texto del primer <td> (nombre)
    var nombresi1 = fila.cells[1].textContent;

    // Estas las muestro en la ventana emergente
    document.getElementById("SerialInput").value = nserial1;
    document.getElementById("NombreSerialInput").value = nombresi1;

    
    var exampleModal2 = document.getElementById("exampleModal2");
    exampleModal2.style.display = "block";
}
