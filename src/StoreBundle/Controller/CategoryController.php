<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 02.06.2016
 * Time: 12:22
 */

namespace StoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function categoryAction($title) {

        $sysLang = new Session();

//        var_dump($sysLang->get('selectedLang'));

        return $this->render('Store/tpl/category.html.twig', array(
           'title' => $title
        ));

    }
}