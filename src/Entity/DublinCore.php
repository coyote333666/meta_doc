<?php

namespace App\Entity;

use App\Repository\DublinCoreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DublinCoreRepository::class)
 * @ORM\Table(name="dublin_core", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="dublin_core_uk", columns={"code"})
 * })
*/
class DublinCore
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
     * @ORM\Column(type="boolean")
     */
    private $is_relation;

    /**
     * @ORM\Column(type="string", length=4000, nullable=true)
     */
    private $descrip;

    /**
     * @ORM\OneToMany(targetEntity=Metadata::class, mappedBy="dublinCore")
     */
    private $metadatas;

    /**
     * @ORM\OneToMany(targetEntity=DocumentDocument::class, mappedBy="dublin_core")
     */
    private $documentDocuments;

    public function __construct()
    {
        $this->metadatas = new ArrayCollection();
        $this->documentDocuments = new ArrayCollection();
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

    public function getIsRelation(): ?bool
    {
        return $this->is_relation;
    }

    public function setIsRelation(bool $is_relation): self
    {
        $this->is_relation = $is_relation;

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
            $metadata->setDublinCore($this);
        }

        return $this;
    }

    public function removeMetadata(Metadata $metadata): self
    {
        if ($this->metadatas->removeElement($metadata)) {
            // set the owning side to null (unless already changed)
            if ($metadata->getDublinCore() === $this) {
                $metadata->setDublinCore(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DocumentDocument[]
     */
    public function getDocumentDocuments(): Collection
    {
        return $this->documentDocuments;
    }

    public function addDocumentDocument(DocumentDocument $documentDocument): self
    {
        if (!$this->documentDocuments->contains($documentDocument)) {
            $this->documentDocuments[] = $documentDocument;
            $documentDocument->setDublinCore($this);
        }

        return $this;
    }

    public function removeDocumentDocument(DocumentDocument $documentDocument): self
    {
        if ($this->documentDocuments->removeElement($documentDocument)) {
            // set the owning side to null (unless already changed)
            if ($documentDocument->getDublinCore() === $this) {
                $documentDocument->setDublinCore(null);
            }
        }

        return $this;
    }

}
