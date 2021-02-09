<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="user_uk", columns={"ldap_id"})
 * })
 */
class User
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
    private $ldap_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $last_name;

    /**
     * @ORM\ManyToMany(targetEntity=Classification::class, mappedBy="users")
     */
    private $classifications;

    public function __construct()
    {
        $this->classifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLdapId(): ?string
    {
        return $this->ldap_id;
    }

    public function setLdapId(?string $ldap_id): self
    {
        $this->ldap_id = $ldap_id;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * @return Collection|Classification[]
     */
    public function getClassifications(): Collection
    {
        return $this->classifications;
    }

    public function addClassification(Classification $classification): self
    {
        if (!$this->classifications->contains($classification)) {
            $this->classifications[] = $classification;
            $classification->addUser($this);
        }

        return $this;
    }

    public function removeClassification(Classification $classification): self
    {
        if ($this->classifications->removeElement($classification)) {
            $classification->removeUser($this);
        }

        return $this;
    }
}
