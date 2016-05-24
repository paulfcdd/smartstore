<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 24.05.2016
 * Time: 12:25
 */

namespace StoreBundle\EventListener;

use Doctrine\ORM\Event\PostFlushEventArgs;
use StoreBundle\Entity\Keywords;
use StoreBundle\Entity\Translations;
use StoreBundle\Entity\Lang;

class AddKeyword
{

    public function postFlush(PostFlushEventArgs $args) {
//        $entity = $args->getEntity();
        $em = $args->getEntityManager();

        // only for acts on Keywords entity
//        if (!$entity instanceof Keywords) {
//            return;
//        }

        $translations = new Translations();
        $translations->setKeywordId('2');
        $translations->setLangCode('ua');
        $translations->setTranslation('kek');
        $em->persist($translations);
        $em->flush();
    }
}