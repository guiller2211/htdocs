
<head>
    <link rel="stylesheet" href="../../../../public/css/diagnostico.css">
    <title>Interfaz de Diagnosticos Médicos</title>
</head>

<body>
    <div class="mb-5 text-center ">
        <h2>Diagnosticos de Muestra</h2>
    </div>
    <div class="container text-center">
        <div class="row">
            <!--Tamaño del Formulario -->
            <div class="col-md-5 mx-auto">
                <form class="form-diagnostico">
                    <h2 class="mb-5">Filtros de Búsqueda</h2>

                    <div class="col">
                        <label for="idExamen">ID de Examen:</label>
                        <input class="mb-3" type="text" id="idExamen" name="idExamen">
                    </div>
                    <div class="col">
                        <label for="nombrePaciente">Nombre del Paciente:</label>
                        <input class="mb-3" type="text" id="nombrePaciente" name="nombrePaciente">
                    </div>
                    <div class="col">
                        <label for="fechaCreacion">Fecha de Creación:</label>
                        <input class="mb-4" type="date" id="fechaCreacion" name="fechaCreacion">
                    </div>
                    <div class="col">
                        <button class="btn btn-default button-diagnostico " type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="container">
        <h1 class="text-center">Lista de Exámenes Médicos</h1>
        <div class="row">
            <div class="col-12">
                <table>
                    <thead>
                        <tr>
                            <th>N° Examen</th>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Tincíon</th>
                            <th>Observación con Tinción</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $examen): ?>
                    <tr>
                        <td ><?php echo $examen["id"]; ?></td>
                        <td><?php echo $examen["rut"]; ?></td>
                        <td><?php echo $examen["nombre"]; ?></td>
                        <td><?php echo $examen["apPat"]; ?></td>
                        <td><?php echo $examen["apMat"]; ?></td>
                        <td><?php echo $examen["tincion"]; ?></td>
                        <td><?php echo $examen["obstincion"]; ?></td>
                        <td>
                                <div class="row gap-1">
                                    <div class="col">
                                        <a href="#" onclick="openModal(<?= $examen['id'];?>)">Diagnosticar</a>
                                    </div>
                                    <div class="col">
                                        <a href="#" onclick="openMuestrasModal(<?= $examen['id'];?>)">Ver Muestras</a>
                                    </div>
                                </div>
                            </td>

                    </tr>
                <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal para modificar -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Actualizar estado de las muestras</h2>
            <!-- Contenido del formulario para modificar -->
            <form id="modifyForm" class="form-diagnostico">

                <label for="modEstado">Nuevo Estado:</label>
                <select id="modEstado" name="modEstado" required>
                    <option value="A">NEGATIVO</option>
                    <option value="B">MUESTRA INADECUADA, VOLVER A TOMAR</option>
                    <option value="C">LA MUESTRA PRESENTA INFECCIÓN</option>
                    <option value="D">POSIBLE ADENOCARCINOMA</option>
                    <option value="E">CANCER EPIDERMOIDE</option>
                    <option value="F">MUESTRA ATROFICA</option>
                </select>
                <label for="modDescripcion">Observación:</label>
                <textarea type="text" id="modDescripcion" name="modDescripcion" required></textarea>
                <br>
                <button class="button-diagnostico" type="button" onclick="updateExam()">Guardar Cambios</button>
            </form>
        </div>
    </div>
    <div id="muestrasModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeMuestrasModal()">&times;</span>
            <h2>Muestras del Examen</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID de Muestra</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Muestra de Sangre</td>
                        <td>LA MUESTRA PRESENTA INFECCIÓN</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Muestra de Orina</td>
                        <td>NEGATIVO</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Muestra de SALIVA</td>
                        <td>MUESTRA ATROFICA</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // Funciones para mostrar y ocultar el modal
        function openModal(examId) {
            //Cargar la información del examen correspondiente en el modal
            document.getElementById("myModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        // Función para procesar la actualización del examen
        function updateExam() {
            // Aquí puedes agregar lógica para actualizar el examen en la base de datos
            // y cerrar el modal después de la actualización
            closeModal();
        }
        // Cerrar el modal si se hace clic fuera del contenido
        window.onclick = function(event) {
            if (event.target == document.getElementById("myModal")) {
                closeModal();
            }
            if (event.target == document.getElementById("muestrasModal")) {
                closeMuestrasModal();
            }
        };

        // Funciones para mostrar y ocultar el modal de ver muestras

        function openMuestrasModal(examId) {
            // Aquí puedes cargar la información de las muestras correspondientes en el modal de ver muestras
            document.getElementById("muestrasModal").style.display = "flex";
        }

        function closeMuestrasModal() {
            document.getElementById("muestrasModal").style.display = "none";
        }
    </script>
</body>

</html>