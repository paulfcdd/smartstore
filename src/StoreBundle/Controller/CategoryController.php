<?php
/**
 * Created by PhpStorm.
 * User: paulfcdd
 * Date: 02.06.2016
 * Time: 12:22
 */

namespace StoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function categoryAction($title)
    {

        $sysLang = new Session();

//        var_dump($sysLang->get('selectedLang'));

        return $this->render('Store/tpl/category.html.twig', array(
            'title' => $title
        ));

    }

    public function renderCategoryListAction(Request $request)
    {

        $currentLang = $request->get('currentLang');

        $em = $this->getDoctrine()->getManager();

        $get = $em->createQueryBuilder();

        $get
            ->select('c.cKeyword', 'ct.translation')
            ->from('StoreBundle\Entity\Categories', 'c')
            ->innerJoin('StoreBundle\Entity\CTranslations', 'ct', 'WITH', 'c.cId = ct.cId')
            ->where("ct.langCode = '$currentLang'");

        $query = $get->getQuery();

        $categories = $query->getResult();

        return $this->render('StoreBundle:Store:categoryList.html.twig', array(
            'categories' => $categories
        ));
    }
}