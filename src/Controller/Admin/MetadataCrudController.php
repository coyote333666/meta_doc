<?php

namespace App\Controller\Admin;

use App\Entity\Metadata;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Contracts\Translation\TranslatorInterface;

class MetadataCrudController extends AbstractCrudController
{
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public static function getEntityFqcn(): string
    {
        return Metadata::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        $editing = $this->translator->trans('admin.editing');
        $metadatas = $this->translator->trans('admin.metadatas');

        return $crud
            ->setEntityLabelInSingular('Metadata')
            ->setEntityLabelInPlural('Metadatas')
            ->setSearchFields(['term', 'description'])
            ->setPageTitle('edit', fn (Metadata $metadata) => sprintf($editing . ' : <b>%s</b>', $metadata->getTerm()))    
            ->setPageTitle('index', $metadatas)
            ->setDefaultSort(['term' => 'ASC','dublin_core_element' => 'ASC']);
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('term')
            ->add('dublin_core_element')
            ->add('description');
        }
    

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('term');
        yield AssociationField::new('dublin_core_element');
        yield TextareaField::new('description');
    }
}
