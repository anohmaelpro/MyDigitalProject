<?php

namespace App\Entity;

use App\Repository\DataWebsiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DataWebsiteRepository::class)
 */
class DataWebsite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $homePicture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hotelAddress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHomePicture(): ?string
    {
        return $this->homePicture;
    }

    public function setHomePicture(?string $homePicture): self
    {
        $this->homePicture = $homePicture;

        return $this;
    }

    public function getHotelAddress(): ?string
    {
        return $this->hotelAddress;
    }

    public function setHotelAddress(string $hotelAddress): self
    {
        $this->hotelAddress = $hotelAddress;

        return $this;
    }
}
