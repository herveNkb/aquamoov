<?php

namespace App\Entity;

use App\Repository\PermissionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PermissionsRepository::class)]
class Permissions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $mailing = null;

    #[ORM\Column]
    private ?bool $staff_planning = null;

    #[ORM\Column]
    private ?bool $locale_promote = null;

    #[ORM\Column]
    private ?bool $sale_drinks = null;

    #[ORM\ManyToOne(inversedBy: 'permissions')]
    private ?Users $users = null;

    #[ORM\ManyToOne(inversedBy: 'permissions')]
    private ?Structures $structures = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isMailing(): ?bool
    {
        return $this->mailing;
    }

    public function setMailing(bool $mailing): self
    {
        $this->mailing = $mailing;

        return $this;
    }

    public function isStaffPlanning(): ?bool
    {
        return $this->staff_planning;
    }

    public function setStaffPlanning(bool $staff_planning): self
    {
        $this->staff_planning = $staff_planning;

        return $this;
    }

    public function isLocalePromote(): ?bool
    {
        return $this->locale_promote;
    }

    public function setLocalePromote(bool $locale_promote): self
    {
        $this->locale_promote = $locale_promote;

        return $this;
    }

    public function isSaleDrinks(): ?bool
    {
        return $this->sale_drinks;
    }

    public function setSaleDrinks(bool $sale_drinks): self
    {
        $this->sale_drinks = $sale_drinks;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getStructures(): ?Structures
    {
        return $this->structures;
    }

    public function setStructures(?Structures $structures): self
    {
        $this->structures = $structures;

        return $this;
    }
}
