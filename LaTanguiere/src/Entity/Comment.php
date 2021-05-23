<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $commentLastReservationNum;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentUserName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentContent;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $commentRoomCleanliness;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $commentRoomLocation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $commentRoomQualityPrice;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $commentRoomServices;

    /**
     * @ORM\ManyToOne(targetEntity=Room::class, inversedBy="roomComments")
     */
    private $commentRoom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentLastReservationNum(): ?int
    {
        return $this->commentLastReservationNum;
    }

    public function setCommentLastReservationNum(?int $commentLastReservationNum): self
    {
        $this->commentLastReservationNum = $commentLastReservationNum;

        return $this;
    }

    public function getCommentUserName(): ?string
    {
        return $this->commentUserName;
    }

    public function setCommentUserName(?string $commentUserName): self
    {
        $this->commentUserName = $commentUserName;

        return $this;
    }

    public function getCommentContent(): ?string
    {
        return $this->commentContent;
    }

    public function setCommentContent(?string $commentContent): self
    {
        $this->commentContent = $commentContent;

        return $this;
    }

    public function getCommentRoomCleanliness(): ?int
    {
        return $this->commentRoomCleanliness;
    }

    public function setCommentRoomCleanliness(?int $commentRoomCleanliness): self
    {
        $this->commentRoomCleanliness = $commentRoomCleanliness;

        return $this;
    }

    public function getCommentRoomLocation(): ?int
    {
        return $this->commentRoomLocation;
    }

    public function setCommentRoomLocation(?int $commentRoomLocation): self
    {
        $this->commentRoomLocation = $commentRoomLocation;

        return $this;
    }

    public function getCommentRoomQualityPrice(): ?int
    {
        return $this->commentRoomQualityPrice;
    }

    public function setCommentRoomQualityPrice(?int $commentRoomQualityPrice): self
    {
        $this->commentRoomQualityPrice = $commentRoomQualityPrice;

        return $this;
    }

    public function getCommentRoomServices(): ?int
    {
        return $this->commentRoomServices;
    }

    public function setCommentRoomServices(?int $commentRoomServices): self
    {
        $this->commentRoomServices = $commentRoomServices;

        return $this;
    }

    public function getCommentRoom(): ?Room
    {
        return $this->commentRoom;
    }

    public function setCommentRoom(?Room $commentRoom): self
    {
        $this->commentRoom = $commentRoom;

        return $this;
    }
}
