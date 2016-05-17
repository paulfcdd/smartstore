<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 17.05.2016
 * Time: 12:02
 */

namespace StoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CartController extends Controller
{

    public function cartAction() {
        return $this->render('Store/Cart/cart.html.twig', array(
            'title' => 'cart'
        ));
    }

}