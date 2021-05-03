<?php

namespace App\Entity;

use App\Repository\FichasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FichasRepository::class)
 */
class Fichas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $esterilizado;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fallecido;

    /**
     * @ORM\OneToMany(targetEntity=Revisiones::class, mappedBy="ficha", orphanRemoval=true)
     */
    private $revisiones;

    /**
     * @ORM\OneToMany(targetEntity=Vacunas::class, mappedBy="ficha", orphanRemoval=true)
     */
    private $vacunas;

    /**
     * @ORM\OneToMany(targetEntity=Enfermedades::class, mappedBy="ficha", orphanRemoval=true)
     */
    private $enfermedades;

    /**
     * @ORM\OneToOne(targetEntity=Animales::class, mappedBy="ficha", cascade={"persist", "remove"})
     */
    private $animales;

    public function __construct()
    {
        $this->revisiones = new ArrayCollection();
        $this->vacunas = new ArrayCollection();
        $this->enfermedades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEsterilizado(): ?bool
    {
        return $this->esterilizado;
    }

    public function setEsterilizado(bool $esterilizado): self
    {
        $this->esterilizado = $esterilizado;

        return $this;
    }

    public function getFallecido(): ?bool
    {
        return $this->fallecido;
    }

    public function setFallecido(bool $fallecido): self
    {
        $this->fallecido = $fallecido;

        return $this;
    }

    /**
     * @return Collection|Revisiones[]
     */
    public function getRevisiones(): Collection
    {
        return $this->revisiones;
    }

    public function addRevisione(Revisiones $revisione): self
    {
        if (!$this->revisiones->contains($revisione)) {
            $this->revisiones[] = $revisione;
            $revisione->setFicha($this);
        }

        return $this;
    }

    public function removeRevisione(Revisiones $revisione): self
    {
        if ($this->revisiones->removeElement($revisione)) {
            // set the owning side to null (unless already changed)
            if ($revisione->getFicha() === $this) {
                $revisione->setFicha(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vacunas[]
     */
    public function getVacunas(): Collection
    {
        return $this->vacunas;
    }

    public function addVacuna(Vacunas $vacuna): self
    {
        if (!$this->vacunas->contains($vacuna)) {
            $this->vacunas[] = $vacuna;
            $vacuna->setFicha($this);
        }

        return $this;
    }

    public function removeVacuna(Vacunas $vacuna): self
    {
        if ($this->vacunas->removeElement($vacuna)) {
            // set the owning side to null (unless already changed)
            if ($vacuna->getFicha() === $this) {
                $vacuna->setFicha(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Enfermedades[]
     */
    public function getEnfermedades(): Collection
    {
        return $this->enfermedades;
    }

    public function addEnfermedade(Enfermedades $enfermedade): self
    {
        if (!$this->enfermedades->contains($enfermedade)) {
            $this->enfermedades[] = $enfermedade;
            $enfermedade->setFicha($this);
        }

        return $this;
    }

    public function removeEnfermedade(Enfermedades $enfermedade): self
    {
        if ($this->enfermedades->removeElement($enfermedade)) {
            // set the owning side to null (unless already changed)
            if ($enfermedade->getFicha() === $this) {
                $enfermedade->setFicha(null);
            }
        }

        return $this;
    }

    public function getAnimales(): ?Animales
    {
        return $this->animales;
    }

    public function setAnimales(Animales $animales): self
    {
        // set the owning side of the relation if necessary
        if ($animales->getFicha() !== $this) {
            $animales->setFicha($this);
        }

        $this->animales = $animales;

        return $this;
    }
}
