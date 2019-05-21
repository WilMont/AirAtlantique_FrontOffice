<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VolRepository")
 */
class Vol
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DepartTheorique;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $departReel;

    /**
     * @ORM\Column(type="datetime")
     */
    private $arriveeTheorique;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $arriveeReelle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Aeroport", inversedBy="vols")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aeroportDepart;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Aeroport", inversedBy="vols")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aeroportArrivee;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Avion", inversedBy="vol", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $avion;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $prixEco;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $prixBusiness;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $prixPremium;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="vol")
     */
    private $billets;

    public function __construct()
    {
        $this->billets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartTheorique(): ?\DateTimeInterface
    {
        return $this->DepartTheorique;
    }

    public function setDepartTheorique(\DateTimeInterface $DepartTheorique): self
    {
        $this->DepartTheorique = $DepartTheorique;

        return $this;
    }

    public function getDepartReel(): ?\DateTimeInterface
    {
        return $this->departReel;
    }

    public function setDepartReel(?\DateTimeInterface $departReel): self
    {
        $this->departReel = $departReel;

        return $this;
    }

    public function getArriveeTheorique(): ?\DateTimeInterface
    {
        return $this->arriveeTheorique;
    }

    public function setArriveeTheorique(\DateTimeInterface $arriveeTheorique): self
    {
        $this->arriveeTheorique = $arriveeTheorique;

        return $this;
    }

    public function getArriveeReelle(): ?\DateTimeInterface
    {
        return $this->arriveeReelle;
    }

    public function setArriveeReelle(?\DateTimeInterface $arriveeReelle): self
    {
        $this->arriveeReelle = $arriveeReelle;

        return $this;
    }

    public function getAeroportDepart(): ?Aeroport
    {
        return $this->aeroportDepart;
    }

    public function setAeroportDepart(?Aeroport $aeroportDepart): self
    {
        $this->aeroportDepart = $aeroportDepart;

        return $this;
    }

    public function getAeroportArrivee(): ?Aeroport
    {
        return $this->aeroportArrivee;
    }

    public function setAeroportArrivee(?Aeroport $aeroportArrivee): self
    {
        $this->aeroportArrivee = $aeroportArrivee;

        return $this;
    }

    public function getAvion(): ?Avion
    {
        return $this->avion;
    }

    public function setAvion(Avion $avion): self
    {
        $this->avion = $avion;

        return $this;
    }

    public function getPrixEco()
    {
        return $this->prixEco;
    }

    public function setPrixEco($prixEco): self
    {
        $this->prixEco = $prixEco;

        return $this;
    }

    public function getPrixBusiness()
    {
        return $this->prixBusiness;
    }

    public function setPrixBusiness($prixBusiness): self
    {
        $this->prixBusiness = $prixBusiness;

        return $this;
    }

    public function getPrixPremium()
    {
        return $this->prixPremium;
    }

    public function setPrixPremium($prixPremium): self
    {
        $this->prixPremium = $prixPremium;

        return $this;
    }

    /**
     * @return Collection|Billet[]
     */
    public function getBillets(): Collection
    {
        return $this->billets;
    }

    public function addBillet(Billet $billet): self
    {
        if (!$this->billets->contains($billet)) {
            $this->billets[] = $billet;
            $billet->setVol($this);
        }

        return $this;
    }

    public function removeBillet(Billet $billet): self
    {
        if ($this->billets->contains($billet)) {
            $this->billets->removeElement($billet);
            // set the owning side to null (unless already changed)
            if ($billet->getVol() === $this) {
                $billet->setVol(null);
            }
        }

        return $this;
    }
}
