$("#buscar").on("change", function (event) {
  event.preventDefault();
  var formData = {
    rut: $(this).val(),
  };

  fetch("Recepcion/buscarRut", {
    method: "POST",
    body: JSON.stringify(formData),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
   
    .then((data) => {
      console.log("data es: ",data);
      if (data) {
        actualizarSelect(data); // funcion actualizar select****************
      } else {
        alert("Error en la actualización: " + data.message);
      }52
    })
    .catch((error) => {
      console.error("Error en la solicitud Fetch: ", error);
    });
});
function actualizarSelect(data) { // Fun actualizar el select con los datos obtenidos************
  const select = $("select");
  select.empty();  // clear antes de actualizar

  $.each(data, function (i, row) {
    const option = $(`<option data-test="${row.rut}" class="obtenerID">${row.rut}</option>`);
    select.append(option);
  });
}
