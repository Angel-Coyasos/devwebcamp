<h2 class="dashboard__heading"><?= $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/ponentes" class="dashboard__boton">
        <i class="fa-solid fa-circle-plus"></i>
        Volver
    </a>
</div>

<div class="dashboard__formalario">
    <?php require_once __DIR__ . '/../../templates/alertas.php' ?>

    <form action="/admin/ponentes/crear" method="POST" class="formulario" enctype="multipart/form-data">

        <?php require_once __DIR__ . '/formulario.php' ?>

        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Registrar Ponente">
    </form>
</div>