<?php

namespace App\Entity;

use App\Repository\FichaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FichaRepository::class)
 */
class Ficha
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
    private $estado;

    /**
     * @ORM\OneToOne(targetEntity=Animales::class, inversedBy="ficha", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $animal;

    /**
     * @ORM\OneToMany(targetEntity=Revisiones::class, mappedBy="ficha")
     */
    private $revisiones;

    /**
     * @ORM\OneToMany(targetEntity=Vacunas::class, mappedBy="ficha")
     */
    private $vacunas;

    /**
     * @ORM\OneToMany(targetEntity=Enfermedad::class, mappedBy="ficha")
     */
    private $enfermedades;

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

    public function getEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getAnimal(): ?Animales
    {
        return $this->animal;
    }

    public function setAnimal(Animales $animal): self
    {
        $this->animal = $animal;

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
     * @return Collection|Enfermedad[]
     */
    public function getenfermedades(): Collection
    {
        return $this->enfermedades;
    }

    public function addEnfermedad(Enfermedad $enfermedad): self
    {
        if (!$this->enfermedades->contains($enfermedad)) {
            $this->enfermedades[] = $enfermedad;
            $enfermedad->setFicha($this);
        }

        return $this;
    }

    public function removeEnfermedad(Enfermedad $enfermedad): self
    {
        if ($this->enfermedades->removeElement($enfermedad)) {
            // set the owning side to null (unless already changed)
            if ($enfermedad->getFicha() === $this) {
                $enfermedad->setFicha(null);
            }
        }

        return $this;
    }
}
