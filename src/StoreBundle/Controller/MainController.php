<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Serializer\Encoder\JsonEncoder;


class MainController extends Controller
{

    //    CHANGIG SYSTEM LANGUAGE ACTION
    public function changeLangAction(Request $request)
    {
        $data = $request->get('selectedLang');
        $clientLang = new Session();

        if (!isset($data)) {
            var_dump('data not set');
        } else {
            $clientLang->set('selectedLang', $data);
            echo true;
        }
        die;
    }

    public function getCurrencyListAction()
    {
        $currencyRepo = $this->getDoctrine()->getRepository('StoreBundle:Currency');

        $currencies = $currencyRepo->findAll();

        return $this->render(
            'StoreBundle:Store:currencyList.html.twig',
            array('currencies' => $currencies)
        );
    }

    public function getLangListAction()
    {
        $langRepo = $this->getDoctrine()->getRepository('StoreBundle:Lang');

        $langs = $langRepo->findAll();

        return $this->render(
            'StoreBundle:Store:langList.html.twig',
            array(
                'langs' => $langs
            )
        );
    }
}