<?= $header ?>

<h2>Lista de Productos</h2>

<!-- Botón para agregar producto -->
<a href="<?= base_url('productos/crear') ?>" class="btn btn-primary mb-3">Agregar Producto</a>

<!-- Filtro por categoría -->
<form method="GET" action="<?= base_url('productos') ?>" class="mb-4">
    <div class="row g-2 align-items-center">
        <div class="col-md-4">
            <select name="categoria_id" class="form-select" onchange="this.form.submit()">
                <option value="">Todas las categorías</option>
                <?php foreach($categorias as $cat): ?>
                    <option value="<?= $cat['id'] ?>" 
                        <?= isset($_GET['categoria_id']) && $_GET['categoria_id'] == $cat['id'] ? 'selected' : '' ?>>
                        <?= $cat['nombre'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</form>

<!-- Listado de productos en cards -->
<div class="row">
    <?php if (!empty($productos)): ?>
        <?php foreach($productos as $p): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <?php if ($p['imagen']): ?>
                    <img src="<?= base_url('uploads/' . $p['imagen']) ?>" class="card-img-top" alt="<?= $p['nombre'] ?>" style="height:200px;object-fit:cover;">
                <?php else: ?>
                    <img src="<?= base_url('uploads/default.jpg') ?>" class="card-img-top" alt="Sin imagen" style="height:200px;object-fit:cover;">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $p['nombre'] ?></h5>
                    <p class="card-text"><strong>Categoría:</strong> <?= $p['categoria'] ?></p>
                    <p class="card-text"><strong>Precio:</strong> S/ <?= number_format($p['precio'], 2) ?></p>
                </div>
                <div class="card-footer text-center">
                    <a href="<?= base_url('productos/editar/' . $p['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="<?= base_url('productos/eliminar/' . $p['id']) ?>" 
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Estás seguro de eliminar este producto?');">
                        Eliminar
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay productos para mostrar.</p>
    <?php endif; ?>
</div>

<?= $footer ?>
