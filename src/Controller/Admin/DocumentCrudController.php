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
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use App\Repository\MetadataRepository;
use Symfony\Contracts\Translation\TranslatorInterface;

class DocumentCrudController extends AbstractCrudController
{
    private $translator;
    
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public static function getEntityFqcn(): string
    {
        return Document::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        $editing = $this->translator->trans('admin.editing');
        $documents = $this->translator->trans('admin.documents');

        return $crud
            ->setEntityLabelInSingular('Document')
            ->setEntityLabelInPlural('Documents')
            ->setSearchFields(['title', 'text'])
            ->setPageTitle('edit', fn (Document $document) => sprintf($editing . ' : <b>%s</b>', $document->getTitle()))    
            ->setPageTitle('index', $documents)
            ->setDefaultSort(['classification' => 'ASC','title' => 'ASC']);
       ;
    }    

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('classification')
            ->add('title')
            ->add('id')
            ->add('version')
            ->add('state')
            ->add('text')
            ->add('start_date')
            ->add('end_date')
            ->add('metadatas')
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        $Creation = $this->translator->trans('state.creation');
        $Revision = $this->translator->trans('state.revision');
        $Active = $this->translator->trans('state.active');
        $SemiActive = $this->translator->trans('state.semi_active');
        $Inactive = $this->translator->trans('state.inactive');

        yield AssociationField::new('classification');
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title');
        yield TextField::new('version');
        yield ChoiceField::new('state')
        ->setChoices([$Creation => $Creation, $Revision => $Revision, $Active => $Active,  $SemiActive =>  $SemiActive, $Inactive => $Inactive]);
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
