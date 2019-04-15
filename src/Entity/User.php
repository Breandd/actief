<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cursus", mappedBy="leader")
     */
    private $cursuses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="customer_id")
     */
    private $tickets;

    public function __construct()
    {
        parent::__construct();
        $this->cursuses = new ArrayCollection();
        $this->tickets = new ArrayCollection();
        // your own logic
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
            $cursus->setLeader($this);
        }

        return $this;
    }

    public function removeCursus(Cursus $cursus): self
    {
        if ($this->cursuses->contains($cursus)) {
            $this->cursuses->removeElement($cursus);
            // set the owning side to null (unless already changed)
            if ($cursus->getLeader() === $this) {
                $cursus->setLeader(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets[] = $ticket;
            $ticket->setCustomerId($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->tickets->contains($ticket)) {
            $this->tickets->removeElement($ticket);
            // set the owning side to null (unless already changed)
            if ($ticket->getCustomerId() === $this) {
                $ticket->setCustomerId(null);
            }
        }

        return $this;
    }
}