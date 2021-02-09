<?php

namespace App\Entity;

use App\Repository\ClassificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClassificationRepository::class)
  * @ORM\Table(name="classification", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="classification_uk", columns={"code", "classification_id"})
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
    private $descrip;

    /**
     * @ORM\ManyToMany(targetEntity=Metadata::class, mappedBy="classifications")
     */
    private $metadata;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="classifications")
     */
    private $users;

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
        $this->users = new ArrayCollection();
        $this->classifications = new ArrayCollection();
        $this->documents = new ArrayCollection();
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
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->users->removeElement($user);

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
