<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Video;
use App\Entity\Article;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\EventRepository;
use App\Repository\HeaderRepository;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/', name: 'app_home')]
    public function index(ArticleRepository $article, HeaderRepository $header, Request $request, EventRepository $event): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('Success', 'votre message a bien été envoyé, merci');
            $form->getData();
            $this->entityManager->persist($contact);
            $this->entityManager->flush();
        }
        // $article = $this->entityManager->getRepository(Article::class)->findByIsBest(1);
        return $this->render('home/index.html.twig', [
            'article'   => $article->findBy(["isBest" =>true]),
            'header'    => $header->findBy(["isBest" => true]),
            // 'video'     => $video,
            'contact'   => $form->createView(),
            'event'     => $event->findBy(["isBest" => true])

        ]);
    }
   
}
