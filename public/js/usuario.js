$("#formBuscar").on("submit", function (event) {
    event.preventDefault();
  
    var formData = {
      dato: $('#buscar').val()
    };
  
    fetch("accesoCliente/buscarID", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data) {
          console.log(data)
          //aqui ponen la funcion o llamada que quieren hacer  en este caso pueden usar este o modificarla 
          //actualizarTabla(data);
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });