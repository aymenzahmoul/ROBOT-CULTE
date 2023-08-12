<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MaisonDeCulteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MaisonDeCulteRepository::class)]
#[ApiResource()]
class MaisonDeCulte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['conference:list', 'conference:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $responsable = null;

    #[ORM\OneToMany(mappedBy: 'IdMaisonDeCulte', targetEntity: Projet::class)]
    private Collection $Projet;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'Information')]
    private ?self $IdmaisonDeCulte = null;

    #[ORM\OneToMany(mappedBy: 'IdmaisonDeCulte', targetEntity: self::class)]
    private Collection $Information;

    #[ORM\ManyToOne(inversedBy: 'MaisonDeCulte')]
    private ?Admin $responsableMaisonDeCulte = null;

 

    public function __construct()
    {
        $this->Projet = new ArrayCollection();
        $this->Information = new ArrayCollection();
        
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): static
    {
        $this->responsable = $responsable;

        return $this;
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
            $projet->setIdMaisonDeCulte($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): static
    {
        if ($this->Projet->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getIdMaisonDeCulte() === $this) {
                $projet->setIdMaisonDeCulte(null);
            }
        }

        return $this;
    }

    public function getIdmaisonDeCulte(): ?self
    {
        return $this->IdmaisonDeCulte;
    }

    public function setIdmaisonDeCulte(?self $IdmaisonDeCulte): static
    {
        $this->IdmaisonDeCulte = $IdmaisonDeCulte;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getInformation(): Collection
    {
        return $this->Information;
    }

    public function addInformation(self $information): static
    {
        if (!$this->Information->contains($information)) {
            $this->Information->add($information);
            $information->setIdmaisonDeCulte($this);
        }

        return $this;
    }

    public function removeInformation(self $information): static
    {
        if ($this->Information->removeElement($information)) {
            // set the owning side to null (unless already changed)
            if ($information->getIdmaisonDeCulte() === $this) {
                $information->setIdmaisonDeCulte(null);
            }
        }

        return $this;
    }

    public function getResponsableMaisonDeCulte(): ?Admin
    {
        return $this->responsableMaisonDeCulte;
    }

    public function setResponsableMaisonDeCulte(?Admin $responsableMaisonDeCulte): static
    {
        $this->responsableMaisonDeCulte = $responsableMaisonDeCulte;

        return $this;
    }
}
