<!DOCTYPE html>
<html lang="es">

<head>
    <title>Datos Guardados</title>
    <!-- Enlaces a los archivos CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="<?php echo __DIR__ ?>/css/recepcion.css">
    <link rel="stylesheet" href="<?php echo __DIR__ ?>/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    
    </style>
</head>

<body>
    <?php 
    foreach ($data as $row) :  
        $id= $row['id'];
        $rutCliente = $row['rut_paciente'];
        $nombre = $row['nombre_paciente'];
        $apPat= $row['apPat_paciente'];
        $apMat= $row['apMat_paciente']; 
        $fono= $row['telefono_paciente']; 
        $dir= $row['direccion_paciente']; 
        $email= $row['mail_paciente']; 
        $fNac=$row['fechaNacimiento_paciente']; 
        $genero= $row['genero_paciente'];
    endforeach; 
    ?>
    <div class="container-fluid">
        <table class="table w-100">
            <tr>
                <td class="col-md-8">
                    <h3>Datos del paciente</h3>
                    <p class="my-1">Rut: <?php echo $rutCliente?></p>
                    <p class="my-1"><?php echo $nombre." ".$apPat." ".$apMat?></p>
                    <p>Direccion: <?php echo $dir?></p>
                    <p>Telefono: <?php echo $fono?></p>
                    <p>F. Nacimiento: <?php echo $fNac?></p>
                    <p>Genero: <?php echo $genero?></p>
                </td>
                <td class="col-md-4"style="text-align: right; width:500px;">
                    <img src="<?php echo __DIR__ ?>/img/2.jpg" alt="" class="img-fluid" class="img-fluid" style="max-width: 150px; max-height: 150px;"/>
                </td>
            </tr>
        </table>
        <table class='w-100'>
            <tr>
                <td class="col-md-6"></td>
                <td class="col-md-6"style="text-align: right; width:500px;">
                    <h1 class="centrarEnPdf">Informe de Diagnóstico</h1>
                </td>
            </tr>
        </table>
    </div>
    <table class='w-100'>
        <tr>
        <td class="col-md-2"></td>
        <td class="col-md-10"style="text-align: center; width:700px;">
            <h3 class="centrarEnPdf">RESULTADO</h3>
            <table class="w-100" style="text-align: center; width:700px;">
                <thead>
                    <tr>
                        <th > Centro De toma de Muestra</th>
                        <th > Diagnostico Código </th>
                        <th > Resultado </th>
                        <th > Descripción </th>
                    </tr>
                </thead>
                <tbody id="tbodyResultado">
                    <?php foreach ($data as $row) : ?>
                    <tr >
                        <td ><?php echo $row['nombre_centro']; ?></td>
                        <td><?php echo $row['diagnostico_codigo']; ?></td>
                        <td><?php echo $row['resultado']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <!--TRAZABILIDAD-->
            <h4 class="centrarEnPdf">TRAZABILIDAD</h4>
            <table class="w-100" style="text-align: center; width:700px;">
                <thead>
                    <tr>
                        <th> Fecha de Examén</th>
                        <th> Fecha de Tinción</th>
                        <th> Fecha de Diagnóstico </th>
                        <th>Días en proceso</th>
                    </tr>
                </thead>
                <tbody id="tbodyResultado">
                    <?php foreach ($data as $row) : ?>
                    <tr>
                        
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['fecha_tincion']; ?></td>
                        <td><?php echo $row['fecha_diagnostico']; ?></td>
                        <td><?php echo $row['dias_entre_examenes_diagnostico']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </td>
            </tr>
         </table>

            
            
   

    <br>
    <br>
    <br>
    <br>
    <footer>
        <img src="<?php echo __DIR__ ?>/img/firma.png" alt="" class="img-fluid" style="max-width: 150px; max-height: 150px;">
        <p>_______________</p>
        <h3>FIRMA</h3>
        <h4>Copia Informe: <?php echo date('d/m/Y') ?></h4>
    </footer>
    <!-- Incluye los scripts de Bootstrap al final del documento -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</body>

</html>