<?php

    function convertirHora ($valorSegundos){
        $horas = floor($valorSegundos/3600);
        // $minutos = ($valorSegundos/3600 - floor($valorSegundos/3600))*60;
        $minutos = round(($valorSegundos/3600 - floor($valorSegundos/3600))*60,0);
        $horas < 10 ? $horas = "0" . $horas : $horas;
        $minutos < 10 ? $minutos = "0" . $minutos : $minutos;
        // return $minutos .'|' . $minutos2;
        return $horas . ":". $minutos;
    }

    function convertirSegundos ($valorHora){

        $horas = intval(substr($valorHora, 0, -3))*3600;
        $minutos = intval(substr($valorHora, strpos($valorHora, ":")+1, 2))*60;
        return $horas + $minutos;

    }

    // convertirSegundos($valor) {
    //     let $mitad = $valor.indexOf(':');
    //     let $hora = $valor.substr(0, parseInt($mitad,10));
    //     let $minuto = $valor.substr(parseInt($mitad,10)+1, 2);
    //     return (parseInt($hora, 10) * 60 * 60) + (parseInt($minuto, 10) * 60);
    // },
