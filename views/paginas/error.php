<main class="pagina_404">
    <h2 class="pagina_404__heading"><?= $titulo; ?></h2>

    <div class="pagina_404__grid">
        <div <?= aos_animacion(); ?> class="pagina_404__contenedor-imagen">
            <picture>
                <source srcset="<?= $_ENV['HOST'] . '/build/img/page-404.avif' ?>" type="image/avif">
                <source srcset="<?= $_ENV['HOST'] . '/build/img/page-404.webp' ?>" type="image/webp">

                <img class="pagina_404__imagen" loading="lazy" width="200" height="300" src="<?= $_ENV['HOST'] . '/build/img/page-404.jpg' ?>" alt="Imagen Pagina No Encontrada">
            </picture>
        </div>
        <div class="pagina_404__contenedor">
            <p <?= aos_animacion(); ?> class="pagina_404__texto">Tal vez quieras volver al inicio</p>
            <a <?= aos_animacion(); ?> class="pagina_404__enlace" href="/">Ir al inicio</a>
        </div>
    </div>

</main>