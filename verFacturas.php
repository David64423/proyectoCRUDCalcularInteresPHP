<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/verFacturas.css">
</head>
<body>
    <?php
        require "functions/conection.php";
        require "functions/calcularInteres.php";
        require "functions/calcularDiferenciasDeDias.php";

        $hoy= new DateTime();
        $hoy= $hoy->format("Y-m-d");
        

        $sqlBuscarIntereses="select * from intereses;";
        $sqlBuscarFacturas="select * from facturas;";
        
        $conectionBuscarIntereses=conectar();
        $conectionBuscarFacturas=conectar();

        $resulsetTablaIntereses=mysqli_query($conectionBuscarIntereses,$sqlBuscarIntereses);

        $resulsetTablaFacturas=mysqli_query($conectionBuscarFacturas,$sqlBuscarFacturas);

        $interes=0;
    ?>

    <main>
        <table>
            <tr>
                <th>Id</th>
                <th>Emision</th>
                <th>Vencimiento</th>
                <th>Monto</th>
                <th>Dias Vencido</th>
                <th>Interes(%)</th>
                <th>Monto Final</th>
            </tr>
            <?php
            while($registroFacturas=mysqli_fetch_assoc($resulsetTablaFacturas)){
                ?>
                    <tr>
                        <td><?php echo $registroFacturas['fact_id'] ?></td>
                        <td><?php echo $registroFacturas['fechaEmision'] ?></td>
                        <td><?php echo $registroFacturas['fechaVencimiento'] ?></td>
                        <td><?php echo $registroFacturas['monto'] ?></td>

                        <td>
                            
                            <?php
                            // DE ACA PARA ABAJO SE CARGA EL CAMPO DIAS VENCIDO 
                            if(calcularDiferenciasDeDias($registroFacturas['fechaEmision'],$hoy)>30){
                                $DiasVencido = calcularDiferenciasDeDias($registroFacturas['fechaEmision'],$hoy);
                                $DiasVencido=$DiasVencido-30;
                                
                                echo $DiasVencido;
                            }
                            else{
                                echo 0;
                            }

                            //DE ACA PARA ARRIBA SE CARGA EL CAMPO "DIAS VENCIDO"
                            ?>
                        </td>



                        <td>
                            <?php
                                //DE ACA PARA ABAJO SE CARGA EL CAMPO "interes"
                                $resulsetTablaIntereses=mysqli_query($conectionBuscarIntereses,$sqlBuscarIntereses);
                                

                                if(calcularDiferenciasDeDias($registroFacturas['fechaEmision'],$hoy)>30 ){
                                    $diferenciaDiasInteres=calcularDiferenciasDeDias($registroFacturas['fechaEmision'],$hoy);
                                    $diferenciaDiasInteres=$diferenciaDiasInteres-30;
                                    
                                    while($registroIntereses=mysqli_fetch_assoc($resulsetTablaIntereses)){
                                    
                                    
                                    
                                         if($diferenciaDiasInteres>=$registroIntereses["desde"] && $diferenciaDiasInteres<=$registroIntereses["hasta"]){
                                            
                                            $interes=$registroIntereses["interes"];
                                            
                                            echo $interes;
                                        }
                                    }

                                }
                                else{
                                    echo "Sin interes";
                                }

                                //DE ACA PARA ARRIBA SE CARGA EL CAMPO "interes"
                            ?>
                        </td>
                                
                                

                        <td>

                        <?php

                                    if(calcularDiferenciasDeDias($registroFacturas['fechaEmision'],$hoy)>30){
                                        echo calcularInteres($registroFacturas["monto"],$interes);
                                    }

                                    else{
                                        echo $registroFacturas["monto"];
                                    }

                                ?>
                            
                        </td>

                            



                    </tr>
                <?php
            }

            ?>
        </table>
    </main>
</body>
</html>