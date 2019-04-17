<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocationRepository")
 */
class Location
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_people;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cursus", mappedBy="location")
     */
    private $cursuses;

    public function __construct()
    {
        $this->cursuses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getMaxPeople(): ?int
    {
        return $this->max_people;
    }

    public function setMaxPeople(int $max_people): self
    {
        $this->max_people = $max_people;

        return $this;
    }

    /**
     * @return Collection|Cursus[]
     */
    public function getCursuses(): Collection
    {
        return $this->cursuses;
    }

    public function addCursus(Cursus $cursus): self
    {
        if (!$this->cursuses->contains($cursus)) {
            $this->cursuses[] = $cursus;
            $cursus->setLocation($this);
        }

        return $this;
    }

    public function removeCursus(Cursus $cursus): self
    {
        if ($this->cursuses->contains($cursus)) {
            $this->cursuses->removeElement($cursus);
            // set the owning side to null (unless already changed)
            if ($cursus->getLocation() === $this) {
                $cursus->setLocation(null);
            }
        }

        return $this;
    }

     public function __toString()
{
    // TODO: Implement __toString() method.
    return '' . $this->getAdress();
}
}
