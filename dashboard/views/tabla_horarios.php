<?php include('../db.php'); ?>
<?php include ("../../variables.php");?>
<?php include('../fijos/header.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php

    
?>

<br>
<div class="container-fluid">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Horarios
        </div>
        <br>
        <div class="card-body card-block">
            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="horarioTable" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>Horario</th>
                        <th>Delivery</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="horarioBody">
                    <!-- Los datos de los horarios se llenarán aquí dinámicamente con JavaScript -->
                </tbody>
            </table>
            <script>
            // Realizar la solicitud HTTP a la API
            const requestOptions = {
                method: "GET",
                redirect: "follow"
            };

            fetch("<?php echo $urlApi;?>/api/deliveryHora", requestOptions)
                .then(response => response.json())
                .then(result => {
                    // Obtener la referencia de la tabla y su cuerpo
                    const table = document.getElementById("horarioTable");
                    const tbody = document.getElementById("horarioBody");

                    // Limpiar la tabla antes de agregar nuevos datos
                    tbody.innerHTML = "";

                    // Iterar sobre los resultados y agregar filas a la tabla
                    result.forEach(row => {
                        const newRow = `
                                <tr>
                                    <td>${row.horario}</td>
                                    <td>${row.delivery}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a class="btn btn-primary" title="Ver Detalle" href="#" type="button" data-toggle="modal"
                                        data-target="#ver${row.id}"><i class="fa fa-eye"></i></a>
                                        <!-- Modal ver Horario -->
                                        <div class="modal fade" id="ver${row.id}" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">
                                                            Detalles del Horario</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Horario:
                                                                            </strong> <br>${row.horario}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Delivery:
                                                                            </strong> <br>${row.delivery}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Final Modal ver Horario -->
                                        <a class="btn btn-secondary" title="Editar" href="#" type="button" data-toggle="modal"
                                            data-target="#editar${row.id}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" title="Eliminar"
                                            href="../actions/delete_horario.php?id=${row.id}" type="button"><i
                                                class="fa fa-trash"></i></a>

                                                <!--Modal editar Horario-->
                                                    <div class="modal fade" id="editar${row.id}" tabindex="-1" role="dialog"
                                                        aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar
                                                                        Horario</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                        <form action="../actions/editar_horario.php?id=${row.id}" method="POST" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-sm-5 mx-auto">
                                                                                    <div class="form-group">
                                                                                        <label for="" class="form-control-label">Datos del Horario:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-bars"></i>
                                                                                            </div>
                                                                                            <input type="text" name="horario" class="form-control" value="${row.horario}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Delivery:</label>
                                                                                        <div class="input-group">
                                                                                                <div class="input-group-addon">
                                                                                                    <i class="fa fa-comment-o"></i>
                                                                                                </div>
                                                                                                <select name="delivery" class="form-control" required>
                                                                                                    <option value="con_retiro" ${row.delivery === 'con_retiro' ? 'selected' : ''}>Con Retiro</option>
                                                                                                    <option value="con_envio" ${row.delivery === 'con_envio' ? 'selected' : ''}>Con Envío</option>
                                                                                                </select>
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
                                                    <!--Modal editar Horario-->
                                    </td>
                                </tr>
                            `;
                        tbody.innerHTML += newRow;
                    });

                })
                .catch(error => console.error(error));
            </script>
        </div>

        <a class="btn btn-success" href="#" type="button" data-toggle="modal" data-target="#agregar_horario"><i
                class="fa fa-hand-o-right"></i> Horario</a>


        <div class="modal fade" id="agregar_horario" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Agregar
                            Horario</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="../actions/agregar_horario.php" method="POST">
                                    <div class="row">
                                        <div class="col-sm-5 mx-auto">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Horario:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-bars"></i>
                                                    </div>
                                                    <input type="text" name="horario" class="form-control"
                                                        placeholder="14:00 - 18:00" required>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Delivery:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-bars"></i>
                                                    </div>
                                                    <select name="delivery" class="form-control" required>
                                                        <option value="con_retiro">Con Retiro</option>
                                                        <option value="con_envio">Con Envío</option>
                                                    </select>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Final Modal View CNTR-->
</div>
</div>
<br>


<?php include('../fijos/footer.php');?>