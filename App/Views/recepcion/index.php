<head>
    <link rel="stylesheet" href="../../../../public/css/recepcion.css">
    <title>Recepci&oacute;n</title>
</head>
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-center flex-column">
        <h2 class="titulo-recep">Recepcion y Digitacion</h2>
        <nav class="nav-ok">
            <a class="enlace-nav" href="#" onclick="controlVisi1()">REGISTRAR EXAMEN</a>
            <a class="enlace-nav" href="#" onclick="controlVisi2()">ENTREGAR RESULTADOS</a>
        </nav>
        <div id="diagnostico" style="display:none">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <form class="formulario">
                        <div class="form-group">
                            <label class="label-form">Rut de Paciente</label>
                            <input type="text" class="form-control" id="buscar" placeholder="Rut">
                        </div>
                    </form>
                </div>
            </div>

            <div class="container-fluid">
                <h1 class="text-center">Lista de Exámenes Médicos</h1>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">rut</th>
                                    <th scope="col">nombre</th>
                                    <th scope="col">apPat</th>
                                    <th scope="col">apMat</th>
                                    <th scope="col">telefono</th>
                                    <th scope="col">Centro Medico</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Opci&oacute;n</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?php echo $row['rut'];?></td>
                                    <td><?php echo $row['nombre'];?></td>
                                    <td><?php echo $row['apPat'];?></td>
                                    <td><?php echo $row['apMat'];?></td>
                                    <td><?php echo $row['telefono'];?></td>
                                    <td><?php echo $row['centro_codigo'];?></td>
                                    <td><?php echo $row['fecha'];?></td>
                                    <td><form action=""><input type="hidden" name="idExamen" value="<?php echo $row['fecha'];?>"><input type="submit" class="btn btn-primary" value="Ver Diagnostico"></form></td>

                                </tr>
                                <?php endforeach; ?>

                            </tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div id="ingreso" class="ver-ingreso">
            <form class="formulario" action="#">
                <h3>Registro de examen</h3>
                <div class="contenedor-divi">
                    <div class="izquierda">
                        <div class="campo">
                            <label class="label-form">Fecha</label>
                            <input class="input-form" class="element-especial" type="date" name="" required>
                        </div>
                        <div class="campo">
                            <label class="label-form">Nombre</label>
                            <input class="input-form" type="text" name="" required>
                        </div>
                        <div class="campo">
                            <label class="label-form">Apellido Materno</label>
                            <input class="input-form" type="text" name="" required>
                        </div>
                        <div class="campo">
                            <label class="label-form">Email</label>
                            <input class="input-form" type="text" name="" required>
                        </div>
                    </div>
                    <div class="derecha">

                        <div class="campo">
                            <label class="label-form">RUT</label>
                            <input class="input-form" type="text" name="" required>
                        </div>
                        <div class="campo">
                            <label class="label-form">Apellido Paterno</label>
                            <input class="input-form" type="text" name="" required>
                        </div>
                        <div class="campo">
                            <label class="label-form">Telefono</label>
                            <input class="input-form" type="mail" name="" required>
                        </div>
                        <div class="campo">
                            <label class="label-form">Centro de toma de muestra</label>
                            <select class="select-form" id="opciones" name="opciones">
                                <option value="MM">MM</option>
                                <option value="UM">UM</option>
                                <option value="US">US</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="dato-adi">
                    <div class="campo-domicilio">
                        <label class="label-form">Direccion de domicilio</label>
                        <input class="input-form" type="text" name="" required>
                    </div>
                    <div class="contenedor-boton">
                        <div class="boton-form">
                            <input class="boton-enviar" type="submit" value="Registrar examen">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<script>
function controlVisi1() {
    var elemento = document.getElementById('diagnostico');
    var elemento2 = document.getElementById('ingreso');
    elemento.style.display = 'none';
    elemento2.style.display = 'block';
}

function controlVisi2() {
    var elemento = document.getElementById('ingreso');
    var elemento2 = document.getElementById('diagnostico');
    elemento.style.display = 'none';
    elemento2.style.display = 'block';
}
</script>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="../../../../public/js/recepcion.js"></script>

</html>