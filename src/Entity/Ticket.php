<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tickets")
     */
    private $customer_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cursus", inversedBy="tickets")
     */
    private $cursus_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="boolean")
     */
    private $payed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerId(): ?User
    {
        return $this->customer_id;
    }

    public function setCustomerId(?User $customer_id): self
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getCursusId(): ?Cursus
    {
        return $this->cursus_id;
    }

    public function setCursusId(?Cursus $cursus_id): self
    {
        $this->cursus_id = $cursus_id;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPayed(): ?bool
    {
        return $this->payed;
    }

    public function setPayed(bool $payed): self
    {
        $this->payed = $payed;

        return $this;
    }

//    public function __toString()
//    {
//        //TODO: Implement __toString() method.
//        return $this->getCursusId();
//    }
}
