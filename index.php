<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css">
    <title>Prova 2 Bimestre</title>
</head>
<?php
$get_ano = $_GET['ano'];
function print_td($data_csv, $ano)
{
    $indice = $ano - 2010;
    echo ($indice);
    echo "<tr>";
    echo "<td> $data_csv[0]</td>";
    echo "<td> $data_csv[$indice]</td>";
    echo "</tr>";
}
function soma_casos($data_csv, $ano)
{
    $indice = $ano - 2010;
    return (int) $data_csv[$indice];
}
function print_th($data_csv, $ano)
{
    $indice = $ano - 2010;
    echo ($indice);
    echo "<thead>";
    echo "<th> $data_csv[0]</th>";
    echo "<th> $data_csv[$indice]</th>";
    echo "</thead>";
}


$arq = fopen("data/violencia-domestica-df.csv", "r");
$d = fgetcsv($arq);
?>

<body>
    <div id="outputs">
        <table id="output">
            <?php
            print_th($d, $get_ano);

            $data = $d;
            
            if ($get_ano) {
                $indexI = 0;
                while ($data) {
                    if ($indexI != 0) {
                        print_td($data, $get_ano);
                        $valor += soma_casos($data, $get_ano);
                    }
                    $data = fgetcsv($arq);
                    $indexI += 1;
                }
            }
            fclose($arq);
            ?>
        </table>
    </div>
</body>

</html>