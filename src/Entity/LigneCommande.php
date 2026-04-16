<?php

namespace App\Entity;

class LigneCommande {

    private string $libelle;
    private float $prix_ht;
    private int $quantite;
    private float $tva;

    public function __construct(string $libelle, float $prix_ht, int $quantite, float $tva) {
        $this->libelle = $libelle;
        $this->prix_ht = $prix_ht;
        $this->quantite = $quantite;
        $this->tva = $tva;
    }

    public function getLibelle(): string {
        return $this->libelle;
    }

    public function getPrixHT(): float {
        return $this->prix_ht;
    }

    public function getQuantite(): int {
        return $this->quantite;
    }

    public function getTVA(): float {
        return $this->tva;
    }

    public function getTotalHT(): float {
        return $this->prix_ht * $this->quantite;
    }
}