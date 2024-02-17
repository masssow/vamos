<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotFoundController extends AbstractController
{
    #[Route('/page-404', name: 'app_not_found')]
    public function index(): Response
    {
        return $this->render('not_found/index.html.twig', [
        ]);
    }
}
