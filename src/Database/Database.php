<?php

namespace App\Database;

class Database {

    public function getConnection(): array {
        return [
            ["libelle" => "Clavier", "prix_ht" => 100, "quantite" => 2, "tva" => 0.20],
            ["libelle" => "Souris", "prix_ht" => 50, "quantite" => 1, "tva" => 0.10]
        ];
    }
}