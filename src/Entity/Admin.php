<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;




#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ORM\Table(name: '`admin`')]

#[ApiResource(
    collectionOperations: [
        'get' => ['normalization_context' => ['groups' => 'Admin:list']],
        'post' => ['normalization_context' => ['groups' => 'Admin:list']],
        
      
    ],
    itemOperations: [
        'get' => ['normalization_context' => ['groups' => 'Admin:item']],
        'put' => ['normalization_context' => ['groups' => 'Admin:item']],
        'delete' => ['normalization_context' => ['groups' => 'Admin:item']]
        
       
    ],
    
    paginationEnabled: false
)]
 
class Admin extends Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
  
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'responsableMaisonDeCulte', targetEntity: MaisonDeCulte::class)]
    private Collection $MaisonDeCulte;

    public function __construct()
    {
        $this->MaisonDeCulte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, MaisonDeCulte>
     */
    public function getMaisonDeCulte(): Collection
    {
        return $this->MaisonDeCulte;
    }

    public function addMaisonDeCulte(MaisonDeCulte $maisonDeCulte): static
    {
        if (!$this->MaisonDeCulte->contains($maisonDeCulte)) {
            $this->MaisonDeCulte->add($maisonDeCulte);
            $maisonDeCulte->setResponsableMaisonDeCulte($this);
        }

        return $this;
    }

    public function removeMaisonDeCulte(MaisonDeCulte $maisonDeCulte): static
    {
        if ($this->MaisonDeCulte->removeElement($maisonDeCulte)) {
            // set the owning side to null (unless already changed)
            if ($maisonDeCulte->getResponsableMaisonDeCulte() === $this) {
                $maisonDeCulte->setResponsableMaisonDeCulte(null);
            }
        }

        return $this;
    }
}
