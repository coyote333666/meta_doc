<?php

namespace App\Controller;

use App\Entity\Classification;
use App\Repository\DocumentRepository;
use App\Repository\ClassificationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ClassificationController extends AbstractController
{
    private $twig;
    private $entityManager;
    
    public function __construct(Environment $twig, EntityManagerInterface $entityManager)
    {
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index(ClassificationRepository $classificationRepository): Response
    {
        return new Response($this->twig->render('classification/index.html.twig', [
            'classifications' => $classificationRepository->findAll(),
            ]));
    }

    /**
     * @Route("/classification_header", name="classification_header")
     */
    public function classificationHeader(ClassificationRepository $classificationRepository): Response
    {
        return new Response($this->twig->render('classification/header.html.twig', [
            'classifications' => $classificationRepository->findAll(),
        ]));
    }

    /**
     * @Route("/classification/{code}", name="classification")
     */
    public function show(Request $request, Classification $classification, DocumentRepository $documentRepository): Response
    {
        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $documentRepository->getDocumentPaginator($classification, $offset);
           
        return new Response($this->twig->render('classification/show.html.twig', [
            'classification' => $classification,
            'documents' => $paginator,
            'previous' => $offset - DocumentRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + DocumentRepository::PAGINATOR_PER_PAGE),
            ]));
    }

    /**
     * @Route("/search", methods="GET", name="document_search")
     */
    public function search(Request $request, DocumentRepository $documents): Response
    {
        $query = $request->query->get('q', '');
        $limit = $request->query->get('l', 50);
        
        if (!$request->isXmlHttpRequest()) {
            return $this->render('document/search.html.twig', ['query' => $query]);
        }
        
        $foundDocuments = $documents->findBySearchQuery($query, $limit);

        $results = [];
        foreach ($foundDocuments as $document) {
            $details = '';
            $details .= 'Date : ' . $document->getStartDate()->format('Y-m-d');
            $details .= ' ; ' . 'Classification : ' . $document->getClassification();
            foreach ($document->getMetadatas() as $meta) {
                $details .= ' ; ' . $meta;
            }
            $results[] = [
                'title' => htmlspecialchars($document->getTitle(), ENT_COMPAT | ENT_HTML5),
                'summary' => htmlspecialchars($details, ENT_COMPAT | ENT_HTML5),
                'url' => $this->generateUrl('document_show', ['id' => $document->getId()]),
            ];
        }

        return $this->json($results);
    }
}
