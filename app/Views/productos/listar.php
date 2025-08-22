<?= $header ?>

<h2>Lista de Productos</h2>

<a href="<?= base_url('productos/crear') ?>" class="btn btn-primary">Agregar Producto</a>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($productos as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['nombre'] ?></td>
            <td><?= $p['categoria'] ?></td>
            <td><?= $p['precio'] ?></td>
            <td>
                <?php if ($p['imagen']): ?>
                    <img src="<?= base_url('uploads/' . $p['imagen']) ?>" width="60" />
                <?php else: ?>
                    Sin imagen
                <?php endif; ?>
            </td>
            <td>
                <a href="<?= base_url('productos/editar/' . $p['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $footer ?>
