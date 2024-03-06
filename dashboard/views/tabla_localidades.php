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
            Localidades
        </div>
        <br>
        <div class="card-body card-block">
            <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite"></div>
            <table id="deliveryTable" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>Localización</th>
                        <th>Precio Km</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="deliveryBody">
                    <!-- Los datos de la tabla se llenarán aquí dinámicamente con JavaScript -->
                </tbody>
            </table>
            <script>
            // Realizar la solicitud HTTP a la API
            const requestOptions = {
                method: "GET",
                redirect: "follow"
            };

            fetch("<?php echo $urlApi;?>/api/delivery", requestOptions)
                .then(response => response.json())
                .then(result => {
                    // Obtener la referencia de la tabla y su cuerpo
                    const table = document.getElementById("deliveryTable");
                    const tbody = document.getElementById("deliveryBody");

                    // Limpiar la tabla antes de agregar nuevos datos
                    tbody.innerHTML = "";

                    // Iterar sobre los resultados y agregar filas a la tabla
                    result.forEach(row => {
                        const newRow = `
                                <tr>
                                    <td>${row.location}</td>
                                    <td>${row.px_km}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a class="btn btn-primary" title="Ver Detalle" href="#" type="button" data-toggle="modal"
                                        data-target="#ver${row.id}"><i class="fa fa-eye"></i></a>
                                        <!-- Modal ver Delivery -->
                                        <div class="modal fade" id="ver${row.id}" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">
                                                            Detalles del Delivery</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Ubicación:
                                                                            </strong> <br>${row.location}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Precio:
                                                                            </strong> <br>$${row.px_km}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Kilometro:
                                                                            </strong> <br>${row.km_to_zero}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Final Modal ver Delivery -->
                                        <a class="btn btn-secondary" title="Editar" href="#" type="button" data-toggle="modal"
                                            data-target="#editar${row.id}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" title="Eliminar"
                                            href="../actions/delete_localidad.php?id=${row.id}" type="button"><i
                                                class="fa fa-trash"></i></a>

                                                <!--Modal editar Delivery-->
                                                    <div class="modal fade" id="editar${row.id}" tabindex="-1" role="dialog"
                                                        aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar
                                                                        Delivery</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                        <form action="../actions/editar_localidad.php?id=${row.id}" method="POST" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-sm-5 mx-auto">
                                                                                    <div class="form-group">
                                                                                        <label for="" class="form-control-label">Datos del Delivery:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-bars"></i>
                                                                                            </div>
                                                                                            <input type="text" name="location" class="form-control" value="${row.location}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Precio:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-comment-o"></i>
                                                                                            </div>
                                                                                            <input type="number" name="px_km" class="form-control" value="${row.px_km}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Kilometro:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-comment-o"></i>
                                                                                            </div>
                                                                                            <input type="number" name="km_to_zero" class="form-control" value="${row.km_to_zero}" required>
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
                                                    <!--Modal editar Codigo-->
                                    </td>
                                </tr>
                            `;
                        tbody.innerHTML += newRow;
                    });

                })
                .catch(error => console.error(error));
            </script>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-sm-1 mx-auto"></div>
            <div class="col-sm-3 mx-auto">
                <form action="../report/report_localidades.php" method="POST">
                    <button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-primary">
                            <i class="fa fa-download"></i> Listado</button>
                </form>
            </div>
            <div class="col-sm-4 mx-auto">
                <a class="btn btn-success" href="#" type="button" data-toggle="modal" data-target="#agregar_localidad"><i
                    class="fa fa-hand-o-right"></i> Localidad</a>
            </div>
            <div class="col-sm-3 mx-auto">
                <a class="btn btn-warning" href="#" type="button" data-toggle="modal" data-target="#aumentar_precio_km"><i
                class="fa fa-hand-o-right"></i> %Precio Km</a>
            </div>
            <div class="col-sm-1 mx-auto"></div>
        </div>
        

        <div class="modal fade" id="agregar_localidad" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Agregar
                            Localidad</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="../actions/agregar_localidad.php" method="POST">
                                    <div class="row">
                                        <div class="col-sm-5 mx-auto">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Localidad:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-bars"></i>
                                                    </div>
                                                    <input type="text" name="location" class="form-control"
                                                        placeholder="Departamento - Distrito" required>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Kilometros:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-bars"></i>
                                                    </div>
                                                    <input type="number" name="km_to_zero" class="form-control"
                                                        placeholder="10" required>
                                                </div>
                                                <br>
                                                <label for="" class="form-control-label">Precio:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-bars"></i>
                                                    </div>
                                                    <input type="number" name="px_km" class="form-control"
                                                        placeholder="1800" required>
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

    <!--Modal %preciokm-->
    <div class="modal fade" id="aumentar_precio_km" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Aumento porcentual del precio Km</h4>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="../actions/porcentaje_km.php" method="POST">
                                    <div class="row">
                                        <div class="col-sm-5 mx-auto">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Porcentaje:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-bars"></i>
                                                    </div>
                                                    <input type="number" name="porcentaje" class="form-control"
                                                        placeholder="10" required>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 mx-auto" style="text-align: center;">
                                            <button type="submit" name="ajustar" id="ajustar"
                                                class="btn btn-primary">Ajustar</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Final Modal %preciokm-->




</div>
</div>
<br>


<?php include('../fijos/footer.php');?>