<?php

namespace App\Controller;

use App\Entity\Header;
use App\Form\HeaderType;
use App\Repository\HeaderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/header')]
class AdminHeaderController extends AbstractController
{
    #[Route('/', name: 'app_admin_header_index', methods: ['GET'])]
    public function index(HeaderRepository $headerRepository): Response
    {
        return $this->render('admin_header/index.html.twig', [
            'headers' => $headerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_header_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $header = new Header();
        $form = $this->createForm(HeaderType::class, $header);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($header);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_header_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_header/new.html.twig', [
            'header' => $header,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_header_show', methods: ['GET'])]
    public function show(Header $header): Response
    {
        return $this->render('admin_header/show.html.twig', [
            'header' => $header,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_header_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Header $header, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HeaderType::class, $header);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_header_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_header/edit.html.twig', [
            'header' => $header,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_header_delete', methods: ['POST'])]
    public function delete(Request $request, Header $header, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$header->getId(), $request->request->get('_token'))) {
            $entityManager->remove($header);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_header_index', [], Response::HTTP_SEE_OTHER);
    }
}
