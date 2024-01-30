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
      window.alert("Datos inexistentes");
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
  if (data[0].rut_paciente === data[1].rut_paciente) {
    const tr = $("<tr>");
    tr.html(
      `
      <td> ${data[0].id} </td>
      <td> ${data[0].rut_paciente} </td>
      <td> ${data[0].nombre_paciente} </td>
      <td> ${data[0].apPat_paciente} </td>
      <td> ${data[0].apMat_paciente} </td>
      <td> ${data[0].telefono_paciente} </td>
      <td> ${data[0].direccion_paciente} </td>
      <td> ${data[0].mail_paciente} </td>
      <td> ${data[0].fechaNacimiento_paciente} </td>
      <td> ${data[0].genero_paciente} </td>
      `
    );
    tbody.append(tr);
  } else {
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
