<?php

namespace FinanceBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="FinanceBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Column(type="integer", name="keyid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $keyId;

    /**
     * @ORM\Column(type="text", name="Title")
     */
    private $title;

    /**
     * @ORM\Column(type="text", name="Text")
     */
    private $text;

    /**
     * @ORM\Column(type="datetime", name="CreationDate")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="datetime", name="LiveDate")
     */
    private $liveDate;

    /**
     * @ORM\Column(type="integer", name="ArticleTypeID")
     * @ORM\ManyToOne(targetEntity="ArticleType", inversedBy="keyId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $articleTypeId;

    /**
     * @return int
     */
    public function getKeyId()
    {
        return $this->keyId;
    }

    /**
     * @param int $keyId
     */
    public function setKeyId($keyId)
    {
        $this->keyId = $keyId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return \DateTime
     */
    public function getLiveDate()
    {
        return $this->liveDate;
    }

    /**
     * @param \DateTime $liveDate
     */
    public function setLiveDate($liveDate)
    {
        $this->liveDate = $liveDate;
    }

    /**
     * @return int
     */
    public function getArticleTypeId()
    {
        return $this->articleTypeId;
    }

    /**
     * @param int $articleTypeId
     */
    public function setArticleTypeId($articleTypeId)
    {
        $this->articleTypeId = $articleTypeId;
    }


}