<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DonateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DonateurRepository::class)]


#[ApiResource(
    collectionOperations: [
        'get' => ['normalization_context' => ['groups' => 'Donateur:list']],
        'post' => ['normalization_context' => ['groups' => 'Donateur:list']],
        
      
    ],
    itemOperations: [
        'get' => ['normalization_context' => ['groups' => 'Donateur:item']],
        'put' => ['normalization_context' => ['groups' => 'Donateur:item']],
        'delete' => ['normalization_context' => ['groups' => 'Donateur:item']]
        
       
    ],
    
    paginationEnabled: false
)]
 
class Donateur extends Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
 
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'IdDonateur', targetEntity: Projet::class)]
    private Collection $Projet;

    public function __construct()
    {
        $this->Projet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getProjet(): Collection
    {
        return $this->Projet;
    }

    public function addProjet(Projet $projet): static
    {
        if (!$this->Projet->contains($projet)) {
            $this->Projet->add($projet);
            $projet->setIdDonateur($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): static
    {
        if ($this->Projet->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getIdDonateur() === $this) {
                $projet->setIdDonateur(null);
            }
        }

        return $this;
    }
}
