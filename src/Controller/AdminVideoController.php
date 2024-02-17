<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\VideoType;
use App\Repository\VideoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/video')]
class AdminVideoController extends AbstractController
{
    #[Route('/', name: 'app_admin_video_index', methods: ['GET'])]
    public function index(VideoRepository $videoRepository): Response
    {
        return $this->render('admin_video/index.html.twig', [
            'videos' => $videoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_video_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $video = new Video();
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($video);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_video_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_video/new.html.twig', [
            'video' => $video,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_video_show', methods: ['GET'])]
    public function show(Video $video): Response
    {
        return $this->render('admin_video/show.html.twig', [
            'video' => $video,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_video_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Video $video, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_video_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_video/edit.html.twig', [
            'video' => $video,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_video_delete', methods: ['POST'])]
    public function delete(Request $request, Video $video, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$video->getId(), $request->request->get('_token'))) {
            $entityManager->remove($video);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_video_index', [], Response::HTTP_SEE_OTHER);
    }
}
