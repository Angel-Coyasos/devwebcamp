<?php

namespace Classes;

class Paginacion
{

    public $pagina_actual;
    public $registros_por_pagina;
    public $total_registros;

    public function __construct($pagina_actual =1, $registros_por_pagina = 10, $total_registros = 0)
    {
        $this->pagina_actual = (int) $pagina_actual;
        $this->registros_por_pagina = (int) $registros_por_pagina;
        $this->total_registros = (int) $total_registros;
    }

    // Se encarga de en base a la pagina calcular el rango de registros a mostrar
    public function offset()
    {
        // Ej registros por pagina = 10 pagina actual = 2
        // 10 * (2-1)
        // 10 * 1 = 10, se mostarara del regitsro 10 - 20
        return $this->registros_por_pagina * ($this->pagina_actual - 1);
    }

    // Calcula el total de paginas
    public function total_paginas()
    {
        // Ej 20 regitsros, lo dividemos por los regitros por pagina
        // 20 / 5 = 4
        return ceil($this->total_registros / $this->registros_por_pagina); //ceil redondea hacia arriva
    }

    // Devuelve la pagina anterior, siempre que sea mayor a 0
    public function pagina_anterior()
    {
        $anterior = $this->pagina_actual - 1;
        return ($anterior > 0) ? $anterior : false;
    }

    // Devuelve la pagina sigueinte, siempre qeu no sea mayor al total de paginas
    public function pagina_siguiente()
    {
        $siguiente = $this->pagina_actual + 1;
        return ($siguiente <= $this->total_paginas()) ? $siguiente : false;
    }

    // Crea el enlace html para las paginas nateriores, no se muestra cuando no hay paginas anteriores
    public function enlace_anterior()
    {
        $html = '';
        if ( $this->pagina_anterior() ) {
            $html .= "<a class='paginacion__enlace paginacion__enlace--texto' href='?page={$this->pagina_anterior()}'>&laquo; Anterior</a>";
        }
        return $html;
    }

    // crea le enlace a las paginas sigueites, no se muestra cuando no hay mas paginas a la cual seguir
    public function enlace_siguiente()
    {
        $html = '';
        if ( $this->pagina_siguiente() ) {
            $html .= "<a class='paginacion__enlace paginacion__enlace--texto' href='?page={$this->pagina_siguiente()}'>Siguiente &raquo;</a>";
        }
        return $html;
    }

    // generar numero ene paginacion
    public function numeros_paginas()
    {
        $html = '';
        for ($i = 1; $i <= $this->total_paginas(); $i++) {
            if ($i === $this->pagina_actual) {
                $html .= "<span class='paginacion__enlace paginacion__enlace--actual'>{$i}</span>";
            } else {
                $html .= "<a class='paginacion__enlace paginacion__enlace--numero' href='?page={$i}'>{$i}</a>";
            }

        }
        return $html;
    }

    // crear los botones sigueinte y anterior, segun la logica previamente definida
    public function paginacion()
    {
        $html = '';
        if ( $this->total_registros > 1 ) {
            $html .= "<div class='paginacion'>";
            $html .= $this->enlace_anterior();
            $html .= $this->numeros_paginas();
            $html .= $this->enlace_siguiente();
            $html .= "</div>";
        }
        return $html;
    }

}