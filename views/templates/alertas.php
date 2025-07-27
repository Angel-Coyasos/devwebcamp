<?php
    foreach ($alertas as $key => $alerta) :
        foreach ($alerta as $mensaje) :
?>
    <div class="alerta alerta--<?= $key; ?>"><?= $mensaje; ?></div>
<?php
        endforeach;
    endforeach;
?>


