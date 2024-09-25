<?php include('../db.php'); ?>
<?php include ("../../variables.php");?>
<?php include('../fijos/header.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>

<br>
<div class="container-fluid">
    <div class="card">
        <div style="text-align:center;" class="card-header">
            Todas las Picadas
        </div>
        <br>
        <div class="card-body card-block">
            <div class="table-responsive dataTables_info" id="bootstrap-data-table_info" role="status"
                aria-live="polite"></div>
            <table id="generalTable" class="table table-striped table-bordered">
                <thead style="text-align: center;">
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Picada</th>
                        <th>Para</th>
                        <th>Tipo</th>
                        <th>Medio de Pago</th>
                        <th>Estado</th>
                        <th style="min-width: 10%;">Opciones</th>
                    </tr>
                </thead>
                <tbody id="generalBody">
                    <!-- Los datos de los agregados se llenarán aquí dinámicamente con JavaScript -->
                </tbody>
            </table>
            <script>
            // Realizar la solicitud HTTP a la API
            const requestOptions = {
                method: "GET",
                redirect: "follow"
            };

            fetch("<?php echo $urlApi;?>/api/indexparcial", requestOptions)
                .then(response => response.json())
                .then(result => {
                    // Obtener la referencia de la tabla y su cuerpo
                    const table = document.getElementById("generalTable");
                    const tbody = document.getElementById("generalBody");

                    // Limpiar la tabla antes de agregar nuevos datos
                    tbody.innerHTML = "";

                    // Iterar sobre los resultados y agregar filas a la tabla
                    result.forEach(row => {
                        const newRow = `
                                <tr>
                                    <td>${row.delivery_date}</td>
                                    <td>${row.customer}</td>
                                    <td>${row.product}</td>
                                    <td>${row.add1}</td>
                                    <td>${row.add3}</td>
                                    <td>${row.payment_mode}<br>
                                        <p style="font-size: 5;">${row.status_pago}</p>
                                    </td>
                                    <td>${row.status}</td>
                                    <td style="text-align:center; width:15%;">
                                        <div class="btn-group">
                                            <!--======================|   VER   |======================-->
                                            <a class="btn btn-primary" title="Ver Detalle" href="#" data-toggle="modal"
                                                data-target="#ver${row.id}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-primary" href="#" title="cambiar Status" data-toggle="modal"
                                                data-target="#cambiar_status${row.id}">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editar_pedido${row.id}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-primary" target="_blank"
                                                href="https://api.whatsapp.com/send?phone=54${row.cel_phone}&text=Hola,%20te%20escribo%20de%20Picadas%20Macanudas"
                                                title="Contactar">
                                                <i class="fa fa-user"></i>
                                            </a>
                                            <a class="btn btn-danger" title="Eliminar"
                                                href="../actions/delete_pedidos.php?id=${row.id}" type="button">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            ${status === 'ENTREGADA' ? `
                                                <a class="btn btn-dark" title="Enviar Encuesta" target="_blank"
                                                    href="https://api.whatsapp.com/send?phone=54${row.cel_phone}&text=Hola,%20esperamos%20que%20hayas%20disfrutado%20la%20picada%20.%20Nos%20interesa%20tu%20opinion,%20podrás%20ingresar%20y%20dejarnos%20un%20comentario:http://picadasmacanudas.com/encuesta/encuesta.php?id=${row.id}">
                                                    <i class="fa fa-thumbs-o-up"></i>
                                                </a>
                                            ` : ''}
                                        </div>
                                        <!--======================|MODAL VER|======================-->
                                        <div class="modal fade" id="ver${row.id}" tabindex="-1" role="dialog"
                                            aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Detalles de
                                                            Picada para <strong>${row.customer}</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card border">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Nombre: </strong>
                                                                            ${row.customer}(${row.cel_phone})</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align:center;"> <strong> Receptor: </strong>
                                                                            ${row.cnee}(${row.cnee_cel_phone})</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"> <strong> Dedicatoria: </strong>
                                                                        ${row.inscription ? row.inscription  : ''}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"> <strong> Fecha: </strong>
                                                                        ${row.delivery_date}</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"> <strong> Horario: </strong>
                                                                        ${row.schedule_available}</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"><strong>Forma de Envio:</strong>
                                                                        ${row.type == 'con_envio' ? 'Envio a Domicilio'  : 'Retiro en local'}</h4>
                                                                    </div>
                                                                </div>
                                                                ${row.type !== 'con_retiro' ? `
                                                                    <div class="row">
                                                                        <div class="col-sm-2"></div>
                                                                        <div class="col-sm-8">
                                                                            <h4 style="text-align: center;"><strong>Direccion:</strong>
                                                                                ${row.address} (${row.referencia}) -${row.location}
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                ` : ''}
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"><strong>Picada:
                                                                       </strong>${row.product} - ${row.add3} (${row.add1})
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"><strong>Agregados:</strong>
                                                                            ${row.add2 ? row.add2  : ''}  ${row.add4 ? '/' + row.add4  : ''} ${row.add5 ? '/' + row.add5 : ''}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"><strong>Observaciones:</strong>
                                                                        ${row.observacion_interna ? row.observacion_interna  : ''}</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"><strong>Forma de Pago:</strong>
                                                                        ${row.payment_mode}</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-8">
                                                                        <h4 style="text-align: center;"><strong>Total:</strong>
                                                                        ${row.in_ars}</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-sm-4"></div>
                                                                <div class="col-sm-4" style="text-align: center;">
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                                <div class="col-sm-4"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--======================|FINAL VER|======================-->

                                        <!--====================== MODAL EDITAR ======================-->
                                        <div class="modal fade" id="editar_pedido${row.id}" tabindex="-1" role="dialog"
                                            aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Cambiar
                                                            datos de la Picada <strong>${row.id}</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card border">
                                                            <div class="card-body">
                                                                <form action="../actions/editar_pedido.php?id=${row.id}&vista=principal"
                                                                    method="POST">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-sm-4 mx-auto">
                                                                            <label for="text">Tipo</label>
                                                                            <select name="type[]" id="" class="form-control">
                                                                                <option value="${row.type}">${row.type}
                                                                                </option>
                                                                                <option value="con_envio">Con Envio</option>
                                                                                <option value="con_retiro">Con Retiro</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-2"></div>
                                                                        <div class="form-group col-sm-4 mx-auto">
                                                                            <label for="name">Nombre:</label>
                                                                            <input class="form-control" type="name" name="customer"
                                                                                value="${row.customer}">
                                                                        </div>
                                                                        <div class="form-group col-sm-4 mx-auto">
                                                                            <label for="name">Celular</label>
                                                                            <input class="form-control" type="phone" name="cel_phone"
                                                                                value="${row.cel_phone}">
                                                                        </div>
                                                                        <div class="col-sm-2"></div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-2"></div>
                                                                        <div class="form-group col-sm-4 mx-auto">
                                                                            <label for="name">Receptor:</label>
                                                                            <input class="form-control" type="name" name="cnee"
                                                                                value="${row.cnee}">
                                                                        </div>
                                                                        <div class="form-group col-sm-4 mx-auto">
                                                                            <label for="name">Celular</label>
                                                                            <input class="form-control" type="phone" name="cnee_cel_phone"
                                                                                value="${row.cnee_cel_phone}">
                                                                        </div>
                                                                        <div class="col-sm-2"></div>
                                                                    </div>
                                                                    <div class="row-group col-sm-8 mx-auto">
                                                                        <label for="comentario">Dedicatoria</label>
                                                                        <textarea class="form-control"
                                                                            name="inscription">${row.inscription}</textarea>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-2"></div>
                                                                        <div class="form-group col-sm-4 mx-auto">
                                                                            <label for="name">Fecha</label>
                                                                            <input class="form-control" type="date" name="delivery_date"
                                                                                value="${row.delivery_date}">
                                                                        </div>
                                                                        <div class="form-group col-sm-4 mx-auto">
                                                                            <label for="name">Horario</label>
                                                                            <select id="selecthoras${row.id}" name="schedule_available[]" class="form-control">
                                                                                <option value="${row.schedule_available}">
                                                                                ${row.schedule_available}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-2"></div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-2"></div>
                                                                        <div class="form-group col-sm-4 mx-auto">
                                                                            <label for="name">Direccion:</label>
                                                                            <input class="form-control" type="address" name="address"
                                                                                value="${row.address}">
                                                                        </div>
                                                                        <div class="form-group col-sm-4 mx-auto">
                                                                            <label for="name">Localidad</label>
                                                                            <select id="selectdeliveries${row.id}" name="location[]" class="form-control">
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-2"></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-sm-8 control-label">Tipo:</label>
                                                                        <div class="col-sm-8 mx-auto">
                                                                            <select id="selectpicadas${row.id}" name="product[]" required class="form-control form-control">
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label  class="col-sm-8 control-label">Tabla:</label>
                                                                        <div class="col-sm-8 mx-auto">
                                                                            <select id="selecttablas${row.id}" name="add3[]" class="form-control form-control" require>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label 
                                                                            class="col-sm-8 control-label">Comensales:</label>
                                                                        <div class="col-sm-8 mx-auto">
                                                                            <select name="add1[]" id="selectSm" required
                                                                                class="form-control form-control">
                                                                                <option value="${row.add1}">Pican ${row.add1}
                                                                                </option>
                                                                                <option value="4">Pican 4</option>
                                                                                <option value="5">Pican 5</option>
                                                                                <option value="6">Pican 6</option>
                                                                                <option value="7">Pican 7</option>
                                                                                <option value="8">Pican 8</option>
                                                                                <option value="9">Pican 9</option>
                                                                                <option value="10">Pican 10</option>
                                                                                <option value="12">Pican 11</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-8 mx-auto">
                                                                        <p>Agregados: ${row.add2}</p>
                                                                        <label for="name">Sumar Agregado:</label>
                                                                        <select  id="selectagregados${row.id}" name="add2[]" class="form-control">
                                                                            <option value="">.-Agregado Nuevo.-</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-sm-8 mx-auto">
                                                                        <label for="name">Observaciones:</label>
                                                                        <textarea name="observacion_interna" class="form-control" cols="30"
                                                                            rows="10">${row.observacion_interna}</textarea>
                                                                    </div>
                                                                    <div class="form-group col-sm-8 mx-auto">
                                                                        <label for="name">Total:</label>
                                                                        <input type="number" value="${row.in_ars}" name="in_ars"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-sm-8 mx-auto">
                                                                        <label for="name">Modo de Pago</label>
                                                                        <select id="selectpagos${row.id}" name="payment_method[]" class="form-control">
                                                                            
                                                                        </select>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-4 mx-auto" style="text-align: center;">
                                                                            <button type="submit" name="editar" id="editar"
                                                                                class="btn btn-primary">Editar</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--======================|  CAMBIAR STATUS  |======================-->
                                        <!--Modal asigned CNTR-->
                                        <div class="modal fade" id="cambiar_status${row.id}" tabindex="-1" role="dialog"
                                            aria-labelledby="scrollmodalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 style="text-align:center;" class="modal-title" id="scrollmodalLabel">Cambiar
                                                            estado a Picada <strong>${row.id}</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card border border-secondary">
                                                            <div class="card-body">
                                                                <h3 style="text-align: center;"> <strong> Status: </strong></h3>
                                                                <form action="../actions/cambiar_status.php?id=${row.id}"
                                                                    method="POST">
                                                                    <div class="row">
                                                                        <div class="col-sm-2"></div>
                                                                        <div class="col-sm-8">
                                                                            <select name="status[]" id="selectpicadastatu${row.id}" class="form-control form-control">
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-sm-4"></div>
                                                                        <div class="col-sm-4" style="text-align: center;">
                                                                            <button type="submit" name="confirmar" id="confirmar"
                                                                                class="btn btn-warning">Cambiar</button>

                                                                        </div>
                                                                        <div class="col-sm-4"></div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Final Modal View CNTR-->

                                    </td>
                                </tr>

                            `;
                        tbody.innerHTML += newRow;
                        generatehorasForRows(row);
                        generatedeliveriesForRows(row);
                        generatetablasForRows(row);
                        generatetipopicadasForRows(row);
                        generateagregadosForRows(row);
                        generatepagosForRows(row);
                        generatepicadastatuForRows(row);
                    });

                })
                .catch(error => console.error(error));

            function generatehorasForRows(row) {
                fetch("<?php echo $urlApi;?>/api/deliveryHora") // Reemplaza con la URL correcta de tu API
                    .then(response => response.json())
                    .then(data => {
                        // Manipula los datos de la respuesta
                        if (Array.isArray(data)) {
                            // Obtiene el contenedor de las opciones
                            var horasContainer = document.getElementById('selecthoras' + row.id);

                            // Elimina las opciones actuales del select
                            horasContainer.innerHTML = '';

                            // Agrega la opción inicial basada en los datos existentes
                            if (row.schedule_available) {
                                var existingOption = document.createElement('option');
                                existingOption.value = row.schedule_available;
                                existingOption.textContent = row.schedule_available;
                                horasContainer.appendChild(existingOption);
                            }

                            // Agrega las opciones dinámicamente desde la respuesta de la API
                            data.forEach(horas => {
                                var option = document.createElement('option');
                                option.value = horas.horario; // Asigna el valor de la hora
                                option.textContent = horas.horario + '-' + horas
                                .delivery; // Asigna el texto de la hora
                                horasContainer.appendChild(option);
                            });
                        } else {
                            console.error('La respuesta de la API no es un array.');
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener los horarios desde la API:', error);
                    });
            }

            function generatedeliveriesForRows(row) {
                fetch("<?php echo $urlApi;?>/api/delivery") // Reemplaza con la URL correcta de tu API
                    .then(response => response.json())
                    .then(data => {
                        // Manipula los datos de la respuesta
                        if (Array.isArray(data)) {
                            // Obtiene el contenedor de las opciones
                            var deliveriesContainer = document.getElementById('selectdeliveries' + row.id);

                            // Elimina las opciones actuales del select
                            deliveriesContainer.innerHTML = '';

                            // Agrega la opción inicial basada en los datos existentes
                            if (row.location) {
                                var existingOption = document.createElement('option');
                                existingOption.value = row.location;
                                existingOption.textContent = row.location;
                                deliveriesContainer.appendChild(existingOption);
                            }

                            // Agrega las opciones dinámicamente desde la respuesta de la API
                            data.forEach(deliveries => {
                                var option = document.createElement('option');
                                option.value = deliveries.location; // Asigna el valor de la hora
                                option.textContent = deliveries.location; // Asigna el texto de la hora
                                deliveriesContainer.appendChild(option);
                            });
                        } else {
                            console.error('La respuesta de la API no es un array.');
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener los deliveries desde la API:', error);
                    });
            }

            function generatetablasForRows(row) {
                fetch("<?php echo $urlApi;?>/api/tipoTabla") // Reemplaza con la URL correcta de tu API
                    .then(response => response.json())
                    .then(data => {
                        // Manipula los datos de la respuesta
                        if (Array.isArray(data)) {
                            // Obtiene el contenedor de las opciones
                            var tablasContainer = document.getElementById('selecttablas' + row.id);

                            // Elimina las opciones actuales del select
                            tablasContainer.innerHTML = '';

                            // Agrega la opción inicial basada en los datos existentes
                            if (row.add3) {
                                var existingOption = document.createElement('option');
                                existingOption.value = row.add3;
                                existingOption.textContent = row.add3;
                                tablasContainer.appendChild(existingOption);
                            }

                            // Agrega las opciones dinámicamente desde la respuesta de la API
                            data.forEach(tablas => {
                                var option = document.createElement('option');
                                option.value = tablas.tipo; // Asigna el valor de la hora
                                option.textContent = tablas.tipo; // Asigna el texto de la hora
                                tablasContainer.appendChild(option);
                            });
                        } else {
                            console.error('La respuesta de la API no es un array.');
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener las tablas desde la API:', error);
                    });
            }

            function generatetipopicadasForRows(row) {
                fetch("<?php echo $urlApi;?>/api/tipoPicadaActivas") // Reemplaza con la URL correcta de tu API
                    .then(response => response.json())
                    .then(data => {
                        // Manipula los datos de la respuesta
                        if (Array.isArray(data)) {
                            // Obtiene el contenedor de las opciones
                            var picadasContainer = document.getElementById('selectpicadas' + row.id);

                            // Elimina las opciones actuales del select
                            picadasContainer.innerHTML = '';

                            // Agrega la opción inicial basada en los datos existentes
                            if (row.product) {
                                var existingOption = document.createElement('option');
                                existingOption.value = row.product;
                                existingOption.textContent = row.product;
                                picadasContainer.appendChild(existingOption);
                            }

                            // Agrega las opciones dinámicamente desde la respuesta de la API
                            data.forEach(picadas => {
                                var option = document.createElement('option');
                                option.value = picadas.tipo; // Asigna el valor de la hora
                                option.textContent = picadas.tipo; // Asigna el texto de la hora
                                picadasContainer.appendChild(option);
                            });
                        } else {
                            console.error('La respuesta de la API no es un array.');
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener las tablas desde la API:', error);
                    });
            }

            function generateagregadosForRows(row) {
                fetch("<?php echo $urlApi;?>/api/agregado") // Reemplaza con la URL correcta de tu API
                    .then(response => response.json())
                    .then(data => {
                        // Manipula los datos de la respuesta
                        if (Array.isArray(data)) {
                            // Obtiene el contenedor de las opciones
                            var agregadosContainer = document.getElementById('selectagregados' + row.id);

                            // Agrega las opciones dinámicamente desde la respuesta de la API
                            data.forEach(agregados => {
                                var option = document.createElement('option');
                                option.value = agregados.title; // Asigna el valor de la hora
                                option.textContent = agregados.title; // Asigna el texto de la hora
                                agregadosContainer.appendChild(option);
                            });
                        } else {
                            console.error('La respuesta de la API no es un array.');
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener los agregados desde la API:', error);
                    });
            }

            function generatepagosForRows(row) {
                fetch("<?php echo $urlApi;?>/api/metodoPago") // Reemplaza con la URL correcta de tu API
                    .then(response => response.json())
                    .then(data => {
                        // Manipula los datos de la respuesta
                        if (Array.isArray(data)) {
                            // Obtiene el contenedor de las opciones
                            var pagosContainer = document.getElementById('selectpagos' + row.id);
                            // Elimina las opciones actuales del select
                            pagosContainer.innerHTML = '';

                            // Agrega la opción inicial basada en los datos existentes
                            if (row.payment_mode) {
                                var existingOption = document.createElement('option');
                                existingOption.value = row.payment_mode;
                                existingOption.textContent = row.payment_mode;
                                pagosContainer.appendChild(existingOption);
                            }
                            // Agrega las opciones dinámicamente desde la respuesta de la API
                            data.forEach(pagos => {
                                var option = document.createElement('option');
                                option.value = pagos.modo_de_pago; // Asigna el valor de la hora
                                option.textContent = pagos.modo_de_pago; // Asigna el texto de la hora
                                pagosContainer.appendChild(option);
                            });
                        } else {
                            console.error('La respuesta de la API no es un array.');
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener los metodos de pago desde la API:', error);
                    });
            }

            function generatepicadastatuForRows(row) {
                fetch("<?php echo $urlApi;?>/api/statuPicada") // Reemplaza con la URL correcta de tu API
                    .then(response => response.json())
                    .then(data => {
                        // Manipula los datos de la respuesta
                        if (Array.isArray(data)) {
                            // Obtiene el contenedor de las opciones
                            var picadastatusContainer = document.getElementById('selectpicadastatu' + row.id);
                            // Elimina las opciones actuales del select
                            picadastatusContainer.innerHTML = '';

                            // Agrega la opción inicial basada en los datos existentes
                            if (row.status) {
                                var existingOption = document.createElement('option');
                                existingOption.value = row.status;
                                existingOption.textContent = row.status;
                                picadastatusContainer.appendChild(existingOption);
                            }
                            // Agrega las opciones dinámicamente desde la respuesta de la API
                            data.forEach(statuPicada => {
                                var option = document.createElement('option');
                                option.value = statuPicada.title; // Asigna el valor de la hora
                                option.textContent = statuPicada.title; // Asigna el texto de la hora
                                picadastatusContainer.appendChild(option);
                            });
                        } else {
                            console.error('La respuesta de la API no es un array.');
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener los metodos de pago desde la API:', error);
                    });
            }
            </script>
        </div>
    </div>
</div>
<br>
<?php include('../fijos/footer.php');?>