getUsuarios();
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
      if (!data.success) {
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
    paciente_id: $("#rut").find(":selected").data("test"),
    fecha: $("#fecha").val(),
    centroCodigo: $("#opciones").val(),
  };

  fetch("recepcion/insertExamen", {
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
      if (!data.success) {
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
  // Fun actualizar el select con los datos obtenidos************************************************************
  const select = $("select");
  select.empty(); // clear antes de actualizar
  const optionSelect = $(`<option class="obtenerID">Seleccione Rut</option>`);
  select.append(optionSelect);
  $.each(data, function (i, row) {
    const option = $(
      `<option data-test="${row.rut}" class="obtenerID">${row.rut}</option>`
    );
    select.append(option);
  });
}

function getUsuarios() {
  fetch("recepcion/getData")
    .then((response) => response.json())
    .then((data) => {
      if (data) {
        const select = $("#rut");
        select.empty(); // clear antes de actualizar
        const optionSelect = $(
          `<option class="obtenerID">Seleccione Paciente</option>`
        );
        select.append(optionSelect);
        $.each(data, function (i, row) {
          const option = $(
            `<option data-test="${row.id}" class="obtenerID">${row.rut}</option>`
          );
          select.append(option);
        });
      } else {
        alert("Error en la actualización: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error en la solicitud Fetch: ", error);
    });
}

$("#rut").on("change", function (event) {
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
        $("#nombre").val(data[0].nombre);
        $("#apPat").val(data[0].apPat);
        $("#apMat").val(data[0].apMat);
        $("#telefono").val(data[0].telefono);
        $("#direccion").val(data[0].direccion);
        $("#mail").val(data[0].mail);
      } else {
        alert("Error en la actualización: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error en la solicitud Fetch: ", error);
    });
});

function controlVisi1() {
  var elemento = document.getElementById("ingreso");
  var elemento2 = document.getElementById("diagnostico");
  var elemento3 = document.getElementById("ingresarPaciente");
  elemento.style.display = "block";
  elemento2.style.display = "none";
  elemento3.style.display = "none";
}

function controlVisi2() {
  var elemento = document.getElementById("ingreso");
  var elemento2 = document.getElementById("diagnostico");
  var elemento3 = document.getElementById("ingresarPaciente");
  elemento.style.display = "none";
  elemento2.style.display = "block";
  elemento3.style.display = "none";
}

function controlVisi3() {
  var elemento = document.getElementById("ingresarPaciente");
  var elemento2 = document.getElementById("diagnostico");
  var elemento3 = document.getElementById("ingreso");
  elemento.style.display = "block";
  elemento2.style.display = "none";
  elemento3.style.display = "none";
}

function mostrarResultBusqueda(data) {
  console.log(data);
  const tbody = $("#recepDiag");
  tbody.empty();

  $.each(data, function (i, row) {
    const tr = $("<tr>");
    tr.append(
      `
      <td id="buscar"> ${row.id} </td>
      <td> ${row.rut} </td>
      <td> ${row.nombre} </td>
      <td> ${row.apPat} </td>
      <td> ${row.apMat} </td>
      <td> ${row.telefono} </td>
      <td> ${row.centro_codigo} </td>
      <td> ${row.fecha} </td>
      <td>
        <a class="crearPdf" data-id=${row.id}>Crear PDF</a>
      </td>
      `
    );
    tbody.append(tr);
  });
}

$("#miAdmin").on("change", function (event) {
  event.preventDefault();
  // SE SELECCIONA RUT DEL SELECT Y SE EVALUA SI HAY O NO HAY DIAGNOSTICO DISPONIBLE PARA ENTREGA
  var selectElement = $(this).find(":selected").data("test");
  var rutBuscar = { rut: selectElement }; // arreglo variable para pasarla (rut es el nombre que buscare en controlador)
  fetch("recepcion/evaluarRut", {
    method: "POST",
    body: JSON.stringify(rutBuscar),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      if (data) {
        mostrarResultBusqueda(data);
      } else {
        alert("Error en la actualización: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error en la solicitud Fetch: ", error);
    });
});



//pdf
$(".crearPdf").on("click", function (event) {
  console.log("presiono enlace");
  var buscar = $(this).data("id");
  var formData = {
    action: "generar_pdf",
    buscar,
    
  };
  console.log(formData);
  fetch("recepcion/crearPdf", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formData),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.blob();
    })
    .then((blob) => {
      // Crea un objeto URL para el blob
      const blobUrl = URL.createObjectURL(blob);
      // Redirige al usuario al URL del PDF generado
      window.location.href = blobUrl;
    })
    .catch((error) => {
      console.error("There was a problem with the fetch operation:", error);
    });
});



