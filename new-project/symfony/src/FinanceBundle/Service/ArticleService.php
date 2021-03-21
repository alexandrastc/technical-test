<?php

namespace FinanceBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use FinanceBundle\Entity\Article;

class ArticleService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * ArticleService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Get the last Article ordered by live date DESC
     * @return Article|null
     */
    public function getLatestArticleByLiveDate()
    {
        $articleType = $this->em
            ->getRepository('FinanceBundle:ArticleType')
            ->findOneBy(['description' => 'Article']);

        if(empty($articleType)){
            return null;
        }

        $article = $this->em
            ->getRepository('FinanceBundle:Article')
            ->findBy(
                ['articleTypeId' => $articleType->getKeyId()],
                ['liveDate' => 'DESC']
            );

        return !empty($article[0]) ? $article[0] : null;
    }
}