<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;


class ArticleController extends AbstractController
{
    /**
     * @Route("/article/new", name="article_new")
     * @param Article $article
     * @return RedirectResponse
     */
    public function new(Request $request,EntityManagerInterface $entityManager ): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute("home");
        }

        return $this->render('article/new.html.twig',[
            "form"=>$form->createView()
        ]);

    }
}

