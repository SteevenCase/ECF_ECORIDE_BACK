<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $immatriculation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_immatriculation = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $couleur = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $places_disponibles = null;

    #[ORM\Column(length: 255)]
    private ?string $preferences = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Covoiturage>
     */
    #[ORM\OneToMany(targetEntity: Covoiturage::class, mappedBy: 'vehicule')]
    private Collection $covoiturages_FK;

    #[ORM\ManyToOne(inversedBy: 'vehicule')]
    private ?User $users_FK = null;

    public function __construct()
    {
        $this->covoiturages_FK = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): static
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getDateImmatriculation(): ?\DateTime
    {
        return $this->date_immatriculation;
    }

    public function setDateImmatriculation(\DateTime $date_immatriculation): static
    {
        $this->date_immatriculation = $date_immatriculation;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getPlacesDisponibles(): ?int
    {
        return $this->places_disponibles;
    }

    public function setPlacesDisponibles(int $places_disponibles): static
    {
        $this->places_disponibles = $places_disponibles;

        return $this;
    }

    public function getPreferences(): ?string
    {
        return $this->preferences;
    }

    public function setPreferences(string $preferences): self
    {
        $this->preferences = $preferences;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Covoiturage>
     */
    public function getCovoituragesFK(): Collection
    {
        return $this->covoiturages_FK;
    }

    public function addCovoituragesFK(Covoiturage $covoituragesFK): static
    {
        if (!$this->covoiturages_FK->contains($covoituragesFK)) {
            $this->covoiturages_FK->add($covoituragesFK);
            $covoituragesFK->setVehicule($this);
        }

        return $this;
    }

    public function removeCovoituragesFK(Covoiturage $covoituragesFK): static
    {
        if ($this->covoiturages_FK->removeElement($covoituragesFK)) {
            // set the owning side to null (unless already changed)
            if ($covoituragesFK->getVehicule() === $this) {
                $covoituragesFK->setVehicule(null);
            }
        }

        return $this;
    }

    public function getUsersFK(): ?User
    {
        return $this->users_FK;
    }

    public function setUsersFK(?User $users_FK): self
    {
        $this->users_FK = $users_FK;

        return $this;
    }
}
