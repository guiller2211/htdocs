<head>
    <link rel="stylesheet" href="/ipleones/labMuest/public/css/admin.css">
    <title>Administrador</title>
</head>

<div class="formContainer">
    <div class="formulario" id="imgPrincipal">
        <img src="/ipleones/labMuest/public/img/admin.png" alt="imagen" class="imgPrincipal" />
        <h3>Bienvenido al panel Administrador</h3>
        <hr />
        <p>Puede accerder a las acciones desde el menu superior</p>
    </div>

</div>
<!--FORMULARIO REGISTRO -->

<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="formularioUsuarios"> <!-- inicio formulario-->
        <img src="/ipleones/labMuest/public/img/user.png" alt="imagen" />
        <h1>Registro de usuario</h1>
        <form method="POST" id="formRegistro">
            <div class="username">
                <input type="text" required placeholder="Rut" id="rut" />
            </div>
            <div class="username">
                <input type="text" required placeholder="nombre" id="nombre" />
            </div>

            <div class="username">
                <input type="text" required placeholder="Apellido paterno" id="apPat" />
            </div>

            <div class="username">
                <input type="text" required placeholder="Apellido materno" id="apMat" />
            </div>

            <div class="username">
                <select type="text" required class="form-select form-select-lg mb-3" id="procedencia" >
                </select>
            </div>

            <div class="username">
                <input type="text" required placeholder="Mail" id="mail" />
            </div>
            <div class="username">
                <input type="number" min="1" max="5"  required placeholder="Nivel" id="nivel" />
            </div>

            <input class="registrar" type="submit" value="Registrar" />
            <li class="li"><a class="enlace" onclick="mostrarFormulario('formularioActualizarUsuarios')">Actualizar datos</a></li>
            <li class="li"><a class="enlace" onclick="mostrarFormulario('formularioEliminarUsuarios')">Eliminar registro</a></li>
        </form>
    </div> <!-- Fin formulario -->
</div> <!-- Fin div formContainer -->

<!-- FORMULARIO REGISTRO-->

<!-- FORMULARIO ACTUALIIZAR USUARIOS -->

<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="formularioActualizarUsuarios"> <!-- inicio formulario-->
        <img src="/ipleones/labMuest/public/img/user.png" alt="imagen" />
        <h1>Actualizar Datos</h1>
        <form method="POST" id="formActualizar">
            <div class="username">
                <select type="text" required class="form-select form-select-lg mb-3" id="rut_actualizar" >
                </select>
            </div>
            <div class="username">
                <input type="text" required placeholder="nombre" id="nombre_actualizar" />
            </div>

            <div class="username">
                <input type="text" required placeholder="Apellido paterno" id="apPat_actualizar" />
            </div>

            <div class="username">
                <input type="text" required placeholder="Apellido materno" id="apMat_actualizar" />
            </div>

            <div class="username">
                <select type="text" required class="form-select form-select-lg mb-3" id="procedencia_actualizar" >
                </select>
            </div>

            <div class="username">
                <input type="text" required placeholder="Mail" id="mail_actualizar" />
            </div>

            <div class="username">
                <input type="number" min="1" max="5" required placeholder="Nivel" id="nivel_actualizar" />
            </div>

            <input class="registrar" type="submit" value="Actualizar" />
        </form>
    </div> <!-- Fin formulario -->
</div> <!-- Fin div formContainer -->

<!-- FORMULARIO ELIMINAR USUARIOS -->

<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="formularioEliminarUsuarios"> <!-- inicio formulario-->
        <img src="/ipleones/labMuest/public/img/user.png" alt="imagen" />
        <h1>Eliminar registro</h1>
        <form method="POST" id="formEliminar">
            <div class="username">
                <input type="text" required placeholder="Rut a eliminar" id="rut_eliminar" />
            </div>
            <input class="registrar" type="submit" value="Eliminar" />
        </form>
    </div> <!-- Fin formulario -->
</div> <!-- Fin div formContainer -->

<!-- REGISTRO CENTRO MEDICOS -->

