<?php

namespace App\Entity;

use App\Repository\AnimalesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalesRepository::class)
 */
class Animales
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Especies::class, inversedBy="animales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $especie;

    /**
     * @ORM\ManyToOne(targetEntity=Razas::class, inversedBy="animales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $raza;

    /**
     * @ORM\ManyToOne(targetEntity=Tamanos::class, inversedBy="animales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tamano;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $sexo;

    /**
     * @ORM\Column(type="integer")
     */
    private $edad;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombreA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $foto;

    /**
     * @ORM\OneToOne(targetEntity=Fichas::class, inversedBy="animales", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     
     */
    private $ficha;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="animales")
     */
    private $adoptador;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspecie(): ?Especies
    {
        return $this->especie;
    }

    public function setEspecie(?Especies $especie): self
    {
        $this->especie = $especie;

        return $this;
    }

    public function getRaza(): ?Razas
    {
        return $this->raza;
    }

    public function setRaza(?Razas $raza): self
    {
        $this->raza = $raza;

        return $this;
    }

    public function getTamano(): ?Tamanos
    {
        return $this->tamano;
    }

    public function setTamano(?Tamanos $tamano): self
    {
        $this->tamano = $tamano;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getNombreA(): ?string
    {
        return $this->nombreA;
    }

    public function setNombreA(string $nombreA): self
    {
        $this->nombreA = $nombreA;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getFicha(): ?Fichas
    {
        return $this->ficha;
    }

    public function setFicha(Fichas $ficha): self
    {
        $this->ficha = $ficha;

        return $this;
    }

    public function getAdoptador(): ?User
    {
        return $this->adoptador;
    }

    public function setAdoptador(?User $adoptador): self
    {
        $this->adoptador = $adoptador;

        return $this;
    }
}
