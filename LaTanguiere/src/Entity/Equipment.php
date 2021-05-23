<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipmentRepository::class)
 */
class Equipment
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
    private $equipmentName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipmentName(): ?string
    {
        return $this->equipmentName;
    }

    public function setEquipmentName(string $equipmentName): self
    {
        $this->equipmentName = $equipmentName;

        return $this;
    }
}
