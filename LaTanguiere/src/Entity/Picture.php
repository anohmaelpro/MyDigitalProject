<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 */
class Picture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pictureName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pictureLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prictureDescription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPictureName(): ?string
    {
        return $this->pictureName;
    }

    public function setPictureName(string $pictureName): self
    {
        $this->pictureName = $pictureName;

        return $this;
    }

    public function getPictureLink(): ?string
    {
        return $this->pictureLink;
    }

    public function setPictureLink(string $pictureLink): self
    {
        $this->pictureLink = $pictureLink;

        return $this;
    }

    public function getPrictureDescription(): ?string
    {
        return $this->prictureDescription;
    }

    public function setPrictureDescription(?string $prictureDescription): self
    {
        $this->prictureDescription = $prictureDescription;

        return $this;
    }
}
