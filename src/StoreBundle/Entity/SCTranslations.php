<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 10.06.2016
 * Time: 09:45
 */

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoreBundle\Entity\SCTranslations
 *
 * @ORM\Entity
 * @ORM\Table(name="sc_translations")
 */
class SCTranslations
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */

    private $scId;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $langCode;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $translation;



    /**
     * Set scId
     *
     * @param integer $scId
     *
     * @return SCTranslations
     */
    public function setScId($scId)
    {
        $this->scId = $scId;

        return $this;
    }

    /**
     * Get scId
     *
     * @return integer
     */
    public function getScId()
    {
        return $this->scId;
    }

    /**
     * Set langCode
     *
     * @param string $langCode
     *
     * @return SCTranslations
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
     * @return SCTranslations
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
