<?php

namespace App\Entity;

use App\Repository\EnfermedadesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnfermedadesRepository::class)
 */
class Enfermedades
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Fichas::class, inversedBy="enfermedades")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ficha;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $enfermedad;

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

    public function getEnfermedad(): ?string
    {
        return $this->enfermedad;
    }

    public function setEnfermedad(string $enfermedad): self
    {
        $this->enfermedad = $enfermedad;

        return $this;
    }
}
