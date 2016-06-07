<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 07.06.2016
 * Time: 11:43
 */

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * StoreBundle\Entity\Categories
 *
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */
class Categories
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $cId;
    
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
     * Set cKeyword
     *
     * @param string $cKeyword
     *
     * @return Categories
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
