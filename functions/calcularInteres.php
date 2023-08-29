<?php
    function calcularInteres($monto,$porcentaje){
        $interesMonto= ($monto*$porcentaje)/100;
        $montoTotal=$monto+$interesMonto;

        return $montoTotal;
    }

?>