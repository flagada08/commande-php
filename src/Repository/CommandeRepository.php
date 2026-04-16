<?php

namespace App\Repository;

use App\Database\Database;
use App\Entity\LigneCommande;

class CommandeRepository {

    private Database $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getLignesCommande(int $idCommande): array {

        $rows = $this->db->getConnection();
        $lines = [];

        foreach ($rows as $row) {
            $lines[] = new LigneCommande(
                $row["libelle"],
                $row["prix_ht"],
                $row["quantite"],
                $row["tva"]
            );
        }

        return $lines;
    }
}