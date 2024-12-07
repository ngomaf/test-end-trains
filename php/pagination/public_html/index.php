<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1); // 1

    require __DIR__ . "./../vendor/autoload.php";

    use Source\Models\Functionary;

    // get end sanitize the data of page in url (bugar e sonitizar o dado da pagina na url)
    $page = (isset($_GET['page']))? filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT): 1;
    $limit = 10;
    $bigin = ($page * $limit) - $limit;

    // get limited quantity of functionaries (buscar quantidade limitada de funcinários)
    $func = new Functionary;
    $funcList = $func->paginer($bigin, $limit);

    // total of pages (total de páginas)
    $totFunc = $func->total()->value;
    $pages = ceil($totFunc/$limit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP pagination - Paginação com PHP</title>
    <style>
        *{margin: 0; padding: 0; box-sizing: border-box; font: normal 14pt Tahoma, Verdana, Geneva, sans-serif;; line-height: 30px}

        body {background-color: #f1f1f1; color: #333;}
        main {width: 90%; margin: 30px auto;}
        main > h1 {margin-bottom: 30px; font-size: 24pt; font-weight: 600;}
        table {border-collapse: collapse; width: 100%;}
        table caption {font-weight: bold; margin-bottom: 15px; text-align: left;}
        table tr {border-bottom: 1px solid #ccc;}
        table thead tr {border-bottom: 2px solid #ccc;}
        table tbody tr:hover {background-color: pink;}
        table td {padding: 5px;; color: #666}
        table thead td {color: #333}
        .ctrl {margin-top: 25px;}
        .ctrl a {padding: 10px 15px; border: 1px solid #ccc; border-radius: 5px; text-decoration: none;}
        .ctrl a:hover {color: blue;}
        .ctrl span {padding: 10px 15px;}

        @media(min-width: 800px) {
            table {width: 70%;}
        }
    </style>
</head>
<body>
    <main>
        <h1>PHP pagination - Paginação com PHP</h1>

        <table>
            <caption>Functionaries list - Lista de funcionários (<?php echo $totFunc ?>)</caption>
            <colgroup>
                <col width="10%">
                <col width="60%">
                <col width="30%">
            </colgroup>

            <thead>
                <tr>
                    <td>#</td>
                    <td>Full name</td>
                    <td>Criation</td>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($funcList as $value): 
                    $bigin++
            ?>
                <tr>
                    <td><?php echo $bigin ?></td>
                    <td><?php echo $value->name ?></td>
                    <td><?php echo date("d.m.Y H:i:s", strtotime($value->created_at)) ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>

        <div class="ctrl">
            <a href="?page=1">Primeira</a>
            
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1 ?>"><<</a>
            <?php endif ?>

            <span><?php echo $page ?></span>
            
            <?php if ($page < $pages): ?>
                <a href="?page=<?php echo $page + 1 ?>">>></a>
            <?php endif ?>
            
            <a href="?page=<?php echo $pages ?>">Última</a>
        </div>
    </main>
</body>
</html>