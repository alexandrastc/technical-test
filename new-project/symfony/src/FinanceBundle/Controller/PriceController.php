<?php

namespace FinanceBundle\Controller;

use FinanceBundle\Service\PriceService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class PriceController extends Controller
{
    /**
     * @Route("/price", name="get_vat_price")
     * @param PriceService $priceService
     * @return Response
     */
    public function getVatPriceAction(PriceService  $priceService)
    {
        $priceWithVat = $priceService->getPriceWithVatArray();

        return $this->render('base.html.twig', [
            'title' => 'Today\'s price',
            'outputData' => ' final price: ' . $priceWithVat['price'] . ' Tax: ' . $priceWithVat['vat']
        ]);
    }
}
