<?php include('../db.php'); ?>
<?php include("../../variables.php"); ?>
<?php include('../fijos/header.php'); ?>

<?php include('../fijos_user/pannel_left_super_user.php'); ?>

<?php include('../fijos/pannel_right.php'); ?>
<style>
    /* Container styles */
    .container-fluid {
        width: 90%;
        margin: 20px auto;
    }

    /* Card styles */
    .card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .card-header {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    /* Table styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    thead {
        background-color: #f8f9fa;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    th {
        font-weight: bold;
    }

    /* Pagination styles */
    #pagination {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    button {
        padding: 10px 20px;
        margin: 0 5px;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
    }

    button:disabled {
        background-color: #cccccc;
    }

    button:hover:not(:disabled) {
        background-color: #0056b3;
    }
</style>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header" style="text-align:center;">
            Todas las Picadas
        </div>
        <table id="picadas-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Picada</th>
                    <th>Tipo</th>
                    <th>Agregados</th>
                    <th>Precio</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="picadas-body">
                <!-- Los datos se insertarán aquí dinámicamente -->
            </tbody>
        </table>
        <div id="pagination">
            <button id="prev-btn">Anterior</button>
            <button id="next-btn">Siguiente</button>
        </div>
    </div>
</div>

<script>
    let currentPage = 1;
    const perPage = 20;

    async function fetchPicadas(page) {
        try {
            const response = await fetch(`<?php echo $urlApi; ?>/api/general?page=${page}&per_page=${perPage}`);
            const data = await response.json();

            renderPicadas(data.data);
            updatePagination(data.current_page, data.last_page);
        } catch (error) {
            console.error("Error fetching data:", error);
        }
    }

    function renderPicadas(picadas) {
        const picadasBody = document.getElementById('picadas-body');
        picadasBody.innerHTML = '';

        picadas.forEach(picada => {
            const row = document.createElement('tr');
            // Concatenar los agregados
            const agregados = [
                picada.add2 || 'N/A',
                picada.add4 || 'N/A',
                picada.add5 || 'N/A'
            ].filter(add => add !== 'N/A').join(', ') || 'N/A';
            // Concatenar el producto y el número de personas que comen (add1)
            const productoConPersonas = `${picada.product || 'N/A'} (${picada.add1 || 'N/A'} personas)`;
            row.innerHTML = `
            <td>${new Date(picada.created_at).toLocaleDateString()}</td>
            <td>${picada.customer }</td>
            <td>${productoConPersonas}</td>
            <td>${picada.add3}</td>
            <td>${agregados}</td>
            
            <td>${picada.in_ars || 'N/A'}</td>
            <td>${picada.status || 'N/A'}</td>
            
        `;
            picadasBody.appendChild(row);
        });
    }

    function updatePagination(currentPage, lastPage) {
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');

        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === lastPage;

        prevBtn.onclick = () => {
            if (currentPage > 1) {
                currentPage--;
                fetchPicadas(currentPage);
            }
        };

        nextBtn.onclick = () => {
            if (currentPage < lastPage) {
                currentPage++;
                fetchPicadas(currentPage);
            }
        };
    }

    // Cargar la primera página de picadas al cargar la página
    window.onload = () => fetchPicadas(currentPage);
</script>
<?php include('../fijos/footer.php'); ?>