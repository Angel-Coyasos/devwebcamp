<?php

namespace Controllers;

use Model\Categoria;
use Model\Evento;
use Model\EventoHorario;
use Model\Dia;
use Model\Hora;
use MVC\Router;

class APIEventos {

    public static function index() {

        $dia_id = $_GET["dia_id"] ?? '';
        $categoria_id = $_GET["categoria_id"] ?? '';

        $dia_id = filter_var($dia_id, FILTER_VALIDATE_INT);
        $categoria_id = filter_var($categoria_id, FILTER_VALIDATE_INT);

        if (!$dia_id || !$categoria_id) {
            echo json_encode([]);
            return;
        }

        // Consultar DB
        $eventos = EventoHorario::whereArray(['dia_id' => $dia_id, 'categoria_id' => $categoria_id]) ?? [];
        echo json_encode($eventos);
    }

}