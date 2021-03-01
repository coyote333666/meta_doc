<?php

namespace App\Entity;

use App\Repository\DocumentDocumentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentDocumentRepository::class)
 * @ORM\Table(name="document_document", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="document_document_uk", columns={"document_source_id","document_target_id","dublin_core_id"})
 * })
 */
class DocumentDocument
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=DublinCore::class, inversedBy="documentDocuments")
     */
    private $dublin_core;

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

    public function getDublinCore(): ?DublinCore
    {
        return $this->dublin_core;
    }

    public function setDublinCore(?DublinCore $dublin_core): self
    {
        $this->dublin_core = $dublin_core;

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
