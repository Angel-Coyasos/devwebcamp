<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Personal</legend>

    <div class="formulario__campo">
        <labe class="formulario__label" for="nombre">Nombre</labe>
        <input type="text"
               class="formulario__input"
                name="nombre"
                placeholder="Nombre Ponente"
                id="nombre"
                value="<?= $ponente->nombre ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <labe class="formulario__label" for="apellido">Apellido</labe>
        <input type="text"
               class="formulario__input"
               name="apellido"
               placeholder="Apellido Ponente"
               id="apellido"
               value="<?= $ponente->apellido ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <labe class="formulario__label" for="ciudad">Ciudad</labe>
        <input type="text"
               class="formulario__input"
               name="ciudad"
               placeholder="Ciudad Ponente"
               id="ciudad"
               value="<?= $ponente->ciudad ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <labe class="formulario__label" for="pais">Country</labe>
        <input type="text"
               class="formulario__input"
               name="pais"
               placeholder="Pais Ponente"
               id="pais"
               value="<?= $ponente->pais ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <labe class="formulario__label" for="imagen">Imagen</labe>
        <input type="file"
               class="formulario__input formulario__input--file"
               name="imagen"
               id="imagen">
    </div>

    <?php if (isset($ponente->imagen_actual) ) : ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">

            <picture>
                <source srcset="<?= $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen_actual; ?>.webp" type="image/webp">
                <source srcset="<?= $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen_actual; ?>.png" type="image/png">

                <img src="<?= $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen_actual; ?>.png" alt="Imagen Ponente">
            </picture>
        </div>
    <?php endif; ?>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Extra</legend>

    <div class="formulario__campo">
        <labe class="formulario__label" for="tags_input">Areas de Experiencia (separadas por comas)</labe>
        <input type="text"
               class="formulario__input"
               name="tags_input"
               placeholder="Ej. Node.js, PHP, CSS, Laravel, UX / UI"
               id="tags_input">

        <div id="tags" class="formulario__listado"></div>
        <input name="tags" type="hidden" value="<?= $ponente->tags ?? '' ?>">
    </div>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">

            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input type="text"
                   class="formulario__input--sociales"
                   name="redes[facebook]"
                   placeholder="Facebook"
                   value="<?= $redes->facebook ?? '' ?>">

        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">

            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input type="text"
                   class="formulario__input--sociales"
                   name="redes[twitter]"
                   placeholder="Twitter"
                   value="<?= $redes->twitter ?? '' ?>">

        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">

            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input type="text"
                   class="formulario__input--sociales"
                   name="redes[youtube]"
                   placeholder="Youtube"
                   value="<?= $redes->youtube ?? '' ?>">

        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">

            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input type="text"
                   class="formulario__input--sociales"
                   name="redes[instagram]"
                   placeholder="Instagram"
                   value="<?= $redes->instagram ?? '' ?>">

        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">

            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input type="text"
                   class="formulario__input--sociales"
                   name="redes[tiktok]"
                   placeholder="Tiktok"
                   value="<?= $redes->tiktok ?? '' ?>">

        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">

            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input type="text"
                   class="formulario__input--sociales"
                   name="redes[github]"
                   placeholder="GitHub"
                   value="<?= $redes->github ?? '' ?>">

        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">

            <div class="formulario__icono">
                <i class="fa-brands fa-linkedin"></i>
            </div>
            <input type="text"
                   class="formulario__input--sociales"
                   name="redes[linkedin]"
                   placeholder="Linkedin"
                   value="<?= $redes->linkedin ?? '' ?>">

        </div>
    </div>
</fieldset>