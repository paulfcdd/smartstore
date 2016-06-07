<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 07.06.2016
 * Time: 12:59
 */

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * StoreBundle\Entity\Subcategories
 *
 * @ORM\Entity
 * @ORM\Table(name="subcategories")
 */
class Subcategories
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $cId;

    /**
     * @ORM\Column(type="integer", length=5)
     */
    private $parentId;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $cKeyword;


    /**
     * Get cId
     *
     * @return integer
     */
    public function getCId()
    {
        return $this->cId;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return Subcategories
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set cKeyword
     *
     * @param string $cKeyword
     *
     * @return Subcategories
     */
    public function setCKeyword($cKeyword)
    {
        $this->cKeyword = $cKeyword;

        return $this;
    }

    /**
     * Get cKeyword
     *
     * @return string
     */
    public function getCKeyword()
    {
        return $this->cKeyword;
    }
}
