<?php

namespace App\Controller\Admin;

use App\Entity\DublinCoreRelation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Symfony\Contracts\Translation\TranslatorInterface;

class DublinCoreRelationCrudController extends AbstractCrudController
{
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

   public static function getEntityFqcn(): string
    {
        return DublinCoreRelation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        $editing = $this->translator->trans('admin.editing');
        $dublinElements = $this->translator->trans('admin.dublinElements');

        return $crud
            ->setEntityLabelInSingular('Dublin core relation')
            ->setEntityLabelInPlural('Dublin core relations')
            ->setSearchFields(['relation', 'definition'])
            ->setPageTitle('edit', fn (DublinCoreRelation $dublinCoreRelation) => sprintf($editing . ' : <b>%s</b>', $dublinCoreRelation->getRelation()))    
            ->setPageTitle('index', $dublinElements)
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
