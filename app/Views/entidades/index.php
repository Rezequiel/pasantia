<h2><?= esc($title) ?></h2>

<?php if(!empty($entidades) && is_array($entidades)): ?>
    <?php foreach ($entidades as $entidad): ?>
        <h3><?= esc($entidad['nombre']) ?></h3>

        <div class="main">
            <?= esc($entidad['comentarios']) ?>
        </div>
        <p><a href="/entidades/<?= esc($entidad['nombre_corto'], 'url') ?>">Ver elemento</a></p>
    <?php endforeach ?>
<?php else: ?>
    <h3>Nada</h3>

    <p>No se encontró nada.</p>
<?php endif ?>
