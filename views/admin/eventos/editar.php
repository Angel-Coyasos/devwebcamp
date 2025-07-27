<h2 class="dashboard__heading"><?= $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/eventos" class="dashboard__boton">
        <i class="fa-solid fa-circle-plus"></i>
        Volver
    </a>
</div>

<div class="dashboard__formalario">
    <?php require_once __DIR__ . '/../../templates/alertas.php' ?>

    <form method="POST" class="formulario">

        <?php require_once __DIR__ . '/formulario.php' ?>

        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Guardar Cambios">
    </form>
</div>