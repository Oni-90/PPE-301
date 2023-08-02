<?php

namespace App\Entity;

use App\Repository\PresenceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Proffesseur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

#[ORM\Entity(repositoryClass: PresenceRepository::class)]
class Presence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $present = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HeureEntree = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $HeureSortie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isPresent(): ?bool
    {
        return $this->present;
    }

    public function setPresent(bool $present): self
    {
        $this->present = $present;

        return $this;
    }


    public function getHeureEntree(): ?\DateTimeInterface
    {
        return $this->HeureEntree;
    }

    public function setHeureEntree(\DateTimeInterface $HeureEntree): static
    {
        $this->HeureEntree = $HeureEntree;

        return $this;
    }

    public function getHeureSortie(): ?\DateTimeInterface
    {
        return $this->HeureSortie;
    }

    public function setHeureSortie(?\DateTimeInterface $HeureSortie): static
    {
        $this->HeureSortie = $HeureSortie;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

/**
     * @ORM\ManyToOne(targetEntity=Proffesseur::class, inversedBy="presences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $proffesseur;
   
    // ...
    /**
    * Get the associated Proffesseur
    *
    * @return Proffesseur|null
    */
    public function getProffesseur(): ?Proffesseur
    {
        return $this->proffesseur;
    }
    public function setProffesseur($proffesseur) {
        $this->proffesseur = $proffesseur;
    }


}