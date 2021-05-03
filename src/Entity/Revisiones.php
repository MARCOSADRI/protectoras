<?php

namespace App\Entity;

use App\Repository\RevisionesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RevisionesRepository::class)
 */
class Revisiones
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Fichas::class, inversedBy="revisiones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ficha;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diagnostico;

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

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getDiagnostico(): ?string
    {
        return $this->diagnostico;
    }

    public function setDiagnostico(string $diagnostico): self
    {
        $this->diagnostico = $diagnostico;

        return $this;
    }
}
