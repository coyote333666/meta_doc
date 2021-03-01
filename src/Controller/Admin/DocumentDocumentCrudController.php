<?php

namespace App\Controller\Admin;

use App\Entity\DocumentDocument;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class DocumentDocumentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DocumentDocument::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Document relation')
            ->setEntityLabelInPlural('Document relations')
            ->setSearchFields(['dublin_core', 'document_source', 'document_target'])
            ->setPageTitle('edit', fn (DocumentDocument $documentDocument) => sprintf('Editing <b>%s</b>', $documentDocument->getDublinCore()))    
            ->setPageTitle('index', '%entity_label_plural% listing')
            ->setDefaultSort(['dublin_core' => 'ASC','document_source' => 'ASC','document_target' => 'ASC']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('documentDocument'))
        ;
    }
    

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('dublin_core');
        yield AssociationField::new('document_source');
        yield AssociationField::new('document_target');
    }
}
