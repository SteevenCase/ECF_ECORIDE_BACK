<?php

namespace App\Entity;

use App\Repository\CovoiturageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CovoiturageRepository::class)]
class Covoiturage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $placesRestantes = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuDepart = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuArrivee = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateDepart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateArrivee = null;

    #[ORM\Column]
    private ?\DateTime $heureDepart = null;

    #[ORM\Column]
    private ?\DateTime $heureArrivee = null;

    #[ORM\Column(length: 255)]
    private ?string $ecologique = null;

    #[ORM\ManyToOne(inversedBy: 'covoiturages')]
    private ?User $owner = null;

    #[ORM\ManyToOne(inversedBy: 'covoiturages_FK')]
    private ?Vehicule $vehicules_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlacesRestantes(): ?int
    {
        return $this->placesRestantes;
    }

    public function setPlacesRestantes(int $placesRestantes): static
    {
        $this->placesRestantes = $placesRestantes;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getLieuDepart(): ?string
    {
        return $this->lieuDepart;
    }

    public function setLieuDepart(string $lieuDepart): static
    {
        $this->lieuDepart = $lieuDepart;

        return $this;
    }

    public function getLieuArrivee(): ?string
    {
        return $this->lieuArrivee;
    }

    public function setLieuArrivee(string $lieuArrivee): static
    {
        $this->lieuArrivee = $lieuArrivee;

        return $this;
    }

    public function getDateDepart(): ?\DateTime
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTime $dateDepart): static
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getDateArrivee(): ?\DateTime
    {
        return $this->dateArrivee;
    }

    public function setDateArrivee(\DateTime $dateArrivee): static
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }

    public function getHeureDepart(): ?\DateTime
    {
        return $this->heureDepart;
    }

    public function setHeureDepart(\DateTime $heureDepart): static
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    public function getHeureArrivee(): ?\DateTime
    {
        return $this->heureArrivee;
    }

    public function setHeureArrivee(\DateTime $heureArrivee): static
    {
        $this->heureArrivee = $heureArrivee;

        return $this;
    }

    public function getEcologique(): ?string
    {
        return $this->ecologique;
    }

    public function setEcologique(string $ecologique): static
    {
        $this->ecologique = $ecologique;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    public function getVehiculesId(): ?Vehicule
    {
        return $this->vehicules_id;
    }

    public function setVehiculesId(?Vehicule $vehicules_id): static
    {
        $this->vehicules_id = $vehicules_id;

        return $this;
    }
}
