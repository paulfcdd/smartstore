<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 16.05.2016
 * Time: 10:53
 */

namespace StoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StoresController extends Controller {

    public function storesAction() {
        return $this->render('Store/Index/stores.html.twig', array (
            'test' => 'test'
        ));
    }

}