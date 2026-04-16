<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Database\Database;
use App\Repository\CommandeRepository;
use App\Service\CommandeService;
use App\Controller\CommandeController;

$db = new Database();
$repo = new CommandeRepository($db);
$service = new CommandeService($repo);
$controller = new CommandeController($service);

$data = $controller->show(1);

$lines = $data["lines"];
$totals = $data["totals"];

?>

<!DOCTYPE html>
<html>
<body>

<h2>Facture</h2>

<table border="1">
<?php foreach ($lines as $line): ?>
<tr>
    <td><?= $line->getLibelle() ?></td>
    <td><?= $line->getPrixHT() ?></td>
    <td><?= $line->getQuantite() ?></td>
    <td><?= $line->getTotalHT() ?></td>
</tr>
<?php endforeach; ?>
</table>

<hr>

TTC : <?= $totals["ttc"] ?> €

</body>
</html>