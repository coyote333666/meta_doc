<?php

namespace App\Controller\Admin;

use App\Entity\Metadata;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class MetadataCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Metadata::class;
    }



    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Metadata')
            ->setEntityLabelInPlural('Metadatas')
            ->setSearchFields(['term', 'description'])
            ->setPageTitle('edit', fn (Metadata $metadata) => sprintf('Editing <b>%s</b>', $metadata->getTerm()))    
            ->setPageTitle('index', '%entity_label_plural% listing')
            ->setDefaultSort(['term' => 'ASC','dublin_core' => 'ASC']);
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('term')
            ->add('dublin_core')
            ->add('description');
        }
    

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('term');
        yield AssociationField::new('dublin_core');
        yield TextareaField::new('description');
    }
}
