<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 17.05.2016
 * Time: 16:23
 */

namespace StoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * StoreBundle\Entity\Lang
 *
 * @ORM\Entity
 * @ORM\Table(name="lang")
 */

class Lang
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $langId;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $langCode;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $langName;


    /**
     * Get langId
     *
     * @return integer
     */
    public function getLangId()
    {
        return $this->langId;
    }

    /**
     * Set langCode
     *
     * @param string $langCode
     *
     * @return Lang
     */
    public function setLangCode($langCode)
    {
        $this->langCode = $langCode;

        return $this;
    }

    /**
     * Get langCode
     *
     * @return string
     */
    public function getLangCode()
    {
        return $this->langCode;
    }

    /**
     * Set langName
     *
     * @param string $langName
     *
     * @return Lang
     */
    public function setLangName($langName)
    {
        $this->langName = $langName;

        return $this;
    }

    /**
     * Get langName
     *
     * @return string
     */
    public function getLangName()
    {
        return $this->langName;
    }
}
