<head>
    <title>Resultados</title>
    <link rel="stylesheet" href="../../../../public/css/user.css">
</head>

<div class="fondo">
    <div class="user-section">
        <form id="formBuscar" class="form" method="post">
            <img src="../../../../public/img/logo.png" width="200" height="100" alt="">
            <p style="text-align: center;">Mis Resultados</p>
            <div class="input-container">
                <input type="text" id="buscar" name="datos" placeholder="Ingrese el dato a buscar" required>
                <span>
                </span>
            </div>
            <button type='submit' name="ingresar" class="btnBuscar">
                Buscar
            </button>
        </form>


    </div>
    <br>
    <form action="pdf/crearpdf.php" method="post">
        <div class="tablaPaciente container" style="display:none;">
            <table class="table table-bordered">
                <div class="container">
                    <h1 class="text-center">Datos Paciente</h1>
                    <div class="row">
                        <div class="col-12">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Rut</th>
                                        <th>Nombre</th>
                                        <th>Paterno</th>
                                        <th>Materno</th>
                                        <th>Telefono</th>
                                        <th>Dirección</th>
                                        <th>Mail</th>
                                        <th>FechaNacimiento</th>
                                        <th>Genero</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyPaciente">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="tablaResultado container" style="display:none;">
                    <table class="table table-bordered">
                        <div class="container">
                            <h1 class="text-center">Resultado</h1>
                            <div class="row">
                                <div class="col-12">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td> Centro Médico </td>
                                                <td> Diagnostico Código </td>
                                                <td> Resultado </td>
                                                <td> Descripción </td>
                                                <td> Fecha de Examén</td>
                                                <td> Fecha de Tinción</td>
                                                <td> Fecha de Diagnóstico </td>
                                                <td> Fecha de Entrega </td>
                                                <td> Confirmación </td>
                                                <td> Observación </td>
                                                <td>Días en proceso</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyResultado">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <input id="buscar" type='submit' name="datos" class="btnBuscar" value="Crear PDF">
    </form>

<<<<<<< Updated upstream
                    <script src="../../../../public/js/usuario.js"></script>
=======
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <script src="../../../../public/js/usuario.js"></script>
>>>>>>> Stashed changes
