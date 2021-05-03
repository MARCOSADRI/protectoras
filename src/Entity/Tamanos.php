<?php

namespace App\Entity;

use App\Repository\TamanosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TamanosRepository::class)
 */
class Tamanos
{
    public function __toString()
    {
        return $this->getTamano();
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
    private $tamano;

    /**
     * @ORM\OneToMany(targetEntity=Animales::class, mappedBy="tamano")
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

    public function getTamano(): ?string
    {
        return $this->tamano;
    }

    public function setTamano(string $tamano): self
    {
        $this->tamano = $tamano;

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
            $animale->setTamano($this);
        }

        return $this;
    }

    public function removeAnimale(Animales $animale): self
    {
        if ($this->animales->removeElement($animale)) {
            // set the owning side to null (unless already changed)
            if ($animale->getTamano() === $this) {
                $animale->setTamano(null);
            }
        }

        return $this;
    }
}
