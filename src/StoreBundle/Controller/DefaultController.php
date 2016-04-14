<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

class DefaultController extends Controller
{

    public function setCookies(Request $request) {
        //Set cookies
        $storeLangCookies = array(
            'name' => 'clientLang',
            'value' => '',
            'time' => time() + 3600 * 24 * 7
        );

        $cookie = new Cookie($storeLangCookies['name'], $storeLangCookies['value'], $storeLangCookies['time']);
        $response = new Response();
        $response->headers->setCookie($cookie);
        $response->send();

        $langSettings = $request->cookies->get('clientLang');

        return $langSettings;
    }

    public function changelangAction(Request $request) {
        $selectedLang = $request->request->get('lang');

        return new Response($selectedLang);
    }

    public function indexAction(Request $request)
    {
        //Path to translations
        define('__TRANSDIR__', $this->container->getParameter('kernel.root_dir').'/Resources/translations/');

        //get user lang
        $clientLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        $langSettings = $this->setCookies($request);

        var_dump($langSettings);

        if ($langSettings == null ) {
            $langSettings = $clientLang;
            //var_dump($langSettings);
            return $this->render('StoreBundle:Store:index.html.twig', include_once (__TRANSDIR__.$clientLang.'.php'));
        }

        return $this->render('StoreBundle:Store:index.html.twig');
    }

    public function loginAction() {
        return new Response('login screen');
    }

    public function wishlistAction() {
        return new Response('wishlist screen');
    }
}
