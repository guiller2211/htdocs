$("#buscar").on("change", function (event) {
    event.preventDefault();
    var formData = {
      id: $(this).val()
    };

    fetch("Recepcion/buscarId", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data) {
            //aqui ponen la funcion o llamada que quieren hacer  en este caso pueden usar este o modificarla 
            actualizarTabla(data);
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });

  function actualizarTabla(data) {
    console.log(data);
    const tbody = $("tbody");
    tbody.empty();

    $.each(data, function (i, row) {
      const tr = $("<tr>");
      tr.html(
        `
        <td> ${row.id} </td>
        <td> ${row.examen_id} </td>
        <td> ${row.confirmacion} </td>
        <td> ${row.observacion} </td>
        <td> ${row.fecha} </td>
        <td> ${row.hora} </td>
        <td>
            <button data-id="${row.id}" type='button' class='btn btn-primary openModalBtn'>Diagnosticar</button>
        </td>

        `
      );
      tbody.append(tr);
    });
  }