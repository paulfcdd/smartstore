<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;


class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        define('__TRANSDIR__', $this->container->getParameter('kernel.root_dir') . '/Resources/translations/index/');

        $clientLang = new Session();

        if ($clientLang->has('selectedLang')) {
            return $this->render('StoreBundle:Store:index.html.twig', include_once(__TRANSDIR__ . $clientLang->get('selectedLang') . '.php'));
        } else {
            return $this->render('StoreBundle:Store:index.html.twig', include_once(__TRANSDIR__ . $browserLang. '.php'));
        }
    }

    public function changeLangAction() {
        $request = $this->get('request');
        var_dump($request);
        die;
    }

}
