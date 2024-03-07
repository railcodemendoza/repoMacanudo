<?php include('../db.php'); ?>
<?php include ("../../variables.php");?>
<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>
<br>
<div class="container-fluid">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Detalles de Precios de picadas
        </div>
        <div class="card-body card-block">
            <div class="responsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
            </div>
            <table id="picadasTable" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>Tipo</th>
                        <th>Precio</th>
                        <th>Activo</th>
                        <th>Picada Especial</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="picadasBody">
                    <!-- Los datos de la tabla se llenarán aquí dinámicamente con JavaScript -->
                </tbody>
            </table>

            <script>
            // Realizar la solicitud HTTP a la API
            const requestOptions = {
                method: "GET",
                redirect: "follow"
            };

            fetch("<?php echo $urlApi;?>/api/tipoPicada", requestOptions)
                .then(response => response.json())
                .then(result => {
                    // Obtener la referencia de la tabla y su cuerpo
                    const table = document.getElementById("picadasTable");
                    const tbody = document.getElementById("picadasBody");

                    // Limpiar la tabla antes de agregar nuevos datos
                    tbody.innerHTML = "";

                    // Iterar sobre los resultados y agregar filas a la tabla
                    result.forEach(row => {
                        const newRow = `
                                <tr>
                                    <td>${row.tipo}</td>
                                    <td>${row.in_ars}</td>
                                    <td>${row.activo ? 'Sí' : 'No'}</td>
                                    <td>${row.picada_especial ? 'Sí' : 'No'}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a class="btn btn-primary" title="Ver Detalle" href="#" type="button" data-toggle="modal"
                                        data-target="#ver${row.id}"><i class="fa fa-eye"></i></a>
                                        <!-- Modal ver picada -->
                                        <div class="modal fade" id="ver${row.id}" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">
                                                            Detalles de la Picada.</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Título:
                                                                            </strong> <br>${row.tipo}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Descripción:
                                                                            </strong> <br>${row.description}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <!-- Mostrar tipos de tablas asociadas -->
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Tipos de tablas:</strong></h4>
                                                                        <ul class="no-bullets"  style="text-align:center;">
                                                                            ${row.tipo_tablas.map(tipoTabla => `
                                                                                <li>${tipoTabla.tipo}</li>
                                                                            `).join('')}
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"> <strong> Precio de Picada:
                                                                            </strong><br>$${row.in_ars} </h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"> <strong> Costo de Picada: </strong><br>$${row.out_ars}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"> <strong> Precio por persona: </strong><br>
                                                                        $${row.valor_por_persona} </h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Costo por persona:
                                                                            </strong> <br>$${row.costo_por_persona}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Activo:
                                                                            </strong> <br>${row.activo ? 'Sí' : 'No'}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Picada especial:
                                                                            </strong> <br>${row.picada_especial ? 'Sí' : 'No'}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Título especial:
                                                                            </strong> <br>${row.title_especial  ? row.title_especial : '-------'}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Comentario especial:
                                                                            </strong> <br>${row.comentario_especial? row.comentario_especial : '-------'}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Imagen:
                                                                            </strong></h4>
                                                                        <img src="<?php echo $urlApi;?>/storage/picadas/${row.imagen}" alt="Imagen de la picada" style="max-width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <!-- Agregar más detalles según sea necesario -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Final Modal ver tipo picada -->
                                        <a class="btn btn-secondary" title="Editar" href="#" type="button" data-toggle="modal"
                                            data-target="#editar${row.id}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" title="Eliminar"
                                            href="../actions/delete_tipo_picadas.php?id=${row.id}" type="button"><i
                                                class="fa fa-trash"></i></a>

                                                <!--Modal editar tipo picada-->
                                                    <div class="modal fade" id="editar${row.id}" tabindex="-1" role="dialog"
                                                        aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar
                                                                        Picada</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                        <form action="../actions/editar_tipo_picadas.php?id=${row.id}" method="POST" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-sm-5 mx-auto">
                                                                                    <div class="form-group">
                                                                                        <label for="" class="form-control-label">Datos del Tipo de Picada:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-bars"></i>
                                                                                            </div>
                                                                                            <input type="text" name="tipo" class="form-control" value="${row.tipo}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Descripción:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-comment-o"></i>
                                                                                            </div>
                                                                                            <input type="text" name="description" class="form-control" value="${row.description}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Imagen:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-image"></i>
                                                                                            </div>
                                                                                            <input type="file" name="imagen" class="form-control" >
                                                                                            
                                                                                        </div>
                                                                                        <br>
                                                                                        <img src="<?php echo $urlApi;?>/storage/picadas/${row.imagen}" class="d-block w-100" alt="...">
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Activo:</label>
                                                                                        <div class="input-group">
                                                                                            <label class="checkbox-inline">
                                                                                                <input type="checkbox" name="activo" value="1" ${row.activo == 1 ? 'checked' : ''}> Sí
                                                                                            </label>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Tipos de Tabla:</label>
                                                                                        <div id="tipoTablaContainer${row.id}" class="checkbox-group"></div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Precio en ARS:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-dollar"></i>
                                                                                            </div>
                                                                                            <input type="number" name="in_ars" class="form-control" value="${row.in_ars}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Costo en ARS:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-dollar"></i>
                                                                                            </div>
                                                                                            <input type="number" name="out_ars" class="form-control" value="${row.out_ars}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Valor por Persona:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-dollar"></i>
                                                                                            </div>
                                                                                            <input type="number" name="valor_por_persona" class="form-control"
                                                                                                placeholder="Valor por Persona" value="${row.valor_por_persona}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Costo por Persona:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-dollar"></i>
                                                                                            </div>
                                                                                            <input type="number" name="costo_por_persona" class="form-control"
                                                                                                placeholder="Costo por Persona" value="${row.costo_por_persona}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Picada Especial:</label>
                                                                                        <div class="input-group">
                                                                                            <label class="checkbox-inline">
                                                                                                <input type="checkbox" name="picada_especial" value="1" ${row.picada_especial == 1 ? 'checked' : ''}> Sí
                                                                                            </label>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Título Especial:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-font"></i>
                                                                                            </div>
                                                                                            <input type="text" name="title_especial" class="form-control"
                                                                                                placeholder="Título Especial" value="${row.title_especial}">
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Comentario Especial:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-comments"></i>
                                                                                            </div>
                                                                                            <textarea name="comentario_especial" class="form-control"
                                                                                                placeholder="Comentario Especial">${row.comentario_especial}</textarea>
                                                                                        </div>
                                                                                        <br>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 mx-auto" style="text-align: center;">
                                                                                    <button type="submit" name="editar" id="editar" class="btn btn-primary">Cambiar</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Modal editar tipo picada-->
                                    </td>
                                </tr>
                            `;
                        tbody.innerHTML += newRow;
                         // Ahora, ejecuta el script para generar checkboxes fuera del bucle
                    generateCheckboxesForRows(row);
                    });
                   
                })
                .catch(error => console.error(error));
             // Función para generar checkboxes dentro del script
    function generateCheckboxesForRows(row) {
        fetch("<?php echo $urlApi;?>/api/tipoTabla") // Reemplaza con la URL correcta de tu API
            .then(response => response.json())
            .then(data => {
                // Manipula los datos de la respuesta
                if (Array.isArray(data)) {
                    // Genera las opciones en el contenedor
                    var tipoTablaContainer = document.getElementById('tipoTablaContainer' + row.id);
                    data.forEach(tipoTabla => {
                        var checkbox = document.createElement('div');
                        checkbox.className = 'checkbox';
                        checkbox.innerHTML = `
                        <input type="checkbox" name="tipo_tabla_ids[]" value="${tipoTabla.id}" ${row.tipo_tablas && row.tipo_tablas.some(tipoTablaAssoc => tipoTablaAssoc.id === tipoTabla.id) ? 'checked' : ''}>
                            <label for="tipoTabla${tipoTabla.id}">${tipoTabla.tipo}</label>
                        `;
                        tipoTablaContainer.appendChild(checkbox);
                    });
                } else {
                    console.error('La respuesta de la API no es un array.');
                }
            })
            .catch(error => {
                console.error('Error al obtener los tipos de tablas desde la API:', error);
            });
    }
            </script>
        </div>
        <form action="../report/report_tipo_picadas.php" method="POST">
            <div class="row" style="text-align: center;">
                <div class="col-sm-4 mx-auto">
                    <button type="submit" id="export_data" name="export_data" value="Export to excel"
                        class="btn btn-primary"> <i class="fa fa-download"></i> Listado</button>
        </form>
        <a class="btn btn-success" href="#" type="button" data-toggle="modal" data-target="#agregar"><i
                class="fa fa-hand-o-right"></i> Picada</a>

        <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Agregar Picada</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="../actions/agregar_tipo_picada.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-5 mx-auto">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Datos del Tipo de
                                                    Picada:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-bars"></i>
                                                    </div>
                                                    <input type="text" name="tipo" class="form-control"
                                                        placeholder="Nombre del Tipo de Picada" required>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Descripción:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-comment-o"></i>
                                                    </div>
                                                    <input type="text" name="description" class="form-control"
                                                        placeholder="Descripcion de tipo Picada" required>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Imagen:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-image"></i>
                                                    </div>
                                                    <input type="file" name="imagen" class="form-control"
                                                        placeholder="Archivo de imagen" required>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Activo:</label>
                                                <div class="input-group">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="activo" value="1" checked> Sí
                                                    </label>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Tipos de Tabla:</label>
                                                <div id="tipoTablaContainer" class="checkbox-group">
                                                    <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        // Realiza la solicitud a la API para obtener los tipos de tablas
                                                        fetch(
                                                            "<?php echo $urlApi;?>/api/tipoTabla") // Reemplaza con la URL correcta de tu API
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                // Manipula los datos de la respuesta
                                                                if (Array.isArray(data)) {
                                                                    // Genera las opciones en el contenedor
                                                                    var tipoTablaContainer = document
                                                                        .getElementById(
                                                                            'tipoTablaContainer');
                                                                    data.forEach(tipoTabla => {
                                                                        var checkbox = document
                                                                            .createElement('div');
                                                                        checkbox.className =
                                                                            'checkbox';
                                                                        checkbox.innerHTML = `
                                                                            <input type="checkbox" name="tipo_tabla_ids[]" value="${tipoTabla.id}">
                                                                            <label for="tipoTabla${tipoTabla.id}">${tipoTabla.tipo}</label>
                                                                        `;
                                                                        tipoTablaContainer
                                                                            .appendChild(checkbox);
                                                                    });
                                                                } else {
                                                                    console.error(
                                                                        'La respuesta de la API no es un array.'
                                                                        );
                                                                }
                                                            })
                                                            .catch(error => {
                                                                console.error(
                                                                    'Error al obtener los tipos de tablas desde la API:',
                                                                    error);
                                                            });
                                                    });
                                                    </script>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Precio en ARS:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-dollar"></i>
                                                    </div>
                                                    <input type="number" name="in_ars" class="form-control"
                                                        placeholder="Precio en ARS" required>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Cost en ARS:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-dollar"></i>
                                                    </div>
                                                    <input type="number" name="out_ars" class="form-control"
                                                        placeholder="Precio en ARS" required>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Valor por Persona:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-dollar"></i>
                                                    </div>
                                                    <input type="number" name="valor_por_persona" class="form-control"
                                                        placeholder="Valor por Persona" required>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Costo por Persona:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-dollar"></i>
                                                    </div>
                                                    <input type="number" name="costo_por_persona" class="form-control"
                                                        placeholder="Costo por Persona" required>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Picada Especial:</label>
                                                <div class="input-group">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="picada_especial" value="1"> Sí
                                                    </label>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Título Especial:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-font"></i>
                                                    </div>
                                                    <input type="text" name="title_especial" class="form-control"
                                                        placeholder="Título Especial">
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Comentario Especial:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-comments"></i>
                                                    </div>
                                                    <textarea name="comentario_especial" class="form-control"
                                                        placeholder="Comentario Especial"></textarea>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mx-auto" style="text-align: center;">
                                            <button type="submit" name="agregar" id="agregar"
                                                class="btn btn-primary">Agregar</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Final Modal View CNTR-->
    <br>
</div>
</div>
<br>
</div>

<?php include('../fijos/footer.php');?>