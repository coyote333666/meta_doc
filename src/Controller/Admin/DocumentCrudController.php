<?php

namespace App\Controller\Admin;

use App\Entity\Document;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

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
            ->setSearchFields(['title', 'text'])
            ->setPageTitle('edit', fn (Document $document) => sprintf('Editing <b>%s</b>', $document->getTitle()))    
            ->setPageTitle('index', '%entity_label_plural% listing')
            ->setDefaultSort(['start_date' => 'DESC']);
        ;
    }    

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('classification')
            ->add('title')
            ->add('version')
            ->add('state')
            ->add('uri')
            ->add('text')
            ->add('start_date')
            ->add('end_date')
            ->add('metadatas')
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('classification');
        yield TextField::new('slug')
        ->hideOnIndex()
        ->hideOnForm();
        yield TextField::new('title');
        yield TextField::new('version');
        yield ChoiceField::new('state')
        ->setChoices(['creation' => 'creation', 'revision' => 'revision', 'active' => 'active', 'semi-active' => 'semi-active', 'inactive' => 'inactive']);
        yield TextField::new('uri')
        ->hideOnIndex();
        yield TextEditorField::new('text')
        ->hideOnIndex();
        $start_date = DateField::new('start_date')->setFormTypeOptions([
            'html5' => true,
            'years' => range(date('Y'), date('Y') + 5),
            'widget' => 'single_text',
        ]);
        yield $start_date;
        $end_date = DateField::new('end_date')->setFormTypeOptions([
            'html5' => true,
            'years' => range(date('Y'), date('Y') + 5),
            'widget' => 'single_text',
        ]);
        yield $end_date;
        yield AssociationField::new('metadatas');
   }
}
