<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prova 2 Bimestre</title>
</head>


<?php
    function print_td($data_csv){
        echo "<tr>";
        echo "<td> $data_csv[0]</td>";
        echo "<td> $data_csv[1]</td>";
        echo "<td> $data_csv[2]</td>"; 
        echo "</tr>";       
    }
    function scan_csv(){
        $arq = fopen("data/violencia-domestica-df.csv", "r");
        $d = fgetcsv($arq);
        return $d;
    }
?>


    
<body>
    <div id="outputs">
        <table id="output">
            <thead>
                <td>Violencia Domestica</td>
            </thead>
            <?php
                

            ?>
                


        </table>
    </div>
</body>

</html>