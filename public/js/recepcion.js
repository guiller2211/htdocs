$(document).ready(function () {
    //PACIENTE
    $("#formRegistro").on("submit", function (event) {
        event.preventDefault();

        var formData = {
            rut: $('#rut1').val(),
            nombre: $('#nombre1').val(),
            apPat: $('#apPat1').val(),
            apMat: $('#apMat1').val(),
            telefono: $('#telefono1').val(),
            direccion: $('#direccion1').val(),
            mail: $('#mail1').val(),
            Fnac: $('#Fnac1').val(),
            genero: $('#genero1').val()
        };

        
        fetch("Recepcion/insertUser", {
            headers: {
                "Content-Type": "application/json",
            },
            method: "POST",
            body: JSON.stringify(formData),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.text();
        })
        .then(data => {
            console.log(data);
            if (data.success) {
                alert("¡Datos agregados!");
                // Resto del código para manejar la respuesta exitosa
                $('#rut, #nombre, #apPat, #apMat, #telefono, #direccion, #mail, #Fnac, #genero').val('');
            } else {
                alert("Error" + data.message);
            }
        })
        .catch(error => {
            console.error("Error en la solicitud Fetch: ", error);
        });
    });

    //EXAMEN
    $("#formExamen").on("submit", function (event) {
        event.preventDefault();

        var formData = {
            rut: $('#rut').val(),
            nombre: $('#nombre').val(),
            apPat: $('#apPat').val(),
            apMat: $('#apMat').val(),
            telefono: $('#telefono').val(),
            direccion: $('#direccion').val(),
            mail: $('#mail').val(),
            fecha: $('#fecha').val(),
            opciones: $('#opciones').val()
        };

        fetch("Recepcion/insertExamen", {
            headers: {
                "Content-Type": "application/json",
            },
            method: "POST",
            body: JSON.stringify(formData),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.text();
        })
        .then(data => {
            console.log(data);
            if (data.success) {
                alert("¡Datos agregados!");
                // Resto del código para manejar la respuesta exitosa
                $('#rut, #nombre, #apPat, #apMat, #telefono, #direccion, #mail, #fecha, #opciones').val('');
            } else {
                alert("Error" + data.message);
            }
        })
        .catch(error => {
            console.error("Error en la solicitud Fetch: ", error);
        });
    });
});

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
