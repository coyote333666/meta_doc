<?php

namespace App\Controller\Admin;

use App\Entity\DublinCoreElement;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Symfony\Contracts\Translation\TranslatorInterface;

class DublinCoreElementCrudController extends AbstractCrudController
{
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public static function getEntityFqcn(): string
    {
        return DublinCoreElement::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        $editing = $this->translator->trans('admin.editing');
        $dublinElements = $this->translator->trans('admin.dublinElements');

        return $crud
            ->setEntityLabelInSingular('Dublin core element')
            ->setEntityLabelInPlural('Dublin core elements')
            ->setSearchFields(['element', 'definition'])
            ->setPageTitle('edit', fn (DublinCoreElement $dublinCoreElement) => sprintf($editing . ' : <b>%s</b>', $dublinCoreElement->getElement()))    
            ->setPageTitle('index', $dublinElements)
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
