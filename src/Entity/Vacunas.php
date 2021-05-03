<?php

namespace App\Entity;

use App\Repository\VacunasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VacunasRepository::class)
 */
class Vacunas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Fichas::class, inversedBy="vacunas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ficha;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombreV;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $previene;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $fabricante;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFicha(): ?Fichas
    {
        return $this->ficha;
    }

    public function setFicha(?Fichas $ficha): self
    {
        $this->ficha = $ficha;

        return $this;
    }

    public function getNombreV(): ?string
    {
        return $this->nombreV;
    }

    public function setNombreV(string $nombreV): self
    {
        $this->nombreV = $nombreV;

        return $this;
    }

    public function getPreviene(): ?string
    {
        return $this->previene;
    }

    public function setPreviene(string $previene): self
    {
        $this->previene = $previene;

        return $this;
    }

    public function getFabricante(): ?string
    {
        return $this->fabricante;
    }

    public function setFabricante(string $fabricante): self
    {
        $this->fabricante = $fabricante;

        return $this;
    }
}
