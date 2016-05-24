<?php

namespace StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoreBundle\Entity\Translations
 *
 * @ORM\Entity
 * @ORM\Table(name="translations")
 */
class Translations
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */

    private $keywordId;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $langCode;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $translation;


    /**
     * Set keywordId
     *
     * @param integer $keywordId
     *
     * @return Translations
     */
    public function setKeywordId($keywordId)
    {
        $this->keywordId = $keywordId;

        return $this;
    }

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
     * Set langCode
     *
     * @param string $langCode
     *
     * @return Translations
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
     * @return Translations
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
