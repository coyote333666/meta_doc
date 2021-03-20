<?php

namespace App\Controller\Admin;

use App\Entity\Classification;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Contracts\Translation\TranslatorInterface;

class ClassificationCrudController extends AbstractCrudController
{
    private $translator;
    
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public static function getEntityFqcn(): string
    {
        return Classification::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('code')
            ->add('title')
            ->add('description')
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        $editing = $this->translator->trans('admin.editing');
        $classifications = $this->translator->trans('admin.classifications');
 
        return $crud
            ->setEntityLabelInSingular('Classification')
            ->setEntityLabelInPlural('Classifications')
            ->setSearchFields(['title', 'code', 'description'])
            ->setPageTitle('edit', fn (Classification $classification) => sprintf($editing . ' : <b>%s</b>', $classification->getTitle()))    
            ->setPageTitle('index', $classifications)
            ->setDefaultSort(['code' => 'ASC','title' => 'ASC']);
        ;
    }
 
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('code');
        yield TextField::new('title');
        yield TextEditorField::new('description')
            ->hideOnIndex();        
    }
}
