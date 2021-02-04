<?php

namespace App\Controller;

use App\Repository\DocumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class DocumentController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Environment $twig, DocumentRepository $documentRepository): Response
    {
        return new Response($twig->render('document/index.html.twig', [
                'documents' => $documentRepository->findAll(),
            ]));
    }
}
