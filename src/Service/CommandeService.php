<?php

namespace App\Service;

use App\Repository\CommandeRepository;

class CommandeService {

    private CommandeRepository $repo;

    public function __construct(CommandeRepository $repo) {
        $this->repo = $repo;
    }

    public function calculerFacture(int $idCommande): array {

        $lines = $this->repo->getLignesCommande($idCommande);

        $totalHT = 0;

        foreach ($lines as $line) {
            $totalHT += $line->getTotalHT();
        }

        $remise = $totalHT * 0.10;
        $htNet = $totalHT - $remise;
        $tva = $htNet * 0.20;

        return [
            "lines" => $lines,
            "totals" => [
                "ht" => $totalHT,
                "remise" => $remise,
                "ht_net" => $htNet,
                "tva" => $tva,
                "ttc" => $htNet + $tva
            ]
        ];
    }
}