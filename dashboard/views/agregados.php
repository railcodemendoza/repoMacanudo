 <?php include('../db.php'); ?>
 <?php include ("../../variables.php");?>
 <?php include('../fijos/header.php'); ?>

 <?php include('../fijos/pannel_right.php'); ?>

 <?php include('../fijos_user/pannel_left_super_user.php'); ?>
 <br>
 <div class="container-fluid">
     <div class="card">
         <div style="text-align:center;" class="card-header">
             Detalles de Precios en Web
         </div>
         <div class="card-body card-block">
             <div class="responsive dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">
             </div>
             <table id="agregadosTable" class="table table-striped table-bordered">
                 <thead style="text-align: center;">
                     <tr>
                         <th>Título</th>
                         <th>Descripción</th>
                         <th>Stock</th>
                         <th>Precio</th>
                         <th>Opciones</th>
                     </tr>
                </thead>
                <tbody id="agregadosBody">
                     <!-- Los datos de los agregados se llenarán aquí dinámicamente con JavaScript -->
                </tbody>
             </table>
             <script>
             // Realizar la solicitud HTTP a la API
             const requestOptions = {
                 method: "GET",
                 redirect: "follow"
             };

             fetch("<?php echo $urlApi;?>/api/agregado", requestOptions)
                 .then(response => response.json())
                 .then(result => {
                     // Obtener la referencia de la tabla y su cuerpo
                     const table = document.getElementById("agregadosTable");
                     const tbody = document.getElementById("agregadosBody");

                     // Limpiar la tabla antes de agregar nuevos datos
                     tbody.innerHTML = "";

                     // Iterar sobre los resultados y agregar filas a la tabla
                     result.forEach(row => {
                         const newRow = `
                                <tr>
                                    <td>${row.title}</td>
                                    <td>${row.description}</td>
                                    <td>${row.stock}</td>
                                    <td>${row.in_ars}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a class="btn btn-primary" title="Ver Detalle" href="#" type="button" data-toggle="modal"
                                        data-target="#ver${row.id}"><i class="fa fa-eye"></i></a>
                                        <!-- Modal ver Agregado -->
                                        <div class="modal fade" id="ver${row.id}" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">
                                                            Detalles del Agregado</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Título:
                                                                            </strong> <br>${row.title}</h4>
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
                                                                        <h4 style="text-align: center;"> <strong> Precio del Agregado:
                                                                            </strong><br>$${row.in_ars} </h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"> <strong> Costo del Agregado: 
                                                                        </strong><br>$${row.out_ars}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"> <strong> Stock del Agregado: 
                                                                        </strong><br>${row.stock}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"> <strong> Proveedor: 
                                                                        </strong><br>${row.proveedor}</h4>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Imagen:
                                                                            </strong></h4>
                                                                        <img src="<?php echo $urlApi;?>/storage/agregados/${row.img}" alt="Imagen del agregado" style="max-width: 100%;">
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Final Modal ver Agregado -->
                                        <a class="btn btn-secondary" title="Editar" href="#" type="button" data-toggle="modal"
                                            data-target="#editar${row.id}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" title="Eliminar"
                                            href="../actions/delete_add2.php?id=${row.id}" type="button"><i
                                                class="fa fa-trash"></i></a>

                                                <!--Modal editar Agregado-->
                                                    <div class="modal fade" id="editar${row.id}" tabindex="-1" role="dialog"
                                                        aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Editar
                                                                        Agregado</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                        <form action="../actions/editar_add2.php?id=${row.id}" method="POST" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-sm-5 mx-auto">
                                                                                    <div class="form-group">
                                                                                        <label for="" class="form-control-label">Datos del Tipo de Tabla:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-bars"></i>
                                                                                            </div>
                                                                                            <input type="text" name="title" class="form-control" value="${row.title}" required>
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
                                                                                            <input type="file" name="img" class="form-control" >
                                                                                            
                                                                                        </div>
                                                                                        <br>
                                                                                        <img src="<?php echo $urlApi;?>/storage/agregados/${row.img}" class="d-block w-100" alt="...">
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
                                                                                        <label for="" class="form-control-label">Stock:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-dollar"></i>
                                                                                            </div>
                                                                                            <input type="number" name="stock" class="form-control" value="${row.stock}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                        <label for="" class="form-control-label">Proveedor:</label>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-addon">
                                                                                                <i class="fa fa-dollar"></i>
                                                                                            </div>
                                                                                            <input type="text" name="proveedor" class="form-control" value="${row.proveedor}" required>
                                                                                        </div>
                                                                                        <br>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 mx-auto" style="text-align: center;">
                                                                                    <button type="submit" name="editar_pagina" id="editar_pagina" class="btn btn-primary">Cambiar</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Modal editar Agregado-->
                                    </td>
                                </tr>
                            `;
                         tbody.innerHTML += newRow;
                     });

                 })
                 .catch(error => console.error(error));
             </script>
         </div>
         <form action="../report/report_agregados.php" method="POST">
             <div class="row" style="text-align: center;">
                 <div class="col-sm-4 mx-auto">
                     <button type="submit" id="export_data" name="export_data" value="Export to excel"
                         class="btn btn-primary"> <i class="fa fa-download"></i> Listado</button>
         </form>
        <a class="btn btn-success" href="#" type="button" data-toggle="modal" data-target="#agregar"><i
                 class="fa fa-hand-o-right"></i> Agregado</a>

         <!--Modal asigned CNTR-->
         <div class="modal fade" id="agregar" tabindex="-1" role="dialog"
             aria-labelledby="scrollmodalLabel" aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Agregar Agregado</h4>
                     </div>
                     <div class="modal-body">
                         <div class="card border">
                             <div class="card-body">
                                 <form action="../actions/agregar_add2.php" method="POST" enctype="multipart/form-data">
                                     <div class="row">
                                         <div class="col-sm-5 mx-auto">
                                             <div class="form-group">
                                                 <label for="" class="form-control-label">Titulo del Agregado:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-bars"></i>
                                                     </div>
                                                     <input type="text" name="title" class="form-control" value="" required>
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Descripción del
                                                 Agregado:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa  fa-comment-o"></i>
                                                     </div>
                                                     <input type="text" name="description" class="form-control"
                                                         value="" required>
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Precio del Agregado:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-dollar"></i>
                                                     </div>
                                                     <input type="number" name="in_ars" class="form-control" value="" required>
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Costo del Agregado:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-dollar"></i>
                                                     </div>
                                                     <input type="number" name="out_ars" class="form-control" value="" required>
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Proveedor del
                                                    Agregado:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-user"></i>
                                                     </div>
                                                     <input type="text" name="proveedor" class="form-control" value="" required>
                                                 </div>
                                                 <br>
                                                 <label for="" class="form-control-label">Stock del Agregado:</label>
                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-shopping-cart"></i>
                                                     </div>
                                                     <input type="number" name="stock" class="form-control" value="" required>
                                                 </div>
                                                 <br>

                                                 <div class="input-group">
                                                     <div class="input-group-addon">
                                                         <i class="fa fa-file-image-o"></i><label for=""
                                                             class="form-control-label"> Seleccione imagen del
                                                             Agregado:</label>
                                                     </div>
                                                     <div class="form-group">
                                                         <div>
                                                             <input type="file" class="form-control" id="img"
                                                                 name="img" required>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                             </div>
                             <div class="row">
                                 <div class="col-sm-4"></div>
                                 <div class="col-sm-4" style="text-align: center;">
                                     <button type="submit" name="agregar_producto" id="agregar"
                                         class="btn btn-primary">Agregar</button>
                                 </div>
                                 <div class="col-sm-4"></div>
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