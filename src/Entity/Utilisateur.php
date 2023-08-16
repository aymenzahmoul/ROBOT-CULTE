<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => ['normalization_context' => ['groups' => 'Utilisateur :list']],
        'post' => ['normalization_context' => ['groups' => 'Utilisateur :list']],
        
      
    ],
    itemOperations: [
        'get' => ['normalization_context' => ['groups' => 'Utilisateur :item']],
        'put' => ['normalization_context' => ['groups' => 'Utilisateur :item']],
        'delete' => ['normalization_context' => ['groups' => 'Utilisateur :item']]
        
       
    ],
    
    paginationEnabled: false
)]
class Utilisateur 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['Utilisateur:list', 'Utilisateur:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Utilisateur:list', 'Utilisateur:item'])]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Utilisateur:list', 'Utilisateur:item'])]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Utilisateur:list', 'Utilisateur:item'])]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Utilisateur:list', 'Utilisateur:item'])]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Groups(['Utilisateur:list', 'Utilisateur:item'])]
    private ?string $role = null;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Role::class)]
    private Collection $Role;

    public function __construct()
    {
        $this->Role = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function addRole(Role $role): static
    {
        if (!$this->Role->contains($role)) {
            $this->Role->add($role);
            $role->setUtilisateur($this);
        }

        return $this;
    }

    public function removeRole(Role $role): static
    {
        if ($this->Role->removeElement($role)) {
            // set the owning side to null (unless already changed)
            if ($role->getUtilisateur() === $this) {
                $role->setUtilisateur(null);
            }
        }

        return $this;
    }
}
