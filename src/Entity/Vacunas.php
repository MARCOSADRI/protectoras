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
     * @ORM\Column(type="string", length=30)
     */
    private $nombreV;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Previene;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Fabricante;

    /**
     * @ORM\ManyToOne(targetEntity=Ficha::class, inversedBy="vacunas")
     */
    private $ficha;

    public function getId(): ?int
    {
        return $this->id;
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
        return $this->Previene;
    }

    public function setPreviene(string $Previene): self
    {
        $this->Previene = $Previene;

        return $this;
    }

    public function getFabricante(): ?string
    {
        return $this->Fabricante;
    }

    public function setFabricante(string $Fabricante): self
    {
        $this->Fabricante = $Fabricante;

        return $this;
    }

    public function getFicha(): ?Ficha
    {
        return $this->ficha;
    }

    public function setFicha(?Ficha $ficha): self
    {
        $this->ficha = $ficha;

        return $this;
    }
}
