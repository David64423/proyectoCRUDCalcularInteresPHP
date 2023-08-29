<?php
    require "functions/conection.php";
    $id=$_POST["id"];
    $desde=$_POST["desde"];
    $hasta=$_POST["hasta"];
    $interes=$_POST["interes"];
    
    $conectionEditarInteres1=conectar();
    $conectionEditarInteres2=conectar();
    $conectionEditarInteres3=conectar();
    $sqlEditarInteres1="update intereses set desde=$desde where id=$id;";
    $sqlEditarInteres2="update intereses set hasta=$hasta where id=$id;";
    $sqlEditarInteres3="update intereses set interes=$interes where id=$id;";
    
    mysqli_query($conectionEditarInteres1,$sqlEditarInteres1);
    mysqli_query($conectionEditarInteres2,$sqlEditarInteres2);
    mysqli_query($conectionEditarInteres3,$sqlEditarInteres3);

    header("location:index.php");
?>