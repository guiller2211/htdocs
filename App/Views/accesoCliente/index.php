<head>
    <title>Resultados</title>
    <link rel="stylesheet" href="/ipleones/labMuest/public/css/user.css">
</head>

<div class="fondo">
    <div class="user-section">
        <form id="formBuscar" class="form" method="post">
            <img src="/ipleones/labMuest/public/img/logo.png" width="200" height="100" alt="">
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
    <div class="tablaPaciente container" style="display:none;">
    <a id="crearPdf" class="btnBuscar">Crear PDF</a>

        <div class="container">
            <h1 class="text-center">Datos Paciente</h1>
            <div class="row">
                <div class="col-12">
                    <table id="tablaPaciente">
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
                            <table id="tablaResultado">
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
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>


<script src="/ipleones/labMuest/public/js/usuario.js"></script>
