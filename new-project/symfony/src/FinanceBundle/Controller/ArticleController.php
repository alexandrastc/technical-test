<?php

namespace FinanceBundle\Controller;

use FinanceBundle\Service\ArticleService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    /**
     * @Route("/", name="get_articles")
     * @param ArticleService $articleService
     * @return Response
     */
    public function getArticlesAction(ArticleService  $articleService)
    {
        $article = $articleService->getLatestArticleByLiveDate();

        if(empty($article)){
            return $this->render('base.html.twig', [
                'title' => 'Hello!',
                'outputData' => ''
            ]);
        }

        return $this->render('base.html.twig', [
            'title' => $article->getTitle(),
            'outputData' => $article->getText()
        ]);
    }
}
