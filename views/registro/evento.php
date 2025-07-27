<div class="evento">
    <p class="evento__hora"><?= $evento->hora->hora; ?></p>
    <div class="evento__informacion">
        <h4 class="evento__nombre"><?= $evento->nombre; ?></h4>

        <p class="evento__introduccion"><?= $evento->descripcion; ?></p>

        <div class="evento__autor-info">
            <picture>
                <source srcset="<?= $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.webp" type="image/webp">
                <source srcset="<?= $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.png" type="image/png">

                <img class="evento__imagen-autor" loading="lazy" width="200px" height="300" src="<?= $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="Imagen Ponente">
            </picture>
            <p class="evento__autor--nombre">
                <?= $evento->ponente->nombre . " " . $evento->ponente->apellido?>
            </p>
        </div>

        <button
            type="button"
            data-id="<?= $evento->id; ?>"
            class="evento__agregar"
            <?= ($evento->disponibles  === "0") ? 'disabled' :'' ?> >
            <?= ($evento->disponibles  === "0") ? 'Agotado' :'Agregar - ' . $evento->disponibles . ' Disponibles' ?>
        </button>

    </div>
</div>