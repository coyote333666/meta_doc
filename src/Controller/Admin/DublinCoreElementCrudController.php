<?php

namespace App\Controller\Admin;

use App\Entity\DublinCoreElement;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class DublinCoreElementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DublinCoreElement::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Dublin core element')
            ->setEntityLabelInPlural('Dublin core elements')
            ->setSearchFields(['element', 'definition'])
            ->setPageTitle('edit', fn (DublinCoreElement $dublinCoreElement) => sprintf('Editing <b>%s</b>', $dublinCoreElement->getElement()))    
            ->setPageTitle('index', '%entity_label_plural% listing')
            ->setDefaultSort(['element' => 'DESC']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('element')
            ->add('definition');
    }
    

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('element');
        yield TextareaField::new('definition');
    }
}
