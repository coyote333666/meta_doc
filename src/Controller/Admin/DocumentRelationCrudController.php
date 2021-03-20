<?php

namespace App\Controller\Admin;

use App\Entity\DocumentRelation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Contracts\Translation\TranslatorInterface;

class DocumentRelationCrudController extends AbstractCrudController
{
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public static function getEntityFqcn(): string
    {
        return DocumentRelation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        $editing = $this->translator->trans('admin.editing');
        $documentRelations = $this->translator->trans('admin.documentRelations');

        return $crud
            ->setEntityLabelInSingular('Document relation')
            ->setEntityLabelInPlural('Document relations')
            ->setSearchFields(['dublin_core_relation', 'document_source', 'document_target'])
            ->setPageTitle('edit', fn (DocumentRelation $documentRelation) => sprintf($editing . ' : <b>%s</b>', $documentRelation->getDublinCoreRelation()))    
            ->setPageTitle('index', $documentRelations)
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
