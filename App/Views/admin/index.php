<head>
    <link rel="stylesheet" href="../../../../public/css/admin.css">
    <title>Administrador</title>
</head>

<div class="formContainer">
    <div class="formulario" id="imgPrincipal">
        <img src="../../../public/img/admin.png" alt="imagen" class="imgPrincipal" />
        <h3>Bienvenido al panel Administrador</h3>
        <hr />
        <p>Puede accerder a las acciones desde el menu superior</p>
    </div>

</div>

<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="formularioUsuarios"> <!-- inicio formulario-->
        <img src="../../../public/img/user.png" alt="imagen" />
        <h1>Registro de usuario</h1>
        <form method="post" action="# ">
            <div class="username">
                <input type="text" required placeholder="Nombre" name="nombre" />
            </div>
            <div class="username">
                <input type="text" required placeholder="usuario" name="usuario" />
            </div>

            <div class="username">
                <input type="text" required placeholder="clave" name="clave" />
            </div>

            <div class="username">
                <input type="text" required placeholder="procedencia" name="procedencia" />
            </div>

            <div class="username">
                <input type="text" required placeholder="nivel" name="nivel" />
            </div>

            <input class="registrar" type="submit" value="Registrar" />
        </form>
    </div> <!-- Fin formulario -->
</div> <!-- Fin div formContainer -->

<!-- *********************************************************** -->

<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="formularioCentroMedico"> <!-- inicio formulario-->
        <img src="../../../public/img/hospital.png" alt="imagen" />
        <h1>Registro centro medico</h1>

        <form method="post" action="# ">
            <div class="username">
                <input type="text" required placeholder="Nombre del centro médico" name="nombre" />
            </div>
            <div class="username">
                <input type="text" required placeholder="Codigo del centro médico" name="codigo" />
            </div>
            <input class="registrar" type="submit" value="Registrar" />
        </form>
    </div> <!-- Fin formulario -->
</div> <!-- Fin div formContainer -->

<!-- *********************************************************** -->
<div class="formContainer"> <!-- inicio formContainer -->
    <div class="Optionconsultas formulario" id="verOpciones" style="display: none;">
        <a onclick="mostrarFormulario('frecuenciaFecha')" href="#">
            <img src="../../../public/img/blood-sample.png">
            <h3> Frecuencia por fecha</h3>
        </a>

        <a onclick="mostrarFormulario('frecuenciaCentroMedico')" href="#">
            <img src="../../../public/img/test.png">
            <h3> Frecuencia por centro médico</h3>
        </a>
    </div>
</div>

<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="frecuenciaFecha"> <!-- inicio formulario-->
        <img src="../../../public/img/chart.png" alt="imagen" />
        <h1>Consultar frecuencia</h1>

        <form method="post" action="# ">
            <div class="username">
                <input type="date" required name="date_1" />
            </div>
            <div class="username">
                <input type="date" required name="date_2" />
            </div>
            <input class="registrar" type="submit" value="Buscar Registros" />
            <a href="#">Exportar registros a Excel</a>
        </form>
    </div> <!-- Fin formulario -->
</div> <!-- Fin div formContainer -->
<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="frecuenciaCentroMedico"> <!-- inicio formulario-->
        <img src="../../../public/img/chart.png" alt="imagen" />
        <h1>Consultar frecuencia Centro de toma de muestra</h1>

        <form method="post" action="# ">
            <div class="username">
                <input type="text" required name="date_1" placeholder="Nombre de centro medico" />
            </div>

            <input class="registrar" type="submit" value="Buscar Registros" />
            <a href="#">Exportar registros a Excel</a>
        </form>
    </div> <!-- Fin formulario -->
</div> <!-- Fin div formContainer -->

</html>