$(document).ready(function () {
  var selectedId;

  getSelect();

  $("tbody").on("click", ".openModalBtn", function () {
    $("#myModal").css("display", "block");
    selectedId = $(this).data("id");
    $("#confirmacion").prop("checked", false);
    $("#observacion").val();
    console.log("ID seleccionado:", selectedId);
  });

  $(".close").click(function () {
    $("#myModal").css("display", "none");
  });

  $(window).click(function (event) {
    if (event.target == $("#myModal")[0]) {
      $("#myModal").css("display", "none");
    }
  });

  $("#myFormTincion").on("submit", function (event) {
    event.preventDefault();

    var formData = {
      id: selectedId,
      confirmacion: $("#confirmacion").is(":checked"),
      observacion: $("#observacion").val(),
    };

    fetch("tincion/updateTincion", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          fetch("tincion/getData")
            .then((response) => response.json())
            .then((data) => {
              if (data) {
                actualizarTabla(data);

                $("#myModal").css("display", "none");
              } else {
                alert("Error en la actualización: " + data.message);
              }
            })
            .catch((error) => {
              console.error("Error en la solicitud Fetch: ", error);
            });
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });

  function actualizarTabla(data) {
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

  $("#myFormTincion").on("submit", function (event) {
    event.preventDefault();

    var formData = {
      id: selectedId,
      confirmacion: $("#confirmacion").val(),
      observacion: $("#observacion").val(),
    };

    fetch("tincion/updateTincion", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          fetch("tincion/getData")
            .then((response) => response.json())
            .then((data) => {
              if (data) {
                actualizarTabla(data);
                $("#myModal").css("display", "none");
              } else {
                alert("Error en la actualización: " + data.message);
              }
            })
            .catch((error) => {
              console.error("Error en la solicitud Fetch: ", error);
            });
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
      $("#observacion").val(row.observacion);
      $("#fecha").val(row.fecha);

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




  $("#buscar").on("change", function (event) {
    event.preventDefault();

    var formData = {
      id: $(this).val(),
    };

    fetch("tincion/buscarId", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data) {
          actualizarTabla(data);
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });






  function getSelect() {
    fetch("tincion/getData")
      .then((response) => response.json())
      .then((data) => {
        if (data) {
          const select = $("select");
          $.each(data, function (i, row) {
            const option = $(
              `<option data-test="${row.id}" class="obtenerID"> ${row.id} </option>`
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

  $("#miAdmin").on("change", function (event) {
    event.preventDefault();
    var formData = {
      id: $(this).find(":selected").data("test"),
    };
    fetch("tincion/buscarId", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data) {
          actualizarTabla(data);
        } else {
          alert("Error en la actualización: " + data.message);
        }
      });
    console.log("ID seleccionado:", $(this).find(":selected").data("test"));
  });

  $("#buscar").on("change", function (event) {
    event.preventDefault();
    var formData = {
      id: $(this).val(),
    };

    fetch("tincion/buscarId", {
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
});
