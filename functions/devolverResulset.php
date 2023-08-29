<?php

    function devolverResulset($c, $sql){
        return mysqli_query($c,$sql);
    }
?>