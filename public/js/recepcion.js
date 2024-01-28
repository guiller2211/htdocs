$("#buscar").on("change", function (event) {
  event.preventDefault();
  var formData = {
    rut: $(this).val(),
  };

  fetch("recepcion/buscarRut", {
    method: "POST",
    body: JSON.stringify(formData),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      if (data) {
        actualizarSelect(data); // funcion actualizar select****************
      } else {
        alert("Error en la actualización: " + data.message);
      }
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


function controlVisi1() {
  var elemento = document.getElementById('diagnostico');
  var elemento2 = document.getElementById('ingreso');
  elemento.style.display = 'none';
  elemento2.style.display = 'block';
}

function controlVisi2() {
  var elemento = document.getElementById('ingreso');
  var elemento2 = document.getElementById('diagnostico');
  elemento.style.display = 'none';
  elemento2.style.display = 'block';
}
