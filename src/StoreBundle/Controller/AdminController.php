<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class AdminController extends Controller {

    public function cpanelAction() {

        $user = $this->get('security.token_storage')->getToken()->getUser();

        $currencyRepo = $this->getDoctrine()->getRepository('StoreBundle:Currency');

        $currencies = $currencyRepo->findAll();

        return $this->render('StoreBundle:Store:cpanel.html.twig', array(
            'name' => $user->getUsername(),
            'test' => 'This is admin console'
        ));
//        var_dump($user = $this->get('security.token_storage')->getToken()->getUser());
//        die;
    }
}

