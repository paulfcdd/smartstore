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

    function getTranslations($lang, $pageId)
    {
        $em = $this->getDoctrine()->getManager();

        $get = $em->createQueryBuilder();

        $get
            ->select('k.keywordVal', 't.translation')
            ->from('StoreBundle\Entity\Pages', 'p')
            ->leftJoin('StoreBundle\Entity\Keywords', 'k', 'WITH', 'k.pageId = p.pageId')
            ->leftJoin('StoreBundle\Entity\Translations', 't', 'WITH', 'k.keywordId = t.keywordId')
            ->leftJoin('StoreBundle\Entity\Lang', 'l', 'WITH', 'l.langCode = t.langCode')
            ->where('p.pageId = ' . $pageId)
            ->andWhere("l.langCode = '$lang'");

        $query = $get->getQuery();

        $result = $query->getArrayResult();

        return $result;
    }

//    LOAD INDEX TEMPLATE
    public function indexAction()
    {
        $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        $pageId = '1';

        $clientLang = new Session();

        if ($clientLang->has('selectedLang')) {

            $foo = $this->getTranslations($clientLang->get('selectedLang'), $pageId);

            $bar = array_column($foo, 'translation', 'keywordVal');

            return $this->render('Store/Index/index.html.twig', $bar);

        } else {

            $clientLang->set('selectedLang', $browserLang);

            $foo = $this->getTranslations($clientLang->get('selectedLang'), $pageId);

            $bar = array_column($foo, 'translation', 'keywordVal');

            return $this->render('Store/Index/index.html.twig', $bar);

        }
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