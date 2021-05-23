<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 */
class Activity
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
    private $activityName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activityDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $activityPicture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activityAddress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivityName(): ?string
    {
        return $this->activityName;
    }

    public function setActivityName(string $activityName): self
    {
        $this->activityName = $activityName;

        return $this;
    }

    public function getActivityDescription(): ?string
    {
        return $this->activityDescription;
    }

    public function setActivityDescription(string $activityDescription): self
    {
        $this->activityDescription = $activityDescription;

        return $this;
    }

    public function getActivityPicture(): ?string
    {
        return $this->activityPicture;
    }

    public function setActivityPicture(?string $activityPicture): self
    {
        $this->activityPicture = $activityPicture;

        return $this;
    }

    public function getActivityAddress(): ?string
    {
        return $this->activityAddress;
    }

    public function setActivityAddress(string $activityAddress): self
    {
        $this->activityAddress = $activityAddress;

        return $this;
    }
}
