<?php

    // function convertirHora ($valorSegundos){
    //     $horas = floor($valorSegundos/3600);
    //     $minutos = round(($valorSegundos/3600 - floor($valorSegundos/3600))*60,0);
    //     $horas < 10 ? $horas = "0" . $horas : $horas;
    //     $minutos < 10 ? $minutos = "0" . $minutos : $minutos;
    //     return $horas . ":". $minutos;
    // }

    // function convertirSegundos ($valorHora){
    //     $horas = intval(substr($valorHora, 0, -3))*3600;
    //     $minutos = intval(substr($valorHora, strpos($valorHora, ":")+1, 2))*60;
    //     return $horas + $minutos;
    // }

    
    function calculoSla ($estado, $sla, $duracion){
        
        if ($estado == 'ANULADO') {
            $resultado = "N.A.";
        } else if ($duracion > $sla) {
            $resultado = "FUERA";
        } else {
            $resultado = "DENTRO";
        }

        return $resultado;
    }
