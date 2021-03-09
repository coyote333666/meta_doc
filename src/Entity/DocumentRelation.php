<?php

namespace App\Entity;

use App\Repository\DocumentRelationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentRelationRepository::class)
 * @ORM\Table(name="document_relation", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="document_relation_uk", columns={"document_source_id","document_target_id","dublin_core_relation_id"})
 * })
 */
class DocumentRelation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=DublinCoreRelation::class, inversedBy="documentRelations")
     */
    private $dublin_core_relation;

    /**
     * @ORM\ManyToOne(targetEntity=Document::class, inversedBy="documentSources")
     * @ORM\JoinColumn(nullable=false)
     */
    private $document_source;

    /**
     * @ORM\ManyToOne(targetEntity=Document::class, inversedBy="documentTargets")
     * @ORM\JoinColumn(nullable=false)
    */
    private $document_target;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->document_source . ' ' . $this->dublin_core_relation . ' ' . $this->document_target ;
    }

    public function getDublinCoreRelation(): ?DublinCoreRelation
    {
        return $this->dublin_core_relation;
    }

    public function setDublinCoreRelation(?DublinCoreRelation $dublin_core_relation): self
    {
        $this->dublin_core_relation = $dublin_core_relation;

        return $this;
    }

    public function getDocumentSource(): ?Document
    {
        return $this->document_source;
    }

    public function setDocumentSource(?Document $document_source): self
    {
        $this->document_source = $document_source;

        return $this;
    }

    public function getDocumentTarget(): ?Document
    {
        return $this->document_target;
    }

    public function setDocumentTarget(?Document $document_target): self
    {
        $this->document_target = $document_target;

        return $this;
    }
}
