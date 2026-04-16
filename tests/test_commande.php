<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;
use App\Repository\CommandeRepository;
use App\Service\CommandeService;

$db = new Database();
$repo = new CommandeRepository($db);
$service = new CommandeService($repo);

$result = $service->calculerFacture(1);

assert($result["totals"]["ht"] == 250);
assert($result["totals"]["ttc"] == 270); // après remise

echo "✅ Tests OK";