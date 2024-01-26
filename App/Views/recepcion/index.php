
<head>
    <link rel="stylesheet" href="../../../../public/css/recepcion.css">
    <title>Recepci&oacute;n</title>
</head>
    <div class="contenedor-principal">
        <h2 class="titulo-recep">Recepcion y Digitacion</h2>
        <nav class="nav-ok">
            <a class="enlace-nav" href="#" onclick="controlVisi1()">REGISTRAR EXAMEN</a>
            <a class="enlace-nav" href="#" onclick="controlVisi2()">ENTREGAR RESULTADOS</a>
        </nav>
        <div id="diagnostico" class="ver-resultados" style="display:none">
            <form class="formulario"action="">
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
            <form class="formulario"action="">
                <input class="input-form" type="hidden" name="" required>
                <div class="contenedor-boton">
                    <div class="boton-form">
                        <input  class="boton-enviar" type="submit" value="Listar Diagnosticos disponibles">
                    </div>
                </div>
            </form>
        </div>
        <div id="ingreso"class="ver-ingreso">
            <form class="formulario"action="#">
            <h3>Registro de examen</h3>
                <div class="contenedor-divi">
                    <div class="izquierda">
                        <div class="campo">
                            <label class="label-form">Fecha</label>
                            <input class="input-form" class="element-especial"type="date" name="" required>
                        </div>
                        <div class="campo">
                            <label class="label-form">Nombre</label>
                            <input  class="input-form" type="text" name="" required>
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
    <script>
        function controlVisi1(){
            var elemento = document.getElementById('diagnostico');
            var elemento2= document.getElementById('ingreso');
            elemento.style.display='none';
            elemento2.style.display='block';
        }
        function controlVisi2(){
            var elemento=document.getElementById('ingreso');
            var elemento2= document.getElementById('diagnostico');
            elemento.style.display='none';
            elemento2.style.display='block';
        }
    </script>
</html>