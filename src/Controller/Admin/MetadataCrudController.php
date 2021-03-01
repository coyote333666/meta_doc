<?php

namespace App\Controller\Admin;

use App\Entity\Metadata;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

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
            ->setSearchFields(['code', 'description'])
            ->setPageTitle('edit', fn (Metadata $metadata) => sprintf('Editing <b>%s</b>', $metadata->getCode()))    
            ->setPageTitle('index', '%entity_label_plural% listing')
            ->setDefaultSort(['code' => 'DESC']);
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('metadata'));
    }
    

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('code');
        yield BooleanField::new('is_relation');
        yield TextEditorField::new('description');
    }
}
