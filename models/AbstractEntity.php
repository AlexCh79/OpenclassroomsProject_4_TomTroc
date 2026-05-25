<?php

/*
* Classe AbstractEntity qui gère les constructeurs des classes objet
*/

abstract class AbstractEntity {
    // L'ID est -1 par défaut pour vérifier si l'entité est nouvelle ou non
    protected int $id = -1;

    // Setter et getter
    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    // Constructeurs des classes enfants
    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->hydrate($data);
        };
    }

    /**
     * Système d'hydratation de l'entité.
     * Permet de transformer les données d'un tableau associatif.
     * Les noms de champs de la table doivent correspondre aux noms des attributs de l'entité.
     * Les underscore sont transformés en camelCase (ex: date_creation devient setDateCreation).
     * @return void
     */
    protected function hydrate(array $data) : void 
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}