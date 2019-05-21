<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvionRepository")
 */
class Avion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motorisation;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacite;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlacesPremium;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlacesBusiness;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlacesEco;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Vol", mappedBy="avion", cascade={"persist", "remove"})
     */
    private $vol;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getMotorisation(): ?string
    {
        return $this->motorisation;
    }

    public function setMotorisation(?string $motorisation): self
    {
        $this->motorisation = $motorisation;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getNbPlacesPremium(): ?int
    {
        return $this->nbPlacesPremium;
    }

    public function setNbPlacesPremium(int $nbPlacesPremium): self
    {
        $this->nbPlacesPremium = $nbPlacesPremium;

        return $this;
    }

    public function getNbPlacesBusiness(): ?int
    {
        return $this->nbPlacesBusiness;
    }

    public function setNbPlacesBusiness(int $nbPlacesBusiness): self
    {
        $this->nbPlacesBusiness = $nbPlacesBusiness;

        return $this;
    }

    public function getNbPlacesEco(): ?int
    {
        return $this->nbPlacesEco;
    }

    public function setNbPlacesEco(int $nbPlacesEco): self
    {
        $this->nbPlacesEco = $nbPlacesEco;

        return $this;
    }

    public function getVol(): ?Vol
    {
        return $this->vol;
    }

    public function setVol(Vol $vol): self
    {
        $this->vol = $vol;

        // set the owning side of the relation if necessary
        if ($this !== $vol->getAvion()) {
            $vol->setAvion($this);
        }

        return $this;
    }

}
