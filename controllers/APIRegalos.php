<?php

namespace Controllers;

use Model\Categoria;
use Model\Evento;
use Model\EventoHorario;
use Model\Dia;
use Model\Hora;
use Model\Regalo;
use Model\Registro;
use MVC\Router;

class APIRegalos {

    public static function index() {

        if (!is_admin()) {
            echo json_encode([]);
            return;
        }

        $regalos = Regalo::all();

        foreach ($regalos as $regalo) {
            $regalo->total = Registro::totalArray( ['regalo_id' => $regalo->id, 'paquete_id' => "1"] );
        }

        echo json_encode($regalos);
        return;
    }

}