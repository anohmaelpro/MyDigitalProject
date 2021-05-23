<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $reservationStartDate;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $reservationEndDate;

    /**
     * @ORM\ManyToOne(targetEntity=Room::class, inversedBy="roomReservations")
     */
    private $reservationRoom;

    /**
     * @ORM\Column(type="integer")
     */
    private $reservationNum;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userReservation")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservationStartDate(): ?string
    {
        return $this->reservationStartDate;
    }

    public function setReservationStartDate(string $reservationStartDate): self
    {
        $this->reservationStartDate = $reservationStartDate;

        return $this;
    }

    public function getReservationEndDate(): ?string
    {
        return $this->reservationEndDate;
    }

    public function setReservationEndDate(string $reservationEndDate): self
    {
        $this->reservationEndDate = $reservationEndDate;

        return $this;
    }

    public function getReservationRoom(): ?Room
    {
        return $this->reservationRoom;
    }

    public function setReservationRoom(?Room $reservationRoom): self
    {
        $this->reservationRoom = $reservationRoom;

        return $this;
    }

    public function getReservationNum(): ?int
    {
        return $this->reservationNum;
    }

    public function setReservationNum(int $reservationNum): self
    {
        $this->reservationNum = $reservationNum;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
