<?= $header ?>

<h2>Agregar Producto</h2>

<form action="<?= base_url('productos/guardar') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Categoría</label>
        <select name="categoria_id" class="form-control" required>
            <option value="">-- Seleccionar categoría --</option>
            <?php foreach($categorias as $c): ?>
                <option value="<?= $c['id'] ?>"><?= $c['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Imagen</label>
        <input type="file" name="imagen" accept="image/*" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="<?= base_url('productos') ?>" class="btn btn-secondary">Cancelar</a>
</form>

<?= $footer ?>
