<?php

namespace FinanceBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="articletype")
 */
class ArticleType
{
    /**
     * @ORM\Column(type="integer", name="keyid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="Article", mappedBy="articleTypeId")
     */
    private $keyId;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $description;

    /**
     * @return mixed
     */
    public function getKeyId()
    {
        return $this->keyId;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}