function tablaPaciente(data) {
  const tbody = $("#tbodyPaciente");
  tbody.empty();
  
    $.each(data, function (i, row) {
      const tr = $("<tr>");
      tr.html(
        `
        <td> ${row.id} </td>
        <td> ${row.rut_paciente} </td>
        <td> ${row.nombre_paciente} </td>
        <td> ${row.apPat_paciente} </td>
        <td> ${row.apMat_paciente} </td>
        <td> ${row.telefono_paciente} </td>
        <td> ${row.direccion_paciente} </td>
        <td> ${row.mail_paciente} </td>
        <td> ${row.fechaNacimiento_paciente} </td>
        <td> ${row.genero_paciente} </td>
        `
      );
      tbody.append(tr);
    });
  }

function tablaResultado(data) {
  const tbody = $("#tbodyResultado");
  tbody.empty();

  $.each(data, function (i, row) {
    const tr = $("<tr>");
    tr.html(
      `
      <td> ${row.nombre_centro} </td>
      <td> ${row.diagnostico_codigo} </td>
      <td> ${row.resultado} </td>
      <td> ${row.descripcion} </td>
      <td> ${row.fecha} </td>
      <td> ${row.fecha_tincion} </td>
      <td> ${row.fecha_diagnostico} </td>
      <td> ${row.fecha_entrega == null ? "" : row.fecha_entrega} </td>
      <td>${row.dias_entre_examenes_diagnostico}</td>
       `
    );
    tbody.append(tr);
  });
}


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$("#formBuscar").on("submit", function (event) {
  event.preventDefault();

  var formData = {
    buscar: $("#buscar").val(),
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
        console.log("paso");
        $(".tablaPaciente").removeAttr("style");
        $(".tablaResultado").removeAttr("style");
        tablaPaciente(data);
        tablaResultado(data);
      } else {
        alert("Error en la actualización: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error en la solicitud Fetch: ", error);
    });
});

$("#crearPdf").on("click", function (event) {
  var formData = {
    action: "generar_pdf",
    buscar: $("#buscar").val(),
  };
  fetch("accesoCliente/crearPdf", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formData),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.blob();
    })
    .then((blob) => {
      // Crea un objeto URL para el blob
      const blobUrl = URL.createObjectURL(blob);
      // Redirige al usuario al URL del PDF generado
      window.location.href = blobUrl;
    })
    .catch((error) => {
      console.error("There was a problem with the fetch operation:", error);
    });
});

function tablaPaciente(data) {
  const tbody = $("#tbodyPaciente");
  tbody.empty();
  
    $.each(data, function (i, row) {
      const tr = $("<tr>");
      tr.html(
        `
        <td> ${row.id} </td>
        <td> ${row.rut_paciente} </td>
        <td> ${row.nombre_paciente} </td>
        <td> ${row.apPat_paciente} </td>
        <td> ${row.apMat_paciente} </td>
        <td> ${row.telefono_paciente} </td>
        <td> ${row.direccion_paciente} </td>
        <td> ${row.mail_paciente} </td>
        <td> ${row.fechaNacimiento_paciente} </td>
        <td> ${row.genero_paciente} </td>
        `
      );
      tbody.append(tr);
    });
  }

function tablaResultado(data) {
  const tbody = $("#tbodyResultado");
  tbody.empty();

  $.each(data, function (i, row) {
    const tr = $("<tr>");
    tr.html(
      `
      <td> ${row.nombre_centro} </td>
      <td> ${row.diagnostico_codigo} </td>
      <td> ${row.resultado} </td>
      <td> ${row.descripcion} </td>
      <td> ${row.fecha} </td>
      <td> ${row.fecha_tincion} </td>
      <td> ${row.fecha_diagnostico} </td>
      <td> ${row.fecha_entrega == null ? "" : row.fecha_entrega} </td>
      <td>${row.dias_entre_examenes_diagnostico}</td>
       `
    );
    tbody.append(tr);
  });
}
