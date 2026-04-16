<?php

namespace App\Controller;

use App\Service\CommandeService;

class CommandeController {

    private CommandeService $service;

    public function __construct(CommandeService $service) {
        $this->service = $service;
    }

    public function show(int $idCommande): array {
        return $this->service->calculerFacture($idCommande);
    }
}