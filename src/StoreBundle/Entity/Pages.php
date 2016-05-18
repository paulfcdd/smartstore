<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 18.05.2016
 * Time: 10:06
 */

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoreBundle\Entity\Pages
 *
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */

class Pages
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $pageId;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $pageName;


    /**
     * Get pageId
     *
     * @return integer
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * Set pageName
     *
     * @param string $pageName
     *
     * @return Pages
     */
    public function setPageName($pageName)
    {
        $this->pageName = $pageName;

        return $this;
    }

    /**
     * Get pageName
     *
     * @return string
     */
    public function getPageName()
    {
        return $this->pageName;
    }
}
