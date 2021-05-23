<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userLastname;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $userStatut;

    /**
     * this value will allow us to know if a user already reserved
     * @ORM\Column(type="boolean")
     */
    private $userIsOldCustomer;

    /**
     * this value will allow us to know the numbre of the last reservation of the user
     * @ORM\Column(type="integer", nullable=true)
     */
    private $userLastReservationNum;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="user")
     */
    private $userReservation;

    public function __construct()
    {
        $this->userReservation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserLastname(): ?string
    {
        return $this->userLastname;
    }

    public function setUserLastname(string $userLastname): self
    {
        $this->userLastname = $userLastname;

        return $this;
    }

    public function getUserStatut(): ?string
    {
        return $this->userStatut;
    }

    public function setUserStatut(string $userStatut): self
    {
        $this->userStatut = $userStatut;

        return $this;
    }

    public function getUserIsOldCustomer(): ?bool
    {
        return $this->userIsOldCustomer;
    }

    public function setUserIsOldCustomer(bool $userIsOldCustomer): self
    {
        $this->userIsOldCustomer = $userIsOldCustomer;

        return $this;
    }

    public function getUserLastReservationNum(): ?int
    {
        return $this->userLastReservationNum;
    }

    public function setUserLastReservationNum(?int $userLastReservationNum): self
    {
        $this->userLastReservationNum = $userLastReservationNum;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getUserReservation(): Collection
    {
        return $this->userReservation;
    }

    public function addUserReservation(Reservation $userReservation): self
    {
        if (!$this->userReservation->contains($userReservation)) {
            $this->userReservation[] = $userReservation;
            $userReservation->setUser($this);
        }

        return $this;
    }

    public function removeUserReservation(Reservation $userReservation): self
    {
        if ($this->userReservation->removeElement($userReservation)) {
            // set the owning side to null (unless already changed)
            if ($userReservation->getUser() === $this) {
                $userReservation->setUser(null);
            }
        }

        return $this;
    }
}
