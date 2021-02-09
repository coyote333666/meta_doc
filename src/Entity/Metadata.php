<?php

namespace App\Entity;

use App\Repository\MetadataRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MetadataRepository::class)
 * @ORM\Table(name="metadata", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="metadata_uk", columns={"code"})
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
    private $code;

    /**
     * @ORM\Column(type="string", length=4000, nullable=true)
     */
    private $descrip;

    /**
     * @ORM\ManyToMany(targetEntity=Document::class, mappedBy="metadatas")
     */
    private $documents;

    /**
     * @ORM\ManyToMany(targetEntity=Classification::class, inversedBy="metadata")
     */
    private $classifications;

    /**
     * @ORM\ManyToOne(targetEntity=DublinCore::class, inversedBy="metadatas")
     */
    private $dublinCore;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
        $this->classifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDescrip(): ?string
    {
        return $this->descrip;
    }

    public function setDescrip(?string $descrip): self
    {
        $this->descrip = $descrip;

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
        }

        return $this;
    }

    public function removeClassification(Classification $classification): self
    {
        $this->classifications->removeElement($classification);

        return $this;
    }

    public function getDublinCore(): ?DublinCore
    {
        return $this->dublinCore;
    }

    public function setDublinCore(?DublinCore $dublinCore): self
    {
        $this->dublinCore = $dublinCore;

        return $this;
    }

}
