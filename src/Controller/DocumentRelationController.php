<?php

namespace App\Controller;

use App\Entity\DocumentRelation;
use App\Form\DocumentRelationType;
use App\Repository\DocumentRelationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/document/relation")
 */
class DocumentRelationController extends AbstractController
{
    /**
     * @Route("/", name="document_relation_index", methods={"GET"})
     */
    public function index(DocumentRelationRepository $documentRelationRepository): Response
    {
        return $this->render('document_relation/index.html.twig', [
            'document_relations' => $documentRelationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="document_relation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $documentRelation = new DocumentRelation();
        $form = $this->createForm(DocumentRelationType::class, $documentRelation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($documentRelation);
            $entityManager->flush();

            return $this->redirectToRoute('document_relation_index');
        }

        return $this->render('document_relation/new.html.twig', [
            'document_relation' => $documentRelation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="document_relation_show", methods={"GET"})
     */
    public function show(DocumentRelation $documentRelation): Response
    {
        return $this->render('document_relation/show.html.twig', [
            'document_relation' => $documentRelation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="document_relation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DocumentRelation $documentRelation): Response
    {
        $form = $this->createForm(DocumentRelationType::class, $documentRelation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('document_relation_index');
        }

        return $this->render('document_relation/edit.html.twig', [
            'document_relation' => $documentRelation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="document_relation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DocumentRelation $documentRelation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$documentRelation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($documentRelation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('document_relation_index');
    }
}
