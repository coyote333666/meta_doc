<?php

namespace App\Entity;

use App\Repository\ClassificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @Gedmo\Tree(type="nested")
 * @ORM\Entity(repositoryClass=ClassificationRepository::class)
 * @ORM\Table(name="classification", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="classification_uk", columns={"code"})
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
     * @ORM\Column(type="string", length=50)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=4000, nullable=true)
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
     * @ORM\ManyToOne(targetEntity=Classification::class, inversedBy="classifications")
     */
    private $classification;

    /**
     * @ORM\OneToMany(targetEntity=Classification::class, mappedBy="classification")
     */
    private $classifications;

    /**
     * @ORM\OneToMany(targetEntity=Document::class, mappedBy="classification")
     */
    private $documents;

    public function __construct()
    {
        $this->metadata = new ArrayCollection();
        $this->admins = new ArrayCollection();
        $this->classifications = new ArrayCollection();
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

    public function getClassification(): ?self
    {
        return $this->classification;
    }

    public function setClassification(?self $classification): self
    {
        $this->classification = $classification;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getClassifications(): Collection
    {
        return $this->classifications;
    }

    public function addClassification(self $classification): self
    {
        if (!$this->classifications->contains($classification)) {
            $this->classifications[] = $classification;
            $classification->setClassification($this);
        }

        return $this;
    }

    public function removeClassification(self $classification): self
    {
        if ($this->classifications->removeElement($classification)) {
            // set the owning side to null (unless already changed)
            if ($classification->getClassification() === $this) {
                $classification->setClassification(null);
            }
        }

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
}
