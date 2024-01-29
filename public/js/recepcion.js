//PACIENTE
$("#formRegistro").on("submit", function (event) {
  event.preventDefault();

  var formData = {
    rut: $("#rut1").val(),
    nombre: $("#nombre1").val(),
    apPat: $("#apPat1").val(),
    apMat: $("#apMat1").val(),
    telefono: $("#telefono1").val(),
    direccion: $("#direccion1").val(),
    mail: $("#mail1").val(),
    Fnac: $("#Fnac1").val(),
    genero: $("#genero1").val(),
  };

  fetch("Recepcion/insertUser", {
    headers: {
      "Content-Type": "application/json",
    },
    method: "POST",
    body: JSON.stringify(formData),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.text();
    })
    .then((data) => {
      console.log(data);
      if (data.success) {
        alert("¡Datos agregados!");
        // Resto del código para manejar la respuesta exitosa
        $(
          "#rut, #nombre, #apPat, #apMat, #telefono, #direccion, #mail, #Fnac, #genero"
        ).val("");
      } else {
        alert("Error" + data.message);
      }
    })
    .catch((error) => {
      console.error("Error en la solicitud Fetch: ", error);
    });
});

//EXAMEN
$("#formExamen").on("submit", function (event) {
  event.preventDefault();

  var formData = {
    rut: $("#rut").val(),
    nombre: $("#nombre").val(),
    apPat: $("#apPat").val(),
    apMat: $("#apMat").val(),
    telefono: $("#telefono").val(),
    direccion: $("#direccion").val(),
    mail: $("#mail").val(),
    fecha: $("#fecha").val(),
    opciones: $("#opciones").val(),
  };

  fetch("Recepcion/insertExamen", {
    headers: {
      "Content-Type": "application/json",
    },
    method: "POST",
    body: JSON.stringify(formData),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.text();
    })
    .then((data) => {
      console.log(data);
      if (data.success) {
        alert("¡Datos agregados!");
        // Resto del código para manejar la respuesta exitosa
        $(
          "#rut, #nombre, #apPat, #apMat, #telefono, #direccion, #mail, #fecha, #opciones"
        ).val("");
      } else {
        alert("Error" + data.message);
      }
    })
    .catch((error) => {
      console.error("Error en la solicitud Fetch: ", error);
    });
});
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

function actualizarSelect(data) {
  // Fun actualizar el select con los datos obtenidos************
  const select = $("select");
  select.empty(); // clear antes de actualizar

  $.each(data, function (i, row) {
    const option = $(
      `<option data-test="${row.rut}" class="obtenerID">${row.rut}</option>`
    );
    select.append(option);
  });
}
function controlVisi1() {
  var elemento = document.getElementById('ingreso');
  var elemento2 = document.getElementById('diagnostico');
  var elemento3 = document.getElementById('ingresarPaciente');
  elemento.style.display = 'block';
  elemento2.style.display = 'none';
  elemento3.style.display = 'none';
}

function controlVisi2() {
  var elemento = document.getElementById('ingreso');
  var elemento2 = document.getElementById('diagnostico');
  var elemento3 = document.getElementById('ingresarPaciente');
  elemento.style.display = 'none';
  elemento2.style.display = 'block';
  elemento3.style.display = 'none';
}

function controlVisi3() {
  var elemento = document.getElementById('ingresarPaciente');
  var elemento2 = document.getElementById('diagnostico');
  var elemento3 = document.getElementById('ingreso');
  elemento.style.display = 'block';
  elemento2.style.display = 'none';
  elemento3.style.display = 'none';
}
