<head>
    <title>Resultados</title>
    <link rel="stylesheet" href="../../../../public/css/user.css">
</head>

<div class="fondo">



    <div class="user-section">
        <form class="form" method="post">
            <img src="../../../../public/img/logo.png" width="200" height="100" alt="">
            <p style="text-align: center;">Mis Resultados</p>
            <div class="input-container">
                <input type="text" name="ruta" placeholder="Ingrese rut" required>
                <span>
                </span>
            </div>
            <div class="input-container">

                <input name="clav" type="password" placeholder="Escribe el número orden" required>
                <input type="hidden" name="sw" value="Verificar">
            </div>
            <button type='submit' onclick="verDiag()" name="ingresar" value="Verificar" style='display: block;padding-top: 0.75rem;padding-bottom:0.75rem;padding-left:1.25rem;padding-right:1.25rem;width: 100%;'>
                Verificar
            </button>
        </form>

    </div>

    <div id="ver-tabla" class="container" style="display:none;">
            <table class="table table-bordered" id="ver-tabla">

                <tr class="fila-cliente">
                <tr>
                    <th class="titulo-columna">RUT</th>
                    <td class="celda">7858755-9</td>
                </tr>
                <tr>
                    <th class="titulo-columna">NOMBRE</th>
                    <td class="celda">Ruth</td>
                </tr>
                <tr>
                    <th class="titulo-columna">AP. PATERNO</th>
                    <td class="celda">Salazar</td>
                </tr>
                <tr>
                    <th class="titulo-columna">AP. MATERNO</th>
                    <td class="celda">Perez</td>
                </tr>
                <tr>
                    <th class="titulo-columna">TELEFONO</th>
                    <td class="celda">+561234567889</td>
                </tr>
                <tr>
                    <th class="titulo-columna">EMAIL</th>
                    <td class="celda">prueba@mail.com</td>
                </tr>
                <tr>
                    <th class="titulo-columna">DOMICILIO</th>
                    <td class="celda">Estacion Central</td>
                </tr>
                <tr>
                    <th class="titulo-columna">PROCEDENCIA</th>
                    <td class="celda">MM</td>
                </tr>
            </table>
            <br>
            <button disabled>Ver Diagnostico</button>
    </div>

</div>
<br>
<br>

<script>
    function verDiag() {
        var elemento = document.getElementById('ver-tabla');
        elemento.style.display = 'block';

    }
</script>