<?php

namespace App\Controller\Admin;

use App\Entity\DocumentRelation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class DocumentRelationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DocumentRelation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Document relation')
            ->setEntityLabelInPlural('Document relations')
            ->setSearchFields(['dublin_core_relation', 'document_source', 'document_target'])
            ->setPageTitle('edit', fn (DocumentRelation $documentRelation) => sprintf('Editing <b>%s</b>', $documentRelation->getDublinCoreRelation()))    
            ->setPageTitle('index', '%entity_label_plural% listing')
            ->setDefaultSort(['dublin_core_relation' => 'ASC','document_source' => 'ASC','document_target' => 'ASC']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('dublin_core_relation')
            ->add('document_source')
            ->add('document_target')
        ;
    }
    

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('dublin_core_relation');
        yield AssociationField::new('document_source');
        yield AssociationField::new('document_target');
    }
}
