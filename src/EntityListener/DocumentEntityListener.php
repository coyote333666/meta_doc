<?php

namespace App\EntityListener;

use App\Entity\Document;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class DocumentEntityListener
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Document $document, LifecycleEventArgs $event)
    {
        $document->computeSlug($this->slugger);
    }

    public function preUpdate(Document $document, LifecycleEventArgs $event)
    {
        $document->computeSlug($this->slugger);
    }
}