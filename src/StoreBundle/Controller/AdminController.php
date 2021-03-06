<?php

namespace StoreBundle\Controller;

use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use StoreBundle\Entity\Currency;
use StoreBundle\Entity\Keywords;
use StoreBundle\Entity\Lang;
use StoreBundle\Entity\Pages;
use StoreBundle\Entity\Translations;
use StoreBundle\Entity\Categories;


class AdminController extends Controller
{

    public function cpanelAction()
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('Store/tpl/dashboard.html.twig', array(
            'name' => $user->getUsername(),
            'test' => 'This is admin console',
            'js_disabled' => 'JavaScript is disabled. Please, enable JavaScript on your browser for correct work with system'
        ));
    }

    public function settingsCurrencyAction()
    {

        $currencyRepo = $this->getDoctrine()->getRepository('StoreBundle:Currency');

        $currencies = $currencyRepo->findAll();

        return $this->render('Store/tpl/dashboard/currency.html.twig', array(
            'title' => 'Currencies',
            'currencies' => $currencies
        ));
    }

    public function editCurrencyAction()
    {
        return $this->render('Store/tpl/dashboard/editCurrency.html.twig', array(
            'title' => 'Edit currency',
            'name' => 'test'
        ));
    }


    public function addNewCurrencyAction(Request $request)
    {
        $data = $request->get('newCurrency');

        try {
            $currency = new Currency();
            $currency->setName($data['curName']);
            $currency->setCode($data['curCode']);
            $currency->setRate($data['curRate']);
            if ($data['isDefault'] === 'true') {
                $currency->setIsDefault(true);
            } else {
                $currency->setIsDefault(false);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($currency);
            $em->flush();
            return new Response('true');
        } catch (\Exception $e) {
            return new Response('false');
        }

    }

    public function deleteCurrencyAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $currency = $em->getRepository('StoreBundle:Currency')->findOneBy(array('id' => $id));

        try {
            if ($currency != null) {
                $em->remove($currency);
                $em->flush();
            }
            return new Response('true');
        } catch (\Exception $e) {
            return new Response('false');
        }
    }

    public function updateCurrencyAction(Request $request)
    {

        $data = $request->get('updateData');

        $em = $this->getDoctrine()->getManager();

        $currency = $em->getRepository('StoreBundle:Currency')->find($data['id']);

        try {
            $currency->setName($data['editName']);
            $currency->setCode($data['editCode']);
            $currency->setRate($data['editRate']);
            if ($data['editStat'] === 'true') {
                $currency->setIsDefault(true);
            } else {
                $currency->setIsDefault(false);
            }
            $em->flush();

            return new Response('true');

        } catch (\Exception $e) {
            echo $e;
            die;
        }
    }

    public function settingsLangAction()
    {

        $pagesRepo = $this->getDoctrine()->getRepository('StoreBundle:Pages');

        $pages = $pagesRepo->findAll();

        $langRepo = $this->getDoctrine()->getRepository('StoreBundle:Lang');

        $langs = $langRepo->findAll();

        return $this->render('Store/tpl/dashboard/lang.html.twig', array(
            'title' => 'Translations',
            'pages' => $pages,
            'langs' => $langs
        ));
    }

    public function getTranslateByPageAction(Request $request)
    {

        $pageId = $request->get('pageId');

        $langCode = $request->get('langCode');

        $em = $this->getDoctrine()->getManager();

        $get = $em->createQueryBuilder();

        $get
            ->select('k.keywordVal', 't.translation', 'k.keywordId')
            ->from('StoreBundle\Entity\Pages', 'p')
            ->leftJoin('StoreBundle\Entity\Keywords', 'k', 'WITH', 'k.pageId = p.pageId')
            ->leftJoin('StoreBundle\Entity\Translations', 't', 'WITH', 'k.keywordId = t.keywordId')
            ->leftJoin('StoreBundle\Entity\Lang', 'l', 'WITH', 'l.langCode = t.langCode')
            ->where('p.pageId = ' . $pageId)
            ->andWhere("l.langCode = '$langCode'");

        $query = $get->getQuery();

        $result = $query->getResult();

        return new JsonResponse($result);
    }

    public function showTranslationsAction($id, Request $request)
    {

        $data = $request->get('data');

        $langRepo = $this->getDoctrine()->getRepository('StoreBundle:Lang');

        $langs = $langRepo->findAll();

        return $this->render('Store/tpl/dashboard/' . $id . '.html.twig', array(
            'langs' => $langs,
            "translations" => $data
        ));
    }

    public function addKeywordAction(Request $request)
    {

        $pageId = $request->get('pageId');

        $kVal = $request->get('kVal');

        $em = $this->getDoctrine()->getManager();

        $keywords = new Keywords();


        $keywords->setKeywordVal($kVal);

        $keywords->setPageId($pageId);

        $em->persist($keywords);

        $em->flush();

        echo "ok";

        die;

    }

    public function addTranslationsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $get = $em->createQueryBuilder();

        $get
            ->select('c.keywordId')
            ->from('StoreBundle\Entity\Keywords', 'c')
            ->orderBy('c.keywordId', 'DESC')
            ->setMaxResults('1');

        $query = $get->getQuery();

        $transArr = $request->get('transArr');

        $result = $query->getResult();

        $kId = $result[0]['keywordId'];

        $translations = new Translations();

        foreach ($transArr as $langCode => $translate) {

            $translations->setKeywordId($kId);

            $translations->setLangCode($langCode);

            $translations->setTranslation($translate);

            $em->persist($translations);

            $em->flush();

            echo "ok";

        }
        die;

    }

    public function singleRowSaveAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $id = $request->get('id');

        $keywordVal = $request->get('kVal');

        $kTrans = $request->get('kTrans');

        $pageId = $request->get('pageId');

        $sysLang = $request->get('sysLang');

        $query = $em->createQueryBuilder();

        $query
            ->update('StoreBundle\Entity\Keywords', 'k')
            ->set('k.keywordVal', '?1')
            ->where('k.keywordId = ' . $id)
            ->andWhere('k.pageId = ' . $pageId)
            ->setParameter(1, $keywordVal);

        $updateKeywords = $query->getQuery();

        $keywordUpdateResult = $updateKeywords->getResult();

        $queryTranslation = $em->createQueryBuilder();

        $queryTranslation
            ->update('StoreBundle\Entity\Translations', 't')
            ->set('t.translation', '?2')
            ->where('t.keywordId = ' . $id)
            ->andWhere("t.langCode = '$sysLang'")
            ->setParameter(2, $kTrans);

        $updateTranslations = $queryTranslation->getQuery();

        $translationUpdateResult = $updateTranslations->getResult();

        echo $translationUpdateResult;

        die;
    }

    public function saveAllAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $dataArr = $request->get('myJson');

        $dataArr = json_decode($dataArr);

        $kId = $dataArr->kwId;

        $keywordVal = $dataArr->keyword;

        $kTrans = $dataArr->translation;

        $pageId = $dataArr->pageId;

        $sysLang = $dataArr->lang;

        $query = $em->createQueryBuilder();

        $query
            ->update('StoreBundle\Entity\Keywords', 'k')
            ->set('k.keywordVal', '?1')
            ->where('k.keywordId = ' . $kId)
            ->andWhere('k.pageId = ' . $pageId)
            ->setParameter(1, $keywordVal);

        $updateKeywords = $query->getQuery();

        $keywordUpdateResult = $updateKeywords->getResult();

        $queryTranslation = $em->createQueryBuilder();

        $queryTranslation
            ->update('StoreBundle\Entity\Translations', 't')
            ->set('t.translation', '?2')
            ->where('t.keywordId = ' . $kId)
            ->andWhere("t.langCode = '$sysLang'")
            ->setParameter(2, $kTrans);

        $updateTranslations = $queryTranslation->getQuery();

        $translationUpdateResult = $updateTranslations->getResult();

        echo $translationUpdateResult;

        die;
    }

    public function deleteKeywordAction(Request $request)
    {

        $removeId = $request->get('removeId');

        $em = $this->getDoctrine()->getManager();

        $keywords = $em->getRepository('StoreBundle:Keywords')->findOneBy(array('keywordId' => $removeId));

        try {
            if ($keywords != null) {
                $em->remove($keywords);

                $query = $em->createQueryBuilder();
                $query
                    ->delete('StoreBundle\Entity\Translations', 't')
                    ->where('t.keywordId = :id')
                    ->setParameter('id', $removeId);

                $deleteQuery = $query->getQuery();

                $delete = $deleteQuery->getResult();

                $em->flush();

            }
            return new Response('true');

        } catch (\Exception $e) {
            return new Response($e);
        }

    }

    public function settingsLocaleAction ()
    {

        return $this->render('Store/tpl/dashboard/locale.html.twig', array(
            'title' => 'Locale'
        ));
    }

    public function settingsCategoriesAction() {

        $categoryRepo = $this->getDoctrine()->getRepository('StoreBundle:Categories');

        $categoryList = $categoryRepo->findAll();

        $langRepo = $this->getDoctrine()->getRepository('StoreBundle:Lang');

        $langs = $langRepo->findAll();

        $translationsRepo = $this->getDoctrine()->getRepository('StoreBundle:CTranslations');

        return $this->render('Store/tpl/dashboard/categories.html.twig', array(
            'title' => 'Categories',
            'categories' => $categoryList,
            'langs' => $langs
        ));
    }

}