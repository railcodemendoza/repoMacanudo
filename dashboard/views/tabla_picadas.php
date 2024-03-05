 <?php include('../db.php'); ?>
 <?php include ("../../variables.php");?>
 <?php include('../fijos/header.php'); ?>

 <?php include('../fijos/pannel_right.php'); ?>

 <?php include('../fijos_user/pannel_left_super_user.php'); ?>
 <br>
 <div class="container-fluid">
     <div class="card">
         <div style="text-align:center;" class="card-header">
             Detalles de Tablas de picadas.
         </div>
         <div class="card-body card-block">
             <div class="responsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
             </div>
             <table id="tablaTable" class="table table-striped table-bordered">
                 <thead style="text-align: center;">
                     <tr>
                         <th>Título</th>
                         <th>Detalle</th>
                         <th>Precio</th>
                         <th>Costo</th>
                         <th>Opciones</th>
                     </tr>
                 </thead>
                 <tbody id="tablasBody">
                     <!-- Los datos de la tabla se llenarán aquí dinámicamente con JavaScript -->
                 </tbody>
             </table>

             <script>
             // Realizar la solicitud HTTP a la API
             const requestOptions = {
                 method: "GET",
                 redirect: "follow"
             };

             fetch("<?php echo $urlApi;?>/api/tipoTabla", requestOptions)
                 .then(response => response.json())
                 .then(result => {
                     // Obtener la referencia de la tabla y su cuerpo
                     const table = document.getElementById("tablaTable");
                     const tbody = document.getElementById("tablasBody");

                     // Limpiar la tabla antes de agregar nuevos datos
                     tbody.innerHTML = "";

                     // Iterar sobre los resultados y agregar filas a la tabla
                     result.forEach(row => {
                         const newRow = `
                                <tr>
                                    <td>${row.tipo}</td>
                                    <td>${row.description}</td>
                                    <td>${row.in_ars}</td>
                                    <td>${row.out_ars}</td>
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
                                                            Detalles de la Tabla</h4>
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
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"> <strong> Precio de la Tabla:
                                                                            </strong><br>$${row.in_ars} </h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"> <strong> Costo de la Tabla: </strong><br>$${row.out_ars}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Imagen:
                                                                            </strong></h4>
                                                                        <img src="<?php echo $urlApi;?>/storage/tablas/${row.imagen}" alt="Imagen de la tabla" style="max-width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Final Modal ver tipo tabla -->
                                        <a class="btn btn-secondary" title="Editar" href="#" type="button" data-toggle="modal"
                                            data-target="#editar${row.id}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" title="Eliminar"
                                            href="../actions/delete_tabla_picadas.php?id=${row.id}" type="button"><i
                                                class="fa fa-trash"></i></a>

                                                <!--Modal editar tipo tabla-->
                                                    <div class="modal fade" id="editar${row.id}" tabindex="-1" role="dialog"
                                                        aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar
                                                                        Tabla</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                        <form action="../actions/editar_tabla_picadas.php?id=${row.id}" method="POST" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-sm-5 mx-auto">
                                                                                    <div class="form-group">
                                                                                        <label for="" class="form-control-label">Datos del Tipo de Tabla:</label>
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
                                                                                        <img src="<?php echo $urlApi;?>/storage/tablas/${row.imagen}" class="d-block w-100" alt="...">
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
                     });

                 })
                 .catch(error => console.error(error));
             </script>
         </div>
         <form action="../report/report_tabla_picadas.php" method="POST">
             <div class="row" style="text-align: center;">
                 <div class="col-sm-4 mx-auto">
                     <button type="submit" id="export_data" name="export_data" value="Export to excel"
                         class="btn btn-primary"> <i class="fa fa-download"></i> Listado</button>
         </form>
         <a class="btn btn-success" href="#" type="button" data-toggle="modal" data-target="#agregar"><i
                 class="fa fa-hand-o-right"></i> Tabla</a>

         <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
             aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Agregar Tabla</h4>
                     </div>
                     <div class="modal-body">
                         <div class="card">
                             <div class="card-body">
                                 <form action="../actions/agregar_tabla_picada.php" method="POST" enctype="multipart/form-data">
                                     <div class="row">
                                         <div class="col-sm-5 mx-auto">
                                             <div class="form-group">
                                                 <label for="" class="form-control-label">Datos de la Tabla:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-bars"></i>
                                                     </div>
                                                     <input type="text" name="tipo" class="form-control"
                                                         placeholder="Nombre de la tabla" required>
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Descripción:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa  fa-comment-o"></i>
                                                     </div>
                                                     <input type="text" name="description" class="form-control"
                                                         placeholder="Comentario para web" required>
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Precio:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-dollar"></i>
                                                     </div>
                                                     <input type="number" name="in_ars" class="form-control"
                                                         placeholder="230.00" required>
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Costo:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-dollar"></i>
                                                     </div>
                                                     <input type="number" name="out_ars" class="form-control"
                                                         placeholder="184.00" required>
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