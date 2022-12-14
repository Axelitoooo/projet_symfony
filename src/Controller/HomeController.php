<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/{id}/show", name="article_show")
     * @param Article $article
     * @return Response
     */
    public function show(Article $article): Response
    {
        return $this->render("article/show.html.twig",[
            "article"=>$article
        ]);
    }
    /**
     * @Route ("/", name="home")
     * @param ArticleRepository $articleRepository
     * @return Response
     */

    public function home(ArticleRepository $articleRepository)
    {
        return $this->render('index.html.twig',[
            "articles"=>$articleRepository->findAll()
        ]);
    }
}

