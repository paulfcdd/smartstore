<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;


class AdminController extends Controller {

    public function cpanelAction() {

        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('Store/Admin/cpanel.html.twig', array(
            'name' => $user->getUsername(),
            'test' => 'This is admin console',
            'js_disabled' => 'JavaScript is disabled. Please, enable JavaScript on your browser for correct work with system'
        ));
//        var_dump($user = $this->get('security.token_storage')->getToken()->getUser());
//        die;
    }

    public function settingsCurrencyAction() {

        $currencyRepo = $this->getDoctrine()->getRepository('StoreBundle:Currency');

        $currencies = $currencyRepo->findAll();

        return $this->render('StoreBundle:Admin:currency.html.twig', array(
            'title' => 'Currencies',
            'currencies'=> $currencies
        ));
    }

    public function editCurrencyAction() {
        return $this->render('StoreBundle:Admin:editCurrency.html.twig', array(
            'title'=>'Edit currency',
            'name'=>'test'
        ));
    }
}

