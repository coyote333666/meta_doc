<?php

namespace App\Entity;

use App\Repository\DublinCoreRelationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DublinCoreRelationRepository::class)
 * @ORM\Table(name="dublin_core_relation", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="dublin_core_relation_uk", columns={"relation"})
 * })
*/
class DublinCoreRelation
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
    private $relation;

    /**
     * @ORM\Column(type="string", name="definition", length=4000, nullable=true)
     */
    private $definition;

    /**
     * @ORM\OneToMany(targetEntity=DocumentRelation::class, mappedBy="dublin_core")
     */
    private $documentRelations;

    public function __construct()
    {
        $this->metadatas = new ArrayCollection();
        $this->documentRelations = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->relation;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

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
     * @return Collection|DocumentRelation[]
     */
    public function getDocumentRelations(): Collection
    {
        return $this->documentRelations;
    }

    public function addDocumentRelation(DocumentRelation $documentRelation): self
    {
        if (!$this->documentRelations->contains($documentRelation)) {
            $this->documentRelations[] = $documentRelation;
            $documentRelation->setDublinCore($this);
        }

        return $this;
    }

    public function removeDocumentRelation(DocumentRelation $documentRelation): self
    {
        if ($this->documentRelations->removeElement($documentRelation)) {
            // set the owning side to null (unless already changed)
            if ($documentRelation->getDublinCore() === $this) {
                $documentRelation->setDublinCore(null);
            }
        }

        return $this;
    }

}
