<?php

namespace App\Entity;

use App\Repository\EspeciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EspeciesRepository::class)
 */
class Especies
{
    public function __toString()
    {
        return $this->getEspecie();
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $especie;

    /**
     * @ORM\OneToMany(targetEntity=Animales::class, mappedBy="especie")
     */
    private $animales;

    public function __construct()
    {
        $this->animales = new ArrayCollection();
    }

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

    /**
     * @return Collection|Animales[]
     */
    public function getAnimales(): Collection
    {
        return $this->animales;
    }

    public function addAnimale(Animales $animale): self
    {
        if (!$this->animales->contains($animale)) {
            $this->animales[] = $animale;
            $animale->setEspecie($this);
        }

        return $this;
    }

    public function removeAnimale(Animales $animale): self
    {
        if ($this->animales->removeElement($animale)) {
            // set the owning side to null (unless already changed)
            if ($animale->getEspecie() === $this) {
                $animale->setEspecie(null);
            }
        }

        return $this;
    }
}
