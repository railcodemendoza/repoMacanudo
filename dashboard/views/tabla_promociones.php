<?php include('../db.php'); ?>
<?php include ("../../variables.php");?>
<?php include('../fijos/header.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>
<br>
<div class="container-fluid">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Promociones
        </div>
        <div class="card-body card-block">
            <div class="responsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
            </div>
            <table id="codigosTable" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>Titulo</th>
                        <th>Descuento</th>
                        <th>Activo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="codigosBody">
                     <!-- Los datos de los agregados se llenarán aquí dinámicamente con JavaScript -->
                </tbody>
             </table>
             <script>
             // Realizar la solicitud HTTP a la API
             const requestOptions = {
                 method: "GET",
                 redirect: "follow"
             };

             fetch("<?php echo $urlApi;?>/api/codigoPromocion", requestOptions)
                 .then(response => response.json())
                 .then(result => {
                     // Obtener la referencia de la tabla y su cuerpo
                     const table = document.getElementById("codigosTable");
                     const tbody = document.getElementById("codigosBody");

                     // Limpiar la tabla antes de agregar nuevos datos
                     tbody.innerHTML = "";

                     // Iterar sobre los resultados y agregar filas a la tabla
                     result.forEach(row => {
                         const newRow = `
                                <tr>
                                    <td>${row.codigo}</td>
                                    <td>${row.descuento}</td>
                                    <td>${row.activo ? 'Sí' : 'No'}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a class="btn btn-primary" title="Ver Detalle" href="#" type="button" data-toggle="modal"
                                        data-target="#ver${row.id}"><i class="fa fa-eye"></i></a>
                                        <!-- Modal ver Codigo -->
                                        <div class="modal fade" id="ver${row.id}" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">
                                                            Detalles del Código</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Código:
                                                                            </strong> <br>${row.codigo}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Descuento:
                                                                            </strong> <br>${row.descuento}</h4>
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Final Modal ver Codigo -->
                                        <a class="btn btn-secondary" title="Editar" href="#" type="button" data-toggle="modal"
                                            data-target="#editar${row.id}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" title="Eliminar"
                                            href="../actions/delete_promocion.php?id=${row.id}" type="button"><i
                                                class="fa fa-trash"></i></a>

                                                <!--Modal editar Codigo-->
                                                    <div class="modal fade" id="editar${row.id}" tabindex="-1" role="dialog"
                                                        aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar
                                                                        Código</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                        <form action="../actions/editar_promocion.php?id=${row.id}" method="POST" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-sm-5 mx-auto">
                                                                                    <div class="form-group">
                                                                                        <label for="" class="form-control-label">Datos del Código Promoción:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-bars"></i>
                                                                                            </div>
                                                                                            <input type="text" name="codigo" class="form-control" value="${row.codigo}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Descuento:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-comment-o"></i>
                                                                                            </div>
                                                                                            <input type="number" name="descuento" class="form-control" value="${row.descuento}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Activo:</label>
                                                                                        <div class="input-group">
                                                                                            <label class="checkbox-inline">
                                                                                                <input type="checkbox" name="activo" value="1" ${row.activo == 1 ? 'checked' : ''}> Sí
                                                                                            </label>
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
            <div class="col-sm-4 mx-auto">
                <a class="btn btn-primary" href="#" type="button" data-toggle="modal" data-target="#agregar"><i
                        class="fa fa-hand-o-right"></i> Promoción</a>



                <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Agregar
                                    Promoción</h4>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="../actions/agregar_promocion.php" method="POST">
                                            <div class="row">
                                                <div class="col-sm-5 mx-auto">
                                                    <div class="form-group">
                                                        <label for="" class="form-control-label">Datos de la
                                                            Promoción:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-bars"></i>
                                                            </div>
                                                            <input type="text" name="codigo" class="form-control"
                                                                placeholder="Nombre de la Código" required>
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-dollar"></i>
                                                            </div>
                                                            <input type="number" name="descuento" class="form-control"
                                                                placeholder="10%" required>
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <div class="form-check ">
                                                                <input name="activo" class="form-check-input"
                                                                    type="checkbox" value="1" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    ACTIVO
                                                                </label>
                                                            </div>
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
            <br>
        </div>
    </div>
    <br>
</div>

</div>



<?php include('../fijos/footer.php');?>