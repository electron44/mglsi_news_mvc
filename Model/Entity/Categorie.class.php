<?php

require_once('../assets/Utilities/HydratationTrait.php');

/**
 * 
 * @author med - electron - rango cheikh
 * @since 08/07/19
 * @version 1.0
 * 
 * 
 */
class Categorie 
{
    use HydratationTrait;

    private $id;
    private $libelle;

    public function __construct(Array $data)
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
}