<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomRepository::class)
 */
class Room
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
    private $roomName;

    /**
     * this value will contain the absolute link of the picture
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $roomPicture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $roomDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $roomMiniDescription;

    /**
     * This value will contains the evaluation of the room
     * @ORM\Column(type="integer", nullable=true)
     */
    private $roomNote;

    /**
     * @ORM\Column(type="float")
     */
    private $roomPrice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $roomInReservation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $roomLastNumReservation;

    /**
     * @ORM\ManyToMany(targetEntity=Equipment::class)
     */
    private $roomEquipment;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="commentRoom")
     */
    private $roomComments;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="reservationRoom")
     */
    private $roomReservations;

    public function __construct()
    {
        $this->roomEquipment = new ArrayCollection();
        $this->roomComments = new ArrayCollection();
        $this->roomReservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomName(): ?string
    {
        return $this->roomName;
    }

    public function setRoomName(string $roomName): self
    {
        $this->roomName = $roomName;

        return $this;
    }

    public function getRoomPicture(): ?string
    {
        return $this->roomPicture;
    }

    public function setRoomPicture(?string $roomPicture): self
    {
        $this->roomPicture = $roomPicture;

        return $this;
    }

    public function getRoomDescription(): ?string
    {
        return $this->roomDescription;
    }

    public function setRoomDescription(?string $roomDescription): self
    {
        $this->roomDescription = $roomDescription;

        return $this;
    }

    public function getRoomMiniDescription(): ?string
    {
        return $this->roomMiniDescription;
    }

    public function setRoomMiniDescription(?string $roomMiniDescription): self
    {
        $this->roomMiniDescription = $roomMiniDescription;

        return $this;
    }

    public function getRoomNote(): ?int
    {
        return $this->roomNote;
    }

    public function setRoomNote(?int $roomNote): self
    {
        $this->roomNote = $roomNote;

        return $this;
    }

    public function getRoomPrice(): ?float
    {
        return $this->roomPrice;
    }

    public function setRoomPrice(float $roomPrice): self
    {
        $this->roomPrice = $roomPrice;

        return $this;
    }

    public function getRoomInReservation(): ?bool
    {
        return $this->roomInReservation;
    }

    public function setRoomInReservation(bool $roomInReservation): self
    {
        $this->roomInReservation = $roomInReservation;

        return $this;
    }

    public function getRoomLastNumReservation(): ?int
    {
        return $this->roomLastNumReservation;
    }

    public function setRoomLastNumReservation(?int $roomLastNumReservation): self
    {
        $this->roomLastNumReservation = $roomLastNumReservation;

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getRoomEquipment(): Collection
    {
        return $this->roomEquipment;
    }

    public function addRoomEquipment(Equipment $roomEquipment): self
    {
        if (!$this->roomEquipment->contains($roomEquipment)) {
            $this->roomEquipment[] = $roomEquipment;
        }

        return $this;
    }

    public function removeRoomEquipment(Equipment $roomEquipment): self
    {
        $this->roomEquipment->removeElement($roomEquipment);

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getRoomComments(): Collection
    {
        return $this->roomComments;
    }

    public function addRoomComment(Comment $roomComment): self
    {
        if (!$this->roomComments->contains($roomComment)) {
            $this->roomComments[] = $roomComment;
            $roomComment->setCommentRoom($this);
        }

        return $this;
    }

    public function removeRoomComment(Comment $roomComment): self
    {
        if ($this->roomComments->removeElement($roomComment)) {
            // set the owning side to null (unless already changed)
            if ($roomComment->getCommentRoom() === $this) {
                $roomComment->setCommentRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getRoomReservations(): Collection
    {
        return $this->roomReservations;
    }

    public function addRoomReservation(Reservation $roomReservation): self
    {
        if (!$this->roomReservations->contains($roomReservation)) {
            $this->roomReservations[] = $roomReservation;
            $roomReservation->setReservationRoom($this);
        }

        return $this;
    }

    public function removeRoomReservation(Reservation $roomReservation): self
    {
        if ($this->roomReservations->removeElement($roomReservation)) {
            // set the owning side to null (unless already changed)
            if ($roomReservation->getReservationRoom() === $this) {
                $roomReservation->setReservationRoom(null);
            }
        }

        return $this;
    }
}
