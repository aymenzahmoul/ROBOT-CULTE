<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ContributionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ContributionRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => ['normalization_context' => ['groups' => 'Contribution:list']],
        'post' => ['normalization_context' => ['groups' => 'Contribution:list']],
        
      
    ],
    itemOperations: [
        'get' => ['normalization_context' => ['groups' => 'Contribution:item']],
       
        
       
    ],
    
    paginationEnabled: false
)]
    
class Contribution
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['Contribution:list', 'Contribution:item'])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['Contribution:list', 'Contribution:item'])]
    private ?float $montant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['Contribution:list', 'Contribution:item'])]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Contribution:list', 'Contribution:item'])]
    private ?string $type_de_contribution = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Contribution:list', 'Contribution:item'])]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'Contribution')]
    private ?Projet $IdProjet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getTypeDeContribution(): ?string
    {
        return $this->type_de_contribution;
    }

    public function setTypeDeContribution(string $type_de_contribution): static
    {
        $this->type_de_contribution = $type_de_contribution;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIdProjet(): ?Projet
    {
        return $this->IdProjet;
    }

    public function setIdProjet(?Projet $IdProjet): static
    {
        $this->IdProjet = $IdProjet;

        return $this;
    }
}
