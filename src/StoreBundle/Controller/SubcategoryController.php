<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 13.06.2016
 * Time: 14:40
 */

namespace StoreBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SubcategoryController extends Controller
{

    public function subcategoryAction() {
        return $this->render('Store/tpl/subcategory.html.twig', array());

    }

}