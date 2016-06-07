<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 07.06.2016
 * Time: 14:13
 */

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * StoreBundle\Entity\CTranslations
 *
 * @ORM\Entity
 * @ORM\Table(name="c_translations")
 */
class CTranslations
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */

    private $cId;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $langCode;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $translation;



    /**
     * Set cId
     *
     * @param integer $cId
     *
     * @return CTranslations
     */
    public function setCId($cId)
    {
        $this->cId = $cId;

        return $this;
    }

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
     * Set langCode
     *
     * @param string $langCode
     *
     * @return CTranslations
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
     * Set translation
     *
     * @param string $translation
     *
     * @return CTranslations
     */
    public function setTranslation($translation)
    {
        $this->translation = $translation;

        return $this;
    }

    /**
     * Get translation
     *
     * @return string
     */
    public function getTranslation()
    {
        return $this->translation;
    }
}
