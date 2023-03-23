<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    public function __construct
    ( 
        private ArticleRepository $articleRepository
    ) {   
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {   
        $articles = $this->articleRepository->findAll();

        return $this->render('index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
