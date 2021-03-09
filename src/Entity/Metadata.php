<?php

namespace App\Entity;

use App\Repository\MetadataRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MetadataRepository::class)
 * @ORM\Table(name="metadata", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="metadata_uk", columns={"term","dublin_core_element_id"})
 * })
 */
class Metadata
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
    private $term;

    /**
     * @ORM\Column(type="string", length=4000, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Document::class, mappedBy="metadatas")
     */
    private $documents;

    /**
     * @ORM\ManyToMany(targetEntity=Classification::class, mappedBy="metadatas")
     */
    private $classifications;

    /**
     * @ORM\ManyToOne(targetEntity=DublinCoreElement::class, inversedBy="metadatas")
    */
    private $dublin_core_element;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
        $this->classifications = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->dublin_core_element . ' : ' .  $this->term;
    }
  
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(string $term): self
    {
        $this->term = $term;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->addMetadata($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->removeElement($document)) {
            $document->removeMetadata($this);
        }

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
            $classification->addMetadata($this);
        }

        return $this;
    }

    public function removeClassification(Classification $classification): self
    {
        if ($this->classifications->removeElement($classification)) {
            $classification->removeMetadata($this);
        }

        return $this;
    }

    public function getDublinCoreElement(): ?DublinCoreElement
    {
        return $this->dublin_core_element;
    }

    public function setDublinCoreElement(?DublinCoreElement $dublin_core_element): self
    {
        $this->dublin_core_element = $dublin_core_element;

        return $this;
    }

}
