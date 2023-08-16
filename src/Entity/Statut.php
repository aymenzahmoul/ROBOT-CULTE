<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StatutRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;
#[ORM\Entity(repositoryClass: StatutRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => ['normalization_context' => ['groups' => 'Statut:list']],
        'post' => ['normalization_context' => ['groups' => ' Statut:list']],
        
      
    ],
    itemOperations: [
        'get' => ['normalization_context' => ['groups' => ' Statut:item']],
        'put' => ['normalization_context' => ['groups' => 'Statut:item']],
        'delete' => ['normalization_context' => ['groups' => ' Statut:item']]
        
       
    ],
    
    paginationEnabled: false
)]
class Statut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['Statut:list', 'Statut:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Statut:list', 'Statut:item'])]
    private ?string $statistique = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Statut:list', 'Statut:item'])]
    private ?string $en_cours = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Statut:list', 'Statut:item'])]
    private ?string $terminer = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Statut:list', 'Statut:item'])]
    private ?string $suspendu = null;

    #[ORM\OneToOne(inversedBy: 'statuts')]
    
    private ?Projet $Projet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatistique(): ?string
    {
        return $this->statistique;
    }

    public function setStatistique(string $statistique): static
    {
        $this->statistique = $statistique;

        return $this;
    }

    public function getEnCours(): ?string
    {
        return $this->en_cours;
    }

    public function setEnCours(string $en_cours): static
    {
        $this->en_cours = $en_cours;

        return $this;
    }

    public function getTerminer(): ?string
    {
        return $this->terminer;
    }

    public function setTerminer(string $terminer): static
    {
        $this->terminer = $terminer;

        return $this;
    }

    public function getSuspendu(): ?string
    {
        return $this->suspendu;
    }

    public function setSuspendu(string $suspendu): static
    {
        $this->suspendu = $suspendu;

        return $this;
    }

    public function getProjet(): ?Projet
    {
        return $this->Projet;
    }

    public function setProjet(?Projet $Projet): static
    {
        $this->Projet = $Projet;

        return $this;
    }
}
