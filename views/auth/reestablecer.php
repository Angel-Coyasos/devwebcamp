<main class="auth">
    <h2 class="auth__heading"><?= $titulo; ?></h2>
    <p class="auth__texto">Coloca tu Nuevo Password</p>

    <?php
        require_once __DIR__ . "/../templates/alertas.php";
    ?>

    <?php if ($token_valido) : ?>

        <form method="post" class="formulario">

            <div class="formulario__campo">
                <label class="formulario__label" for="password">Password</label>
                <input type="password"
                       class="formulario__input"
                       placeholder="Tu Nuevo Password"
                       id="password"
                       name="password"
                />
            </div>

            <div class="formulario__campo">
                <label class="formulario__label" for="password2">RepetirPassword</label>
                <input type="password"
                       class="formulario__input"
                       placeholder="Comfirmar Tu Nuevo Password"
                       id="password2"
                       name="password2"
                />
            </div>

            <input type="submit" class="formulario__submit" value="Guardar Password">
        </form>

    <?php endif; ?>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? Inicia Sesion</a>
        <a href="/registro" class="acciones__enlace">¿Aun no tienes una cuenta? Obtener una</a>
    </div>
</main>