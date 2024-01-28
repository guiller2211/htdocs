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
            <button type='submit'  name="ingresar" class="btnBuscar">
                Buscar
            </button>
        </form>
        

</div>
<br>
<br>
<div id="ver-tabla" class="container" style="display:none;">
            <table class="table table-bordered" id="ver-tabla">
        <div class="container">
        <h1 class="text-center">Lista de Exámenes Médicos</h1>
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
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['rut']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['apPat']; ?></td>
                                <td><?php echo $row['apMat']; ?></td>
                                <td><?php echo $row['telefono']; ?></td>
                                <td><?php echo $row['direccion']; ?></td>
                                <td><?php echo $row['mail']; ?></td>
                                <td><?php echo $row['fechaNacimiento']; ?></td>
                                <td><?php echo $row['genero']; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script src="../../../../public/js/usuario.js"></script>