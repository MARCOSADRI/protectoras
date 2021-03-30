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
     * @ORM\Column(type="string", length=30)
     */
    private $especie;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $raza;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $tamano;

    /**
     * @ORM\Column(type="integer")
     */
    private $edad;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $sexo;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nombreA;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="animales")
     */
    private $Adoptador;

    /**
     * @ORM\OneToOne(targetEntity=Ficha::class, mappedBy="animal", cascade={"persist", "remove"})
     */
    private $ficha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspecie(): ?string
    {
        return $this->especie;
    }

    public function setEspecie(string $especie): self
    {
        $this->especie = $especie;

        return $this;
    }

    public function getRaza(): ?string
    {
        return $this->raza;
    }

    public function setRaza(string $raza): self
    {
        $this->raza = $raza;

        return $this;
    }

    public function getTamano(): ?string
    {
        return $this->tamano;
    }

    public function setTamano(string $tamano): self
    {
        $this->tamano = $tamano;

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

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

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

    public function getAdoptador(): ?User
    {
        return $this->Adoptador;
    }

    public function setAdoptador(?User $Adoptador): self
    {
        $this->Adoptador = $Adoptador;

        return $this;
    }

    public function getFicha(): ?Ficha
    {
        return $this->ficha;
    }

    public function setFicha(Ficha $ficha): self
    {
        // set the owning side of the relation if necessary
        if ($ficha->getAnimal() !== $this) {
            $ficha->setAnimal($this);
        }

        $this->ficha = $ficha;

        return $this;
    }
}
