<h2 class="dashboard__heading"><?= $titulo; ?></h2>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Ultimos Registros</h3>

            <?php foreach ($registros as $registro) : ?>
                <p class="bloque__texto">
                    <?= $registro->usuario->nombre . " " . $registro->usuario->apellido ?>
                </p>
            <?php endforeach; ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Ingresos</h3>
            <p class="bloque__texto--cantidad">$ <?= $ingresos; ?></p>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos Con Menos Lugares Disponibles</h3>
            <?php foreach ($menos_disponibles as $evento) : ?>
                <p class="bloque__texto">
                    <?= $evento->nombre . " - " . $evento->disponibles . ' Disponibles' ?>
                </p>
            <?php endforeach; ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos Con Mas Lugares Disponibles</h3>
            <?php foreach ($mas_disponibles as $evento) : ?>
                <p class="bloque__texto">
                    <?= $evento->nombre . " - " . $evento->disponibles . ' Disponibles' ?>
                </p>
            <?php endforeach; ?>
        </div>
    </div>
</main>
