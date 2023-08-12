<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
#[ApiResource()]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'Projet')]
    private ?MaisonDeCulte $IdMaisonDeCulte = null;

    #[ORM\OneToMany(mappedBy: 'IdProjet', targetEntity: Contribution::class)]
    private Collection $Contribution;

    #[ORM\OneToOne(targetEntity: self::class, inversedBy: 'Statut')]
    private ?Statut $IdStatut = null;



    #[ORM\ManyToOne(inversedBy: 'Projet')]
    private ?Donateur $IdDonateur = null;

    

    public function __construct()
    {
        $this->Contribution = new ArrayCollection();
       
    }

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

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): static
    {
        $this->montant = $montant;

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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getIdMaisonDeCulte(): ?MaisonDeCulte
    {
        return $this->IdMaisonDeCulte;
    }

    public function setIdMaisonDeCulte(?MaisonDeCulte $IdMaisonDeCulte): static
    {
        $this->IdMaisonDeCulte = $IdMaisonDeCulte;

        return $this;
    }

    /**
     * @return Collection<int, Contribution>
     */
    public function getContribution(): Collection
    {
        return $this->Contribution;
    }

    public function addContribution(Contribution $contribution): static
    {
        if (!$this->Contribution->contains($contribution)) {
            $this->Contribution->add($contribution);
            $contribution->setIdProjet($this);
        }

        return $this;
    }

    public function removeContribution(Contribution $contribution): static
    {
        if ($this->Contribution->removeElement($contribution)) {
            // set the owning side to null (unless already changed)
            if ($contribution->getIdProjet() === $this) {
                $contribution->setIdProjet(null);
            }
        }

        return $this;
    }

    public function getIdStatut(): ?self
    {
        return $this->IdStatut;
    }

    public function setIdStatut(?self $IdStatut): static
    {
        $this->IdStatut = $IdStatut;

        return $this;
    }
    public function getIdDonateur(): ?Donateur
    {
        return $this->IdDonateur;
    }

    public function setIdDonateur(?Donateur $IdDonateur): static
    {
        $this->IdDonateur = $IdDonateur;

        return $this;
    }

    /**
     * @return Collection<int, Statut>
     */
  
}
