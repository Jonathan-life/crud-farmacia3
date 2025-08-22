<?= $header ?>

<h2>Editar Producto</h2>

<form action="<?= base_url('productos/actualizar/' . $producto['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"><?= $producto['descripcion'] ?></textarea>
    </div>

    <div class="mb-3">
        <label>Precio</label>
        <input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Categoría</label>
        <select name="categoria_id" class="form-control" required>
            <?php foreach($categorias as $c): ?>
                <option value="<?= $c['id'] ?>" <?= $c['id'] == $producto['categoria_id'] ? 'selected' : '' ?>>
                    <?= $c['nombre'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Imagen actual</label><br>
        <?php if ($producto['imagen']): ?>
            <img src="<?= base_url('uploads/' . $producto['imagen']) ?>" width="100" />
        <?php else: ?>
            Sin imagen
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label>Actualizar imagen</label>
        <input type="file" name="imagen" accept="image/*" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="<?= base_url('productos') ?>" class="btn btn-secondary">Cancelar</a>
</form>

<?= $footer ?>
