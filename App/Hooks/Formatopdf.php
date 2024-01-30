<!DOCTYPE html>
<html lang="es">

<head>
    <title>Datos Guardados</title>
    <!-- Enlaces a los archivos CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="<?php echo __DIR__ ?>/css/user.css">
    <link rel="stylesheet" href="<?php echo __DIR__ ?>/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>

    <div class="container">
        <div class="company-info">
            <div class="company-logo">
                <img src="<?php echo __DIR__ ?>/img/2.jpg" alt="" />
            </div>
            <br>
            <div class="company-details">
                <h2>Informe de Diagnostico</h2>
            </div>

        </div>
        <br>
        <br>
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
                            <th>Fecha N</th>
                            <th>Genero</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyPaciente">
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['rut_paciente']; ?></td>
                                <td><?php echo $row['nombre_paciente']; ?></td>
                                <td><?php echo $row['apPat_paciente']; ?></td>
                                <td><?php echo $row['apMat_paciente']; ?></td>
                                <td><?php echo $row['telefono_paciente']; ?></td>
                                <td><?php echo $row['direccion_paciente']; ?></td>
                                <td><?php echo $row['mail_paciente']; ?></td>
                                <td><?php echo $row['fechaNacimiento_paciente']; ?></td>
                                <td><?php echo $row['genero_paciente']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
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
                                <?php foreach ($data as $row) : ?>
                                    <tr>
                                        <td><?php echo $row['nombre_centro']; ?></td>
                                        <td><?php echo $row['diagnostico_codigo']; ?></td>
                                        <td><?php echo $row['resultado']; ?></td>
                                        <td><?php echo $row['descripcion']; ?></td>
                                        <td><?php echo $row['fecha']; ?></td>
                                        <td><?php echo $row['fecha_tincion']; ?></td>
                                        <td><?php echo $row['fecha_diagnostico']; ?></td>
                                        <td><?php echo $row['fecha_entrega'] == null ? "" : $row['fecha_entrega']; ?></td>
                                        <td><?php echo $row['dias_entre_examenes_diagnostico']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <a id="crearPdf" class="btnBuscar">Crear PDF</a>
        </table>
    </div>

    <br>
    <br>
    <br>
    <br>
    <footer>
        <img src="<?php echo __DIR__ ?>/img/firma.png" alt="">
        <h3>FIRMA</h3>
        <h4>Copia Informe: <?php echo date('d/m/Y') ?></h4>
    </footer>
    <!-- Incluye los scripts de Bootstrap al final del documento -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</body>

</html>