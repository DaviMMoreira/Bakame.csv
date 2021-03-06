<?php

use Bakame\Csv\Reader;

require '../vendor/autoload.php';

$inputCsv = new Reader('data/prenoms.csv');
$inputCsv->setDelimiter(';');
$inputCsv->setEncoding("iso-8859-15");

//get the header
$headers = $inputCsv->fetchOne(0);

//get at maximum 25 rows starting from the second 801th row
$res = $inputCsv->setOffset(800)->setLimit(25)->fetchAll();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="<?=$inputCsv->getEncoding()?>">
    <title>\Bakame\Csv\Reader simple usage</title>
    <link rel="stylesheet" href="example.css">
</head>
<body>
<h1>\Bakame\Csv\Reader simple usage</h1>
<table class="table-csv-data">
<caption>Part of the CSV from the 801th row with at most 25 rows</caption>
<thead>
    <tr>
        <th><?=implode('</th>'.PHP_EOL.'<th>', $headers), '</th>', PHP_EOL; ?>
    </tr>
</thead>
<tbody>
<?php foreach ($res as $row) : ?>
    <tr>
    <td><?=implode('</td>'.PHP_EOL.'<td>', $row), '</td>', PHP_EOL; ?>
    </tr>
    <?php
endforeach;
?>
</tbody>
</table>
</body>
</html>
