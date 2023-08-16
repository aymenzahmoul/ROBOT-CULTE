<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InformationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: InformationRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => ['normalization_context' => ['groups' => 'Information:list']],
        'post' => ['normalization_context' => ['groups' => 'Information:list']],
        
      
    ],
    itemOperations: [
        'get' => ['normalization_context' => ['groups' => 'Information:item']],
        'put' => ['normalization_context' => ['groups' => 'Information:item']],
        'delete' => ['normalization_context' => ['groups' => 'Information:item']]
        
       
    ],
    
    paginationEnabled: false
)]
class Information
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['Information:list', 'Information:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Information:list', 'Information:item'])]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Information:list', 'Information:item'])]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['Information:list', 'Information:item'])]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['Information:list', 'Information:item'])]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\ManyToOne(inversedBy: 'information')]
    private ?MaisonDeCulte $MaisonDeCulte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

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

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): static
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getMaisonDeCulte(): ?MaisonDeCulte
    {
        return $this->MaisonDeCulte;
    }

    public function setMaisonDeCulte(?MaisonDeCulte $MaisonDeCulte): static
    {
        $this->MaisonDeCulte = $MaisonDeCulte;

        return $this;
    }
}
