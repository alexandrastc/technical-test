<?php

namespace FinanceBundle\Controller;

use FinanceBundle\Service\BaseService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    /**
     * @Route("/time", name="get_today_date")
     * @param BaseService $baseService
     * @return Response
     */
    public function getTodayDateAction(BaseService  $baseService)
    {
        return $this->render('base.html.twig', [
            'title' => 'Time',
            'outputData' => $baseService->getTodayDateAsString()
        ]);
    }
}
