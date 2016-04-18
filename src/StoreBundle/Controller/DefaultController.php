<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;


class DefaultController extends Controller
{
    public function indexAction($lang, Request $request)
    {
        //Path to translations
        define('__TRANSDIR__', $this->container->getParameter('kernel.root_dir') . '/Resources/translations/index/');

        $request->cookies->set('clientLang', $lang);
        $user = $this->get('security.token_storage')->getToken()->getUser();

        var_dump($user);

        return $this->render('StoreBundle:Store:index.html.twig', include_once(__TRANSDIR__ . $lang . '.php'));

    }
}
