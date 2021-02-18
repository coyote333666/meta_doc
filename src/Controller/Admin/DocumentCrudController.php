<?php

namespace App\Controller\Admin;

use App\Entity\Document;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class DocumentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Document::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Document')
            ->setEntityLabelInPlural('Documents')
            ->setSearchFields(['label', 'slug', 'start_Date'])
            ->setDefaultSort(['start_date' => 'DESC']);
        ;
    }
     public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('document'))
        ;
    }
    

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('classification');
        yield TextField::new('slug');
        yield TextField::new('label');
        yield TextField::new('version');
        yield TextField::new('state');
        yield TextField::new('uri');
        yield TextareaField::new('text')
            ->hideOnIndex()
        ;
        
        $start_date = DateField::new('start_date')->setFormTypeOptions([
            'html5' => true,
            'years' => range(date('Y'), date('Y') + 5),
            'widget' => 'single_text',
        ]);
        /*
        if (Crud::PAGE_EDIT === $pageName) {
            yield $start_date->setFormTypeOption('disabled', true);
        } else {
            yield $start_date;
        }
        */
        yield $start_date;
        $end_date = DateField::new('end_date')->setFormTypeOptions([
            'html5' => true,
            'years' => range(date('Y'), date('Y') + 5),
            'widget' => 'single_text',
        ]);
        /*
        if (Crud::PAGE_EDIT === $pageName) {
            yield $end_date->setFormTypeOption('disabled', true);
        } else {
            yield $end_date;
        }
        */
        yield $end_date;
    }
}
