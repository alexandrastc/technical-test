<?php

namespace FinanceBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class PriceService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var BaseService
     */
    private $baseService;

    /**
     * ArticleService constructor.
     * @param EntityManagerInterface $em
     * @param BaseService $baseService
     */
    public function __construct(
        EntityManagerInterface $em,
        BaseService $baseService
    ){
        $this->em = $em;
        $this->baseService = $baseService;
    }

    public function getPrice()
    {
        $option = $this->em
            ->getRepository('FinanceBundle:Option')
            ->findOneBy(['name' => 'price']);

        if(empty($option)){
            return "0.00";
        }

        return $option->getValue();
    }

    public function getPriceWithVatArray()
    {
        $price = $this->getPrice();

        if($price == "0.00"){
            return $price;
        }

        $tax = "0.00";
        $rate = 20;

        $fullprice = (int)($price*100);
        $tax = floor($fullprice*$rate)/100;
        $tax = (int) $tax;

        $finalprice = $fullprice + $tax;
        $price = $this->calculatePrice($finalprice);
        $tax = $this->calculatePrice($tax);

        return [
            'price' => $price,
            'vat' => $tax
        ];

    }

    private function calculatePrice($price)
    {
        $p1 = floor($price/100);
        $p2 = $p1*100;
        $p3 = $price - $p2;
        $p4 = "$p3";
        if ($p3 < 9) $p4 = "0".$p3;

        return $p1.".".$p4;
    }
}