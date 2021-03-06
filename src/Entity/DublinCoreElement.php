<?php

namespace App\Entity;

use App\Repository\DublinCoreElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DublinCoreElementRepository::class)
 * @ORM\Table(name="dublin_core_element")
 * @ORM\Table(uniqueConstraints={
 *      @ORM\UniqueConstraint(name="dublin_core_element_uk", columns={"element"})
 * })
*/
class DublinCoreElement
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
    private $element;

    /**
     * @ORM\Column(type="string", name="definition", length=4000, nullable=true)
     */
    private $definition;

    /**
     * @ORM\OneToMany(targetEntity=Metadata::class, mappedBy="dublin_core_element")
     */
    private $metadatas;

    public function __construct()
    {
        $this->metadatas = new ArrayCollection();
        $this->documentRelationss = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->element;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getElement(): ?string
    {
        return $this->element;
    }

    public function setElement(string $element): self
    {
        $this->element = $element;

        return $this;
    }

    public function getDefinition(): ?string
    {
        return $this->definition;
    }

    public function setDefinition(?string $definition): self
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * @return Collection|Metadata[]
     */
    public function getMetadatas(): Collection
    {
        return $this->metadatas;
    }

    public function addMetadata(Metadata $metadata): self
    {
        if (!$this->metadatas->contains($metadata)) {
            $this->metadatas[] = $metadata;
            $metadata->setDublinCoreElement($this);
        }

        return $this;
    }

    public function removeMetadata(Metadata $metadata): self
    {
        if ($this->metadatas->removeElement($metadata)) {
            // set the owning side to null (unless already changed)
            if ($metadata->getDublinCoreElement() === $this) {
                $metadata->setDublinCoreElement(null);
            }
        }

        return $this;
    }
}
