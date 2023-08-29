<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require "functions/conection.php";
        
        $conectionLlamarIntereses=conectar();
        $sqlLlamarIntereses="select * from intereses;";
        $resulsetTablaIntereses=mysqli_query($conectionLlamarIntereses,$sqlLlamarIntereses);

        while($registroTablaIntereses=mysqli_fetch_Assoc($resulsetTablaIntereses)){
            ?>
                    <form action="editarIntereses.php" method="POST">
                            <input style="display:none" type="number" name="id" value="<?php echo $registroTablaIntereses['id'] ?>">
                            <h4>Desde: <input type="number" step=1 name="desde" value="<?php echo $registroTablaIntereses['desde'] ?>"></h4>
                            <h4>Hasta: <input type="number" step=1 name="hasta" value="<?php echo $registroTablaIntereses['hasta'] ?>"></h4>

                            <h4>Interes: <input type="number" value="<?php echo $registroTablaIntereses['interes'] ?>" name="interes"step=1>%</h4>
                            <input type="submit" value="Editar Interes">
                    </form>
                    <br><br>
            <?php
        }
    ?>
    
</body>
</html>