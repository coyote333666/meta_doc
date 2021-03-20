<?php

namespace App\Controller\Admin;

use App\Entity\Document;
use App\Entity\Classification;
use App\Entity\DocumentRelation;
use App\Entity\DublinCoreElement;
use App\Entity\DublinCoreRelation;
use App\Entity\Metadata;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class DashboardController extends AbstractDashboardController
{
    private $translator;
    
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        $url = $routeBuilder->setController(ClassificationCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Meta_doc');
    }

    public function configureMenuItems(): iterable
    {
        $website = $this->translator->trans('admin.back_website');
        $relations = $this->translator->trans('admin.relations');
        $documents = $this->translator->trans('admin.documents');
        $classifications = $this->translator->trans('admin.classifications');
        $dublinElements = $this->translator->trans('admin.dublinElements');
        $dublinRelations = $this->translator->trans('admin.dublinRelations');
        $metadatas = $this->translator->trans('admin.metadatas');

        yield MenuItem::linktoRoute($website, 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud($documents, 'fas fa-file', Document::class);
        yield MenuItem::linkToCrud($classifications, 'fas fa-tree', Classification::class);
        yield MenuItem::linkToCrud($relations, 'fas fa-bezier-curve', DocumentRelation::class);
        yield MenuItem::linkToCrud($dublinElements, 'fas fa-key', DublinCoreElement::class);
        yield MenuItem::linkToCrud($dublinRelations, 'fas fa-key', DublinCoreRelation::class);
        yield MenuItem::linkToCrud($metadatas, 'fas fa-file-code', Metadata::class);
    }
}
