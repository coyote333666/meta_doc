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

class DashboardController extends AbstractDashboardController
{
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
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Documents', 'fas fa-file', Document::class);
        yield MenuItem::linkToCrud('Classifications', 'fas fa-tree', Classification::class);
        yield MenuItem::linkToCrud('Document relations', 'fas fa-bezier-curve', DocumentRelation::class);
        yield MenuItem::linkToCrud('Dublin core element', 'fas fa-key', DublinCoreElement::class);
        yield MenuItem::linkToCrud('Dublin core relation', 'fas fa-key', DublinCoreRelation::class);
        yield MenuItem::linkToCrud('Metadata', 'fas fa-file-code', Metadata::class);
    }
}
