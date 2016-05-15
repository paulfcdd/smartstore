<?php

namespace StoreBundle\Controller;

use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use StoreBundle\Entity\Currency;


class AdminController extends Controller
{

    public function cpanelAction()
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('Store/Admin/cpanel.html.twig', array(
            'name' => $user->getUsername(),
            'test' => 'This is admin console',
            'js_disabled' => 'JavaScript is disabled. Please, enable JavaScript on your browser for correct work with system'
        ));
//        var_dump($user = $this->get('security.token_storage')->getToken()->getUser());
//        die;
    }

    public function settingsCurrencyAction()
    {

        $currencyRepo = $this->getDoctrine()->getRepository('StoreBundle:Currency');

        $currencies = $currencyRepo->findAll();

        return $this->render('StoreBundle:Admin:currency.html.twig', array(
            'title' => 'Currencies',
            'currencies' => $currencies
        ));
    }

    public function editCurrencyAction()
    {
        return $this->render('StoreBundle:Admin:editCurrency.html.twig', array(
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
    
    public function updateCurrencyAction(Request $request) {

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
}

