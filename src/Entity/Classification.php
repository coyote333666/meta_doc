<?php

namespace App\Entity;

use App\Repository\ClassificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClassificationRepository::class)
 * @ORM\Table(name="classification", uniqueConstraints={
 *       @ORM\UniqueConstraint(name="classification_uk", columns={"code"})
 * })
*/
class Classification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=500)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $code;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Metadata::class, mappedBy="classifications")
     */
    private $metadata;

    /**
     * @ORM\ManyToMany(targetEntity=Admin::class, inversedBy="classifications")
     */
    private $admins;

    /**
     * @ORM\OneToMany(targetEntity=Document::class, mappedBy="classification")
     */
    private $documents;

    public function __construct()
    {
        $this->metadata = new ArrayCollection();
        $this->admins = new ArrayCollection();
        $this->documents = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->code;
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
     * @return Collection|Metadata[]
     */
    public function getMetadata(): Collection
    {
        return $this->metadata;
    }

    public function addMetadata(Metadata $metadata): self
    {
        if (!$this->metadata->contains($metadata)) {
            $this->metadata[] = $metadata;
            $metadata->addClassification($this);
        }

        return $this;
    }

    public function removeMetadata(Metadata $metadata): self
    {
        if ($this->metadata->removeElement($metadata)) {
            $metadata->removeClassification($this);
        }

        return $this;
    }

    /**
     * @return Collection|Admin[]
     */
    public function getAdmins(): Collection
    {
        return $this->admins;
    }

    public function addAdmin(Admin $admin): self
    {
        if (!$this->admins->contains($admin)) {
            $this->admins[] = $admin;
        }

        return $this;
    }

    public function removeAdmin(Admin $admin): self
    {
        $this->admins->removeElement($admin);

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
            $document->setClassification($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getClassification() === $this) {
                $document->setClassification(null);
            }
        }

        return $this;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
