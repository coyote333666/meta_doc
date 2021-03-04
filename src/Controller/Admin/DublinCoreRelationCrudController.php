<?php

namespace App\Controller\Admin;

use App\Entity\DublinCoreRelation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class DublinCoreRelationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DublinCoreRelation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Dublin core relation')
            ->setEntityLabelInPlural('Dublin core relations')
            ->setSearchFields(['relation', 'definition'])
            ->setPageTitle('edit', fn (DublinCoreRelation $dublinCoreRelation) => sprintf('Editing <b>%s</b>', $dublinCoreRelation->getRelation()))    
            ->setPageTitle('index', '%entity_label_plural% listing')
            ->setDefaultSort(['relation' => 'DESC']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('relation')
            ->add('definition');
    }
    

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('relation');
        yield TextareaField::new('definition');
    }
}
