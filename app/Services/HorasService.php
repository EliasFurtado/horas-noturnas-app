<?php

namespace App\Services;
class HorasService {
    function horasService($inicio, $fim) {
        $inicioHorasNoturnas = '22:00';
        $fimHorasNoturnas = '05:00';
    
        $inicioEmSegundos = strtotime($inicio);
        $fimEmSegundos = strtotime($fim);
            
        $inicioHorasNoturnasEmSegundos = strtotime($inicioHorasNoturnas);
        $fimHorasNoturnasEmSegundos = strtotime($fimHorasNoturnas);
        
        $horasDiurnas = 0;
        $horasNoturnas = 0;
            
        if ($inicioEmSegundos >= $inicioHorasNoturnasEmSegundos &&
            $fimEmSegundos <= $fimHorasNoturnasEmSegundos
        ) {
            //inicio e fim entre 22:00 e 05:00
            $horasNoturnas = $fimEmSegundos - $inicioEmSegundos;

        } else if ($inicioEmSegundos < $inicioHorasNoturnasEmSegundos &&
            $inicioEmSegundos > $fimHorasNoturnasEmSegundos &&
            $fimEmSegundos < $fimHorasNoturnasEmSegundos || 
            $inicioEmSegundos < $inicioHorasNoturnasEmSegundos &&
            $inicioEmSegundos > $fimHorasNoturnasEmSegundos &&
            $fimEmSegundos > $inicioHorasNoturnasEmSegundos
        ) {
            //inicio entre 06:00 e 21:00 e fim entre 22:00 e 05:00
            $horasDiurnas = $inicioHorasNoturnasEmSegundos - $inicioEmSegundos;
            $horasNoturnas = ($fimEmSegundos - $inicioEmSegundos) - $horasDiurnas;

        } else if ($inicioEmSegundos < $inicioHorasNoturnasEmSegundos &&
            $inicioEmSegundos > $fimHorasNoturnasEmSegundos &&
            $fimEmSegundos < $inicioHorasNoturnasEmSegundos &&
            $fimEmSegundos > $fimHorasNoturnasEmSegundos &&
            $fimEmSegundos < $inicioEmSegundos
        ) {
            //inicio entre 12:00 e 21:00 e fim entre 06:00 e 11:00
            $horasDiurnas = ($inicioHorasNoturnasEmSegundos - $inicioEmSegundos) + ($fimEmSegundos - $fimHorasNoturnasEmSegundos);
            $horasNoturnas = ($fimEmSegundos - $inicioEmSegundos) - $horasDiurnas ;

        } else if ($inicioEmSegundos < $inicioHorasNoturnasEmSegundos &&
            $inicioEmSegundos > $fimHorasNoturnasEmSegundos &&
            $fimEmSegundos < $inicioHorasNoturnasEmSegundos &&
            $fimEmSegundos > $fimHorasNoturnasEmSegundos 
        ) {
            //inicio entre 06:00 e 21:00 e fim entre 06:00 e 21:00
            $horasDiurnas = $fimEmSegundos - $inicioEmSegundos;

        } else if ($inicioEmSegundos >= $inicioHorasNoturnasEmSegundos &&
            $fimEmSegundos > $fimHorasNoturnasEmSegundos &&
            $fimEmSegundos < $inicioHorasNoturnasEmSegundos ||
            $inicioEmSegundos <= $fimHorasNoturnasEmSegundos &&
            $fimEmSegundos > $fimHorasNoturnas &&
            $fimEmSegundos < $inicioHorasNoturnas
        ) {
            //inicio entre 22:00 e 05:00 e fim entre 06:00 e 21:00
            $horasDiurnas = $fimEmSegundos - $fimHorasNoturnasEmSegundos;
            $horasNoturnas = ($fimEmSegundos - $inicioEmSegundos) - $horasDiurnas;

        };
        return ['horasDiurnas'=>gmdate('H:i',$horasDiurnas), 'horasNoturnas'=>gmdate('H:i',$horasNoturnas)];
    }
}
