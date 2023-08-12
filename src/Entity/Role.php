<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
#[ApiResource()]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $visiteur = null;

    #[ORM\Column(length: 255)]
    private ?string $admins = null;

    #[ORM\Column(length: 255)]
    private ?string $donateur = null;

    #[ORM\ManyToOne(inversedBy: 'Role')]
    private ?Utilisateur $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisiteur(): ?string
    {
        return $this->visiteur;
    }

    public function setVisiteur(string $visiteur): static
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    public function getAdmins(): ?string
    {
        return $this->admins;
    }

    public function setAdmins(string $admins): static
    {
        $this->admins = $admins;

        return $this;
    }

    public function getDonateur(): ?string
    {
        return $this->donateur;
    }

    public function setDonateur(string $donateur): static
    {
        $this->donateur = $donateur;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
