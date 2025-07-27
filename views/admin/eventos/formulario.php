<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Evento</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Nombre Evento</label>
        <input type="text"
               class="formulario__input"
               name="nombre"
               placeholder="Nombre Evento"
               id="nombre"
               value="<?= $evento->nombre ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="descripcion">Descripcion Evento</label>
        <textarea class="formulario__input"
                  name="descripcion"
                  placeholder="Descripcion Evento"
                  id="descripcion"
                  rows="8" ><?= $evento->descripcion ?? '' ?></textarea>
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="categoria">Categoria o Tipo de Evento</label>
        <select class="formulario__select" name="categoria_id" id="categoria">
            <option value="" selected disabled>--Selecciona Una Categoria--</option>
            <?php foreach ($categorias as $categoria) : ?>
                <option <?= ($evento->categoria_id === $categoria->id) ? 'selected' : '' ?> value="<?= $categoria->id; ?>"><?= $categoria->nombre; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="dias_id">Seleccioanr el dia</label>

        <div class="formulario__radio">
            <?php foreach ($dias as $dia) : ?>
               <div>
                   <label for="<?= strtolower($dia->nombre) ?>"><?= $dia->nombre; ?></label>
                   <input type="radio"
                          name="dia"
                          id="<?= strtolower($dia->nombre) ?>"
                          value="<?= $dia->id; ?>"
                          <?= ($evento->dia_id === $dia->id) ? 'checked' : '' ?> >
               </div>
            <?php endforeach; ?>
        </div>

        <input type="hidden" name="dia_id" value="<?= $evento->dia_id; ?>">
    </div>

    <div id="hora" class="formulario__campo">
        <label class="formulario__label">Seleccionar Hora</label>

        <ul  id="horas" class="horas">
            <?php foreach ($horas as $hora) : ?>
                <li data-hora-id="<?= $hora->id; ?>" class="horas__hora horas__hora--deshabilitada"><?= $hora->hora; ?></li>
            <?php endforeach; ?>
        </ul>
        <input type="hidden" name="hora_id" value="<?= $evento->hora_id; ?>">
    </div>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Extra</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="ponentes">Ponente</label>
        <input type="text"
               class="formulario__input"
               placeholder="Buscar Ponente"
               id="ponentes">
        <ul id="listado-ponentes" class="listado-ponentes"></ul>

        <input type="hidden" name="ponente_id" value="<?= $evento->ponente_id; ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="disponibles">Lugares Disponibles</label>
        <input type="number"
               min="1"
               class="formulario__input"
               placeholder="Ej. 20"
               name="disponibles"
               id="disponibles"
               value="<?= $evento->disponibles; ?>">
    </div>

</fieldset>