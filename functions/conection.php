<?php

function conectar(){
    $serv="localhost";
    $usr="root";
    $pss="";
    $bd="proyectoInteres";

    $c=mysqli_connect($serv, $usr, $pss, $bd) or die("No se pudo conectar a la base de datos");
    return $c;
}//fin conexion