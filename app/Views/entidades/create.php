<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/entidades/create" method="post">
    <?= csrf_field() ?>
    <div class="form-group mb-3">
    <label for="nombre">Nombre</label>
        <input type="input" name="nombre" value="<?= set_value('title') ?>" class="form-control" >
    </div>
    <div class="form-group mb-3">
        <label for="comentarios">Comentarios</label>
        <textarea name="comentarios" cols="45" rows="4" class="form-control"><?= set_value('body') ?></textarea>
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-success">Crear</button>
    </div>
</form>