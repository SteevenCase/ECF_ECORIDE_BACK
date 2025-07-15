<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $commentaires = null;

    #[ORM\Column]
    private ?int $notes = null;

    #[ORM\ManyToOne(inversedBy: 'avis_id')]
    private ?User $users_FK = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(string $commentaires): static
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getNotes(): ?int
    {
        return $this->notes;
    }

    public function setNotes(int $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getUsersFK(): ?User
    {
        return $this->users_FK;
    }

    public function setUsersFK(?User $users_FK): static
    {
        $this->users_FK = $users_FK;

        return $this;
    }
}
