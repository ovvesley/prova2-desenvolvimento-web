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
$arq = fopen("data/violencia-domestica-df.csv", "r");
$d = fgetcsv($arq);
$get_ano = $_GET['ano'];
$post_localidade = $_POST['localidade'];

function print_td($data_csv, $ano)
{
    if ($ano) {
        $indice = $ano - 2010;
        echo "<tr>";
        echo "<td> $data_csv[0]</td>";
        echo "<td> $data_csv[$indice]</td>";
        echo "</tr>";
    }
}
function print_td_post($data_csv)
{
    echo "<tr>";
    echo "<td> $data_csv[0]</td>";
    echo "<td> $data_csv[1]</td>";
    echo "<td> $data_csv[2]</td>";
    echo "<td> $data_csv[3]</td>";
    echo "<td> $data_csv[4]</td>";
    echo "<td> $data_csv[5]</td>";
    echo "<td> $data_csv[6]</td>";
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
    echo "<thead>";
    echo "<th> $data_csv[0]</th>";
    echo "<th> $data_csv[$indice]</th>";
    echo "</thead>";
}
function print_th_post($data_csv)
{
    echo "<thead>";
    echo "<th> $data_csv[0]</th>";
    echo "<th> $data_csv[1]</th>";
    echo "<th> $data_csv[2]</th>";
    echo "<th> $data_csv[3]</th>";
    echo "<th> $data_csv[4]</th>";
    echo "<th> $data_csv[5]</th>";
    echo "<th> $data_csv[6]</th>";
    echo "</thead>";
}

function search_localidade($busca, $data, $arq)
{
    $indexI = 0;
    while ($data) {
        if ($indexI != 0) {
            if ($busca == $data[0]) {
                
                return $data;
            }
        }
        $indexI += 1;
        $data = fgetcsv($arq);
    }
}


?>

<body>
    <div class="inputs">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="localidade" class="input" id="a-input">
            <input type="submit" value="buscar" id="btn">
        </form>
    </div>

    <div id="outputs">
        <table id="output">
            <?php            
            $data = $d;
            if ($get_ano) {
                print_th($d, $get_ano);
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
            if ($post_localidade) {
                $data_find = search_localidade($post_localidade, $data, $arq);
                for ($i=1; $i < count($data_find) ; $i++) { 
                    $valor += $data_find[$i];
                                }
                print_th_post($data);
                print_td_post($data_find);
            }

            fclose($arq);
            ?>
        </table>
    </div>
    <div>
        <h3>Somatorio dos casos: <?php echo $valor; ?></h1>
    </div>
</body>

</html>