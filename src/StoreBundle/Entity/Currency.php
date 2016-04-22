<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 20.04.2016
 * Time: 15:09
 */

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoreBundle\Entity\Currency
 *
 * @ORM\Entity
 * @ORM\Table(name="currency")
 */

class Currency
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=3, unique=true)
     */
    private $code;

    /**
     * @ORM\Column(name="is_default", type="boolean")
     */
    private $isDefault;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=2)
     */
    private $rate;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Currency
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Currency
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set isDefault
     *
     * @param boolean $isDefault
     *
     * @return Currency
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * Get isDefault
     *
     * @return boolean
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * Set rate
     *
     * @param string $rate
     *
     * @return Currency
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }
}
