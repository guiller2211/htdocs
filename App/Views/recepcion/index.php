<head>
    <link rel="stylesheet" href="../../../../public/css/recepcion.css">
    <title>Recepci&oacute;n</title>
</head>
<div class="contenedor-principal">
    <h2 class="titulo-recep">Recepcion y Digitacion</h2>
    <nav class="nav-ok">
        <a class="enlace-nav" href="#" onclick="controlVisi1()">REGISTRAR EXAMEN</a>
        <a class="enlace-nav" href="#" onclick="controlVisi2()">ENTREGAR RESULTADOS</a>
        <a class="enlace-nav" href="#" onclick="controlVisi3()">REGISTRAR PACIENTE</a>
    </nav>
    <div id="diagnostico" class="ver-resultados" style="display:none">
        <form class="formulario" action="Views/recepcion/index.php">
            <div class="campo">
                <label class="label-form">Rut de Paciente</label>
                <input class="input-form" type="text" name="" required>
            </div>
            <div class="contenedor-boton">
                <div class="boton-form">
                    <input class="boton-enviar" type="submit" value="Buscar Diagnostico">
                </div>
            </div>
        </form>
        <form class="formulario" action="">
            <input class="input-form" type="hidden" name="" required>
            <div class="contenedor-boton">
                <div class="boton-form">
                    <input class="boton-enviar" type="submit" value="Listar Diagnosticos disponibles">
                </div>
            </div>
        </form>
    </div>
    <!--REGISTRO EXAMEN-->
    <div id="ingreso" class="ver-ingreso">
        <?php include("complementos/registroExamen.php"); ?>
    </div>

    <!--INGRESAR PACIENTE-->
    <div id="ingresarPaciente" class="ver-ingresos formulario" style="display:none">
        <?php include("complementos/ingresarUsuario.php"); ?>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="../../../../public/js/recepcion.js"></script>
<script src="../../../../public/js/recepcion.js/controlVisi1"></script>
<script src="../../../../public/js/recepcion.js/controlVisi2"></script>
<script src="../../../../public/js/recepcion.js/controlVisi3"></script>

</html>