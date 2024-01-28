$(document).ready(function () {
    $("#formRegistro").on("submit", function (event) {
        event.preventDefault();
        var rut = $('#rut').val();
        var RegexFormatoRut = /^\d{7,8}-[k|K|\d]{1}$/;

        if (!RegexFormatoRut.test(rut)) {
            alert("Ingresar rut con el formato: 11111111-1");
            return;
        }

        var formData = {
            rut: $('#rut').val(),
            nombre: $('#nombre').val(),
            apPat: $('#apPat').val(),
            apMat: $('#apMat').val(),
            procedencia: $('#procedencia').val(),
            mail: $('#mail').val(),
            nivel: $('#nivel').val()
        };
        
        fetch("admin/registroAdmin", {
            method: "POST",
            body: JSON.stringify(formData),
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success !== undefined && data.success) {
                    alert("¡Actualización exitosa!");
                    $('#rut').val(''),
                        $('#nombre').val(''),
                        $('#apPat').val(''),
                        $('#apMat').val(''),
                        $('#procedencia').val(''),
                        $('#mail').val(''),
                        $('#nivel').val('')


                } else {
                    alert("Error en la actualización: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error en la solicitud Fetch: ", error);
            });
    });

    $("#formActualizar").on("submit", function (event) {
        event.preventDefault();
        var rut = $('#rut').val();
        var RegexFormatoRut = /^\d{7,8}-[k|K|\d]{1}$/;

        if (!RegexFormatoRut.test(rut)) {
            alert("Ingresar rut con el formato: 11111111-1");
            return;
        }

        var formData = {
            rut: $('#rut_actualizar').val(),
            nombre: $('#nombre_actualizar').val(),
            apPat: $('#apPat_actualizar').val(),
            apMat: $('#apMat_actualizar').val(),
            procedencia: $('#procedencia_actualizar').val(),
            mail: $('#mail_actualizar').val(),
            nivel: $('#nivel_actualizar').val()
        };
        console.log(formData);
        fetch("admin/actualizarAdmin/", {
            method: "POST",
            body: JSON.stringify(formData),
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success !== undefined && data.success) {
                    alert("¡Actualización exitosa!");
                    $('#rut_actualizar').val(''),
                        $('#nombre_actualizar').val(''),
                        $('#apPat_actualizar').val(''),
                        $('#apMat_actualizar').val(''),
                        $('#procedencia_actualizar').val(''),
                        $('#mail_actualizar').val(''),
                        $('#nivel_actualizar').val('')
                } else {
                    alert("Error en la actualización: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error en la solicitud Fetch: ", error);
            });
    });

    $("#formEliminar").on("submit", function (event) {
        event.preventDefault();
        var rut = $('#rut').val();
        var RegexFormatoRut = /^\d{7,8}-[k|K|\d]{1}$/;

        if (!RegexFormatoRut.test(rut)) {
            alert("Ingresar rut con el formato: 11111111-1");
            return;
        }

        var formData = {
            rut: $('#rut_eliminar').val(),
        };
        console.log(formData);
        fetch("admin/eliminarAdmin/", {
            method: "POST",
            body: JSON.stringify(formData),
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success !== undefined && data.success) {
                    alert("¡Actualización exitosa!");
                    $('#rut_eliminar').val('')
                } else {
                    alert("Error en la actualización: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error en la solicitud Fetch: ", error);
            });
    });

    $("#registroCentro").on("submit", function (event) {
        event.preventDefault();

        var formData = {
            codigo: $('#codigoCentro').val(),
            nombre: $('#nombreCentro').val(),
        };
        console.log(formData);
        fetch("admin/registroCentro/", {
            method: "POST",
            body: JSON.stringify(formData),
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success !== undefined && data.success) {
                    alert("¡Actualización exitosa!");
                    $('#codigoCentro').val(''),
                        $('#nombreCentro').val('')

                }
                else {
                    alert("Error en la actualización: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error en la solicitud Fetch: ", error);
            });
    });

    $("#formActualizarCentro").on("submit", function (event) {
        event.preventDefault();

        var formData = {
            codigo: $('#codigo_actualizar').val(),
            nombre: $('#nombre_actualizarCentro').val(),
        };
        console.log(formData);
        fetch("admin/actualizarCentro/", {
            method: "POST",
            body: JSON.stringify(formData),
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success !== undefined && data.success) {
                    alert("¡Actualización exitosa!");
                    $('#codigo_actualizar').val(''),
                        $('#nombre_actualizarCentro').val('')

                } else {
                    alert("Error en la actualización: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error en la solicitud Fetch: ", error);
            });
    });

    $("#formEliminarCentro").on("submit", function (event) {
        event.preventDefault();

        var formData = {
            codigo: $('#codigo_eliminar').val(),
        };
        console.log(formData);
        fetch("admin/eliminarCentro/", {
            method: "POST",
            body: JSON.stringify(formData),
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success !== undefined && data.success) {
                    alert("¡Actualización exitosa!");
                    $('#codigo_eliminar').val('')
                } else {
                    alert("Error en la actualización: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error en la solicitud Fetch: ", error);
            });

    });

    document.getElementById("formBusqueda").addEventListener("submit", function (event) {
        event.preventDefault();

        var formData = {
            fechaInicio: document.getElementById("fechaInicio").value,
            fechaFin: document.getElementById("fechaFin").value,

        };
        console.log(formData);
        fetch("/admin/buscarCentros/", {
            method: "POST",
            body: JSON.stringify(formData),
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success !== undefined && data.success) {

                    document.getElementById("resultadoBusqueda").innerHTML = '';


                    var tableHTML = '<table border="1" id="miTabla">' +
                        '<tr>' +
                        '<th>id</th>' +
                        '<th>Paciente_id</th>' +
                        '<th>Diagnostico_codigo</th>' +
                        '<th>Fecha</th>' +
                        '<th>Centro_codigo</th>' +
                        '<th>Resultado</th>' +
                        '<th>Fecha_entrega</th>' +
                        '</tr>';

                    data.resultados.forEach(function (resultado) {
                        tableHTML += '<tr>' +
                            '<td>' + resultado.id + '</td>' +
                            '<td>' + resultado.paciente_id + '</td>' +
                            '<td>' + resultado.diagnostico_codigo + '</td>' +
                            '<td>' + resultado.fecha + '</td>' +
                            '<td>' + resultado.centro_codigo + '</td>' +
                            '<td>' + resultado.resultado + '</td>' +
                            '<td>' + resultado.fecha_entrega + '</td>' +
                            '</tr>';
                    });

                    tableHTML += '</table">';

                    document.getElementById("resultadoBusqueda").innerHTML = tableHTML;
                    var style = $('<style>' +
                        'table {' +
                        '   width: 90%;' +
                        '   border-collapse: collapse;' +
                        '   margin: 20px auto;' +
                        '}' +
                        'table tr:nth-child(even) {' +
                        '   background-color: #f2f2f2;' +
                        '}' +
                        'table tr:nth-child(odd) {' +
                        '   background-color: #d9edf7;' +
                        '}' +
                        'table tr:hover {' +
                        '   background-color: #5bc0de;' +
                        '   color: #fff;' +
                        '}' +
                        'table td, table th {' +
                        '   border: 1px solid #ddd;' +
                        '   padding: 8px;' +
                        '}' +
                        'table th {' +
                        '   background-color: #337ab7;' +
                        '   color:  #fff;' +
                        '}' +
                        '</style>');

                    $('head').append(style);
                    document.getElementById("resultadoBusqueda").style.display = 'block';
                } else {
                    alert("Error en la búsqueda: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error en la solicitud Fetch: ", error);
            });
    });

    var navLinks = document.getElementsByClassName("nav-link");

    for (var i = 0; i < navLinks.length; i++) {
        navLinks[i].addEventListener("click", function (event) {
            document.getElementById("resultadoBusqueda").style.display = 'none';
        });
    }

    // FRECUENCIA DE CENTRO DE TOMAS 

    document.getElementById("formFrecuencia").addEventListener("submit", function (event) {
        event.preventDefault();

        var formData = {
            codigo: document.getElementById("codigo_busqueda").value,
        };

        console.log(formData);
        fetch("/admin/buscarFrecuenciaCentros/", {
            method: "POST",
            body: JSON.stringify(formData),
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success !== undefined && data.success) {

                    document.getElementById("resultadoBusqueda").innerHTML = '';


                    var tableHTML = '<table border="1" id="miTablaFrecuencia">' +
                        '<tr>' +
                        '<th>id</th>' +
                        '<th>Paciente_id</th>' +
                        '<th>Diagnostico_codigo</th>' +
                        '<th>Fecha</th>' +
                        '<th>Centro_codigo</th>' +
                        '<th>Resultado</th>' +
                        '<th>Fecha_entrega</th>' +
                        '</tr>';

                    data.resultados.forEach(function (resultado) {
                        tableHTML += '<tr>' +
                            '<td>' + resultado.id + '</td>' +
                            '<td>' + resultado.paciente_id + '</td>' +
                            '<td>' + resultado.diagnostico_codigo + '</td>' +
                            '<td>' + resultado.fecha + '</td>' +
                            '<td>' + resultado.centro_codigo + '</td>' +
                            '<td>' + resultado.resultado + '</td>' +
                            '<td>' + resultado.fecha_entrega + '</td>' +
                            '</tr>';
                    });

                    tableHTML += '</table">';

                    document.getElementById("resultadoBusqueda").innerHTML = tableHTML;

                    var style = $('<style>' +
                        'table {' +
                        '   width: 90%;' +
                        '   border-collapse: collapse;' +
                        '   margin: 20px auto;' +
                        '}' +
                        'table tr:nth-child(even) {' +
                        '   background-color: #f2f2f2;' +
                        '}' +
                        'table tr:nth-child(odd) {' +
                        '   background-color: #d9edf7;' +
                        '}' +
                        'table tr:hover {' +
                        '   background-color: #5bc0de;' +
                        '   color: #fff;' +
                        '}' +
                        'table td, table th {' +
                        '   border: 1px solid #ddd;' +
                        '   padding: 8px;' +
                        '}' +
                        'table th {' +
                        '   background-color: #337ab7;' +
                        '   color:  #fff;' +
                        '}' +
                        '</style>');
                        
                    $('head').append(style);
                    document.getElementById("resultadoBusqueda").style.display = 'block';
                } else {
                    alert("Error en la búsqueda: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error en la solicitud Fetch: ", error);
            });
    });

    var navLinks = document.getElementsByClassName("nav-link");

    for (var i = 0; i < navLinks.length; i++) {
        navLinks[i].addEventListener("click", function (event) {
            document.getElementById("resultadoBusqueda").style.display = 'none';
        });
    }


    //EXPORTAR ARCHIVO

    $("#exportarAExcel").on("click", function (event) {
        event.preventDefault();
        alert("¡Éxito! archivo creado.");
        exportarAExcel();
    });
    $("#exportarAExcel2").on("click", function (event) {
        event.preventDefault();
        alert("¡Éxito! archivo creado.");
        exportarAExcel2();
    });


    function exportarAExcel() {
        var tabla = document.getElementById("miTabla");
        var csv_contenido = "data:text/csv;charset=utf-8,\uFEFF";

        var headers = [];
        $(tabla).find('th').each(function () {
            headers.push('"' + $(this).text() + '"');
        });
        csv_contenido += headers.join(";") + "\n";

        $(tabla).find('tbody tr').each(function () {
            var row_data = [];
            $(this).find('td').each(function () {
                row_data.push('"' + $(this).text() + '"');
            });
            csv_contenido += row_data.join(";") + "\n";
        });

        var encodedUri = encodeURI(csv_contenido);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "registros.csv");

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    function exportarAExcel2() {
        var tabla = document.getElementById("miTablaFrecuencia");
        var csv_contenido = "data:text/csv;charset=utf-8,\uFEFF";

        var headers = [];
        $(tabla).find('th').each(function () {
            headers.push('"' + $(this).text() + '"');
        });
        csv_contenido += headers.join(";") + "\n";

        $(tabla).find('tbody tr').each(function () {
            var row_data = [];
            $(this).find('td').each(function () {
                row_data.push('"' + $(this).text() + '"');
            });
            csv_contenido += row_data.join(";") + "\n";
        });

        var encodedUri = encodeURI(csv_contenido);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "registros.csv");

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
});