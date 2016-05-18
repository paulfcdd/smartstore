<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 17.05.2016
 * Time: 16:03
 */

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * StoreBundle\Entity\Keywords
 *
 * @ORM\Entity
 * @ORM\Table(name="keywords")
 */

class Keywords
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $keywordId;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $keywordVal;

    /**
     * @ORM\Column(type="integer", length=5)
     */
    private $pageId;



    /**
     * Get keywordId
     *
     * @return integer
     */
    public function getKeywordId()
    {
        return $this->keywordId;
    }

    /**
     * Set keywordVal
     *
     * @param string $keywordVal
     *
     * @return Keywords
     */
    public function setKeywordVal($keywordVal)
    {
        $this->keywordVal = $keywordVal;

        return $this;
    }

    /**
     * Get keywordVal
     *
     * @return string
     */
    public function getKeywordVal()
    {
        return $this->keywordVal;
    }

    /**
     * Set keywordPage
     *
     * @param string $keywordPage
     *
     * @return Keywords
     */
    public function setKeywordPage($keywordPage)
    {
        $this->keywordPage = $keywordPage;

        return $this;
    }

    /**
     * Get keywordPage
     *
     * @return string
     */
    public function getKeywordPage()
    {
        return $this->keywordPage;
    }

    /**
     * Set pageId
     *
     * @param integer $pageId
     *
     * @return Keywords
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;

        return $this;
    }

    /**
     * Get pageId
     *
     * @return integer
     */
    public function getPageId()
    {
        return $this->pageId;
    }
}
