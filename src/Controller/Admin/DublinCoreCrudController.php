<?php

namespace App\Controller\Admin;

use App\Entity\DublinCore;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class DublinCoreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DublinCore::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('DublinCore')
            ->setEntityLabelInPlural('DublinCores')
            ->setSearchFields(['code', 'description'])
            ->setPageTitle('edit', fn (DublinCore $dublinCore) => sprintf('Editing <b>%s</b>', $dublinCore->getCode()))    
            ->setPageTitle('index', '%entity_label_plural% listing')
            ->setDefaultSort(['code' => 'DESC']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('dublinCore'));
    }
    

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('code');
        yield BooleanField::new('is_relation');
        yield TextEditorField::new('description');
    }
}
