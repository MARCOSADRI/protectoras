<?php

namespace App\Entity;

use App\Repository\RazasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RazasRepository::class)
 */
class Razas
{
    public function __toString()
    {
        return $this->getRaza();
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
    private $raza;

    /**
     * @ORM\OneToMany(targetEntity=Animales::class, mappedBy="raza")
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

    public function getRaza(): ?string
    {
        return $this->raza;
    }

    public function setRaza(string $raza): self
    {
        $this->raza = $raza;

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
            $animale->setRaza($this);
        }

        return $this;
    }

    public function removeAnimale(Animales $animale): self
    {
        if ($this->animales->removeElement($animale)) {
            // set the owning side to null (unless already changed)
            if ($animale->getRaza() === $this) {
                $animale->setRaza(null);
            }
        }

        return $this;
    }
}
