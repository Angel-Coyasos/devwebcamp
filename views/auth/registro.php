<main class="auth">
    <h2 class="auth__heading"><?= $titulo; ?></h2>
    <p class="auth__texto">Registrate en DevWebcamp</p>

    <?php
        require_once __DIR__ . "/../templates/alertas.php";
    ?>

    <form action="/registro" method="post" class="formulario">

        <div class="formulario__campo">
            <label class="formulario__nombre" for="nombre">Nombre</label>
            <input type="nombre"
                   class="formulario__input"
                   placeholder="Tu Nombre"
                   id="nombre"
                   name="nombre"
                   value="<?= $usuario->nombre; ?>"
            />
        </div>

        <div class="formulario__campo">
            <label class="formulario__apellido" for="apellido">Apellido</label>
            <input type="apellido"
                   class="formulario__input"
                   placeholder="Tu Apellido"
                   id="apellido"
                   name="apellido"
                   value="<?= $usuario->apellido; ?>"
            />
        </div>


        <div class="formulario__campo">
            <label class="formulario__label" for="email">Email</label>
            <input type="email"
                   class="formulario__input"
                   placeholder="Tu Email"
                   id="email"
                   name="email"
                   value="<?= $usuario->email; ?>"
            />
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="password">Password</label>
            <input type="password"
                   class="formulario__input"
                   placeholder="Tu Password"
                   id="password"
                   name="password"
            />
        </div>

        <div class="formulario__campo">
            <label class="formulario__label" for="password2">RepetirPassword</label>
            <input type="password"
                   class="formulario__input"
                   placeholder="Tu Password"
                   id="password2"
                   name="password2"
            />
        </div>

        <input type="submit" class="formulario__submit" value="Crear Cuenta">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? Inicia Sesion</a>
        <a href="/olvide" class="acciones__enlace">Olvidastes tu Password?</a>
    </div>
</main>