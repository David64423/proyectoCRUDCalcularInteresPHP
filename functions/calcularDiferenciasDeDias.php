<?php

    function calcularDiferenciasDeDias($fecha1,$fecha2){
        $fecha1In= new DateTime($fecha1);
        $fecha2In= new DateTime($fecha2);
        
        $diff= $fecha1In->diff($fecha2In);

        return $diff->days;

    }
    
?>