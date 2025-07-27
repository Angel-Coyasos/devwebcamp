<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?= $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia mas importante de Latinoamerica</p>

    <div class="devwebcamp__grid">
        <div  <?= aos_animacion(); ?> class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/avif">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="Imagen DevWebCamp">
            </picture>
        </div>

        <div class="devwebcamp__contenido">
            <p <?= aos_animacion(); ?>  class="devwebcamp__texto">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem, eos fugit nesciunt perferendis rerum voluptate. Accusamus dolorum in necessitatibus placeat veritatis! A eveniet exercitationem illo, itaque maiores non vitae?
            </p>
            <p <?= aos_animacion(); ?>  class="devwebcamp__texto">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolorem, eos fugit nesciunt perferendis rerum voluptate. Accusamus dolorum in necessitatibus placeat veritatis! A eveniet exercitationem illo, itaque maiores non vitae?
            </p>
        </div>
    </div>
</main>