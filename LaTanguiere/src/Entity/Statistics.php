<?php

namespace App\Entity;

use App\Repository\StatisticsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatisticsRepository::class)
 */
class Statistics
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrReservation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrReservation(): ?int
    {
        return $this->nbrReservation;
    }

    public function setNbrReservation(int $nbrReservation): self
    {
        $this->nbrReservation = $nbrReservation;

        return $this;
    }
}