<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="formularioCentroMedico"> <!-- inicio formulario-->
        <img src="/ipleones/labMuest/public/img/hospital.png" alt="imagen" />
        <h1>Registro centro medico</h1>

        <form method="post" id="registroCentro">
            <div class="username">
                <input type="text" required placeholder="Codigo del centro médico" id="codigoCentro" />
            </div>
            <div class="username">
                <input type="text" required placeholder="Nombre del centro médico" id="nombreCentro" />
            </div>
            <input class="registrar" type="submit" value="Registrar" />
        </form>
        <li class="li"><a class="enlace" onclick="mostrarFormulario('formularioActualizarCentros')">Actualizar datos</a></li>
        <li class="li"><a class="enlace" onclick="mostrarFormulario('formularioEliminarCentros')">Eliminar registro</a></li>
    </div> <!-- Fin formulario -->
</div> <!-- Fin div formContainer -->

<!-- FORMULARIO ACTUALIZAR CENTROS-->

<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="formularioActualizarCentros"> <!-- inicio formulario-->
        <img src="/ipleones/labMuest/public/img/hospital.png" alt="imagen" />
        <h1>Actualizar centro medico</h1>

        <form method="post" id="formActualizarCentro">
            <div class="username">
                <select type="text" required class="form-select form-select-lg mb-3" id="codigo_actualizar" >
                </select>
            </div>
            <div class="username">
                <input type="text" required placeholder="Nombre del centro médico" id="nombre_actualizarCentro" />
            </div>
            <input class="registrar" type="submit" value="Actualizar" />
        </form>
    </div> <!-- Fin formulario -->
</div> <!-- Fin div formContainer -->

<!-- FORMULARIO ELIMINAR CENTROS-->
<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="formularioEliminarCentros"> <!-- inicio formulario-->
        <img src="/ipleones/labMuest/public/img/hospital.png" alt="imagen" />
        <h1>Eliminar centro medico</h1>

        <form method="post" id="formEliminarCentro">
            <div class="username">
                <input type="text" required placeholder="Codigo del centro médico" id="codigo_eliminar" />
            </div>
            <input class="registrar" type="submit" value="Eliminar" />
        </form>
    </div> <!-- Fin formulario -->
</div> <!-- Fin div formContainer -->

<!-- *********************************************************** -->
<div class="formContainer"> <!-- inicio formContainer -->
    <div class="Optionconsultas formulario" id="verOpciones" style="display: none;">
        <a onclick="mostrarFormulario('frecuenciaFecha')" href="#">
            <img src="/ipleones/labMuest/public/img/blood-sample.png">
            <h3> Frecuencia por fecha</h3>
        </a>

        <a onclick="mostrarFormulario('frecuenciaCentroMedico')" href="#">
            <img src="/ipleones/labMuest/public/img/test.png">
            <h3> Frecuencia por centro médico</h3>
        </a>
    </div>
</div>
<!-- FORMULARIO PARA FRECUENCIAS --> 

<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="frecuenciaFecha"> <!-- inicio formulario-->
        <img src="/ipleones/labMuest/public/img/chart.png" alt="imagen" />
        <h1>Consultar frecuencia</h1>

        <form method="post" id="formBusqueda">
            <div class="username">
                <input type="date" required id="fechaInicio" />
            </div>
            <div class="username">
                <input type="date" required id="fechaFin" />
            </div>
            <input class="registrar" type="submit" value="Buscar Registros" />
        </form>
        <input type="button" value="Exportar a Excel" id="exportarAExcel">
    </div> <!-- Fin formulario -->
</div> <!-- Fin div formContainer -->


<div class="formContainer"> <!-- inicio formContainer -->
    <div class="formulario" style="display: none;" id="frecuenciaCentroMedico"> <!-- inicio formulario-->
        <img src="/ipleones/labMuest/public/img/chart.png" alt="imagen" />
        <h1>Consultar frecuencia Centro de toma de muestra</h1>

        <form method="post" id="formFrecuencia">
                <select type="text" required class="form-select form-select-lg mb-3" id="codigo_busqueda" >
                </select>
            <input class="registrar" type="submit" value="Buscar Registros" />
        </form>
        <input type="button" value="Exportar a Excel" id="exportarAExcel2">
    </div> <!-- Fin formulario -->

</div> <!-- Fin div formContainer -->

<div id="resultadoBusqueda" style="display: none; text-align: center ">
<h1 id="CountFrecuencia" style="margin: 0;"></h1>
    <!-- Aquí se mostrarán los resultados de la búsqueda -->
    
</div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="/ipleones/labMuest/public/js/admin.js"></script>