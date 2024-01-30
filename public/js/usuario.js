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
      window.alert('Datos inexistentes');
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
      <td> ${row.paciente_id} </td>
      <td> ${row.rut_paciente} </td>
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
      <td> ${row.fecha_entrega} </td>
      <td> ${row.Confirmacion} </td>
      <td> ${row.observacion} </td>
      <td>${row.dias_entre_examenes_diagnostico}</td>
       `
    );
    tbody.append(tr);
  });

}

