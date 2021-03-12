<?php

namespace App\Controller;

use App\Entity\Classification;
use App\Entity\Document;
use App\Form\DocumentFormType;
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
        $response = new Response($this->twig->render('classification/index.html.twig', [
            'classifications' => $classificationRepository->findAll(),
            ]));
        $response->setSharedMaxAge(3600);
        return $response;
    }

    /**
     * @Route("/classification_header", name="classification_header")
     */
    public function classificationHeader(ClassificationRepository $classificationRepository): Response
    {
        $response = new Response($this->twig->render('classification/header.html.twig', [
            'classifications' => $classificationRepository->findAll(),
        ]));
        $response->setSharedMaxAge(3600);

        return $response;
    }

    /**
     * @Route("/classification/{code}", name="classification")
     */
    public function show(Request $request, Classification $classification, DocumentRepository $documentRepository): Response
    {
        $document = new Document();
        $form = $this->createForm(DocumentFormType::class, $document, [
            'classification_choice' => $classification->getId(),
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $document->setClassification($classification);
        
            $this->entityManager->persist($document);
            $this->entityManager->flush();
        
            return $this->redirectToRoute('classification', ['code' => $classification->getCode()]);
        }        

        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $documentRepository->getDocumentPaginator($classification, $offset);
           
        return new Response($this->twig->render('classification/show.html.twig', [
            'classification' => $classification,
            'documents' => $paginator,
            'previous' => $offset - DocumentRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + DocumentRepository::PAGINATOR_PER_PAGE),
            'document_form' => $form->createView(),
            ]));
    }
}
