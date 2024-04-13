<!-- ======= Menu Section ======= -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Realizar la solicitud HTTP a la API
    const requestOptions = {
        method: "GET",
        redirect: "follow"
    };

    // Realizar una llamada a la API para obtener las tablas
    fetch("<?php echo $urlApi;?>/api/tipoTabla", requestOptions)
        .then(response => response.json())
        .then(data => {
            // Obtener el contenedor de las tablas
            const galleryContainer = document.getElementById("primergallery");

            // Iterar sobre los datos obtenidos de la API y agregar las secciones al contenedor
            data.forEach(tipoTabla => {
                // Crear la sección de la galería
                // Obtén la cantidad de elementos
                const cantidadElementos = data.length;
                const anchoColumna = 12 / cantidadElementos;
                const galleryItem = document.createElement("div");
                galleryItem.classList.add(`col-lg-${anchoColumna}`, `col-md-${anchoColumna}`);
                galleryItem.innerHTML = `
                    <div class="gallery-item">
                        <h1 style="text-align: center;">${tipoTabla.tipo}</h1>
                        <div class="box" data-toggle="modal" data-target="#${tipoTabla.tipo.toLowerCase().replace(/\s/g, '-') /* Convertir a minúsculas y reemplazar espacios por guiones */}">
                            <img src="<?php echo $urlApi;?>/storage/tablas/${tipoTabla.imagen}" alt="" class="img-fluid">
                        </div>
                    </div>
                `;

                // Crear el modal correspondiente
                const modal = document.createElement("div");
                const oraciones = tipoTabla.description.split('.');
                modal.classList.add("modal", "fade");
                modal.id = tipoTabla.tipo.toLowerCase().replace(/\s/g, '-');
                // Agregar las etiquetas <p> para cada oración
                let descripcionHTML = '';
                oraciones.forEach(oracion => {
                    if (oracion.trim() !== '') {
                        descripcionHTML +=
                            `<p style="margin-top:0;"><b>${oracion.trim()}</b></p>`;
                    }
                });
                modal.innerHTML = `
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <br>
                            <h2 style="text-align: center !important; color: #ffb03b; margin-bottom: 0%;">
                                <u>${tipoTabla.tipo}</u>
                            </h2>
                            <br>
                            <div class="card" style="text-align: center; margin: 0% 30% 3%; border: none;">
                                <h4>Descripción:</h4>
                                ${descripcionHTML}
                            </div>
                            <img width="700" height="350" class="img-thumbnail"
                                style="max-width: -webkit-fill-available; margin: 0% 6% 2%;" src="<?php echo $urlApi;?>/storage/tablas/${tipoTabla.imagen}" alt="">
                            <br>
                            <div class="text-center">
                                <button type="button" class="btn btn-outline-secondary rounded-circle"
                                    data-dismiss="modal">X</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                `;

                // Agregar las secciones al contenedor
                galleryContainer.appendChild(galleryItem);
                document.body.appendChild(
                modal); // Agregar el modal al body para que funcione correctamente
            });
        })
        .catch(error => console.error('Error al obtener las tablas:', error));
});
</script>
<section id="menu" class="menu">
    <div class="container">
        <div class="section-title">
            <h2>Nuestras <span>Tablas Macanudas</span></h2>
            <p>Para picar se calcula <strong> 150gr</strong> por persona, para comer <strong>
                    300gr</strong>.
            </p>

        </div>
        <div id="gallery" class="gallery">
            <div id="primergallery" class="row no-gutters">

            </div>
        </div>
    </div>
</section><!-- End Menu Section -->