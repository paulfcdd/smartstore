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

        return $this->render('Store/tpl/category.html.twig', array(
            'title' => $title
        ));

    }

    public function renderCategoryListAction(Request $request)
    {

        $currentLang = $request->get('currentLang');

        $em = $this->getDoctrine()->getManager();

        $getCategories = $em->createQueryBuilder();

        $getCategories
            ->select('c.cKeyword', 'ct.translation', 'c.cId')
            ->from('StoreBundle\Entity\Categories', 'c')
            ->innerJoin('StoreBundle\Entity\CTranslations', 'ct', 'WITH', 'c.cId = ct.cId')
            ->where("ct.langCode = '$currentLang'");

        $query = $getCategories->getQuery();

        $categories = $query->getResult();

        $getSubcategories = $em->createQueryBuilder();

        $getSubcategories
            ->select('s.cKeyword', 's.parentId')
            ->from('StoreBundle\Entity\Categories', 'c')
            ->from('StoreBundle\Entity\Subcategories', 's')
            ->where('c.cId = s.parentId');

        $q = $getSubcategories->getQuery();

        $subcategories = $q->getResult();

        return $this->render('StoreBundle:Store:categoryList.html.twig', array(
            'categories' => $categories,
            'subcategories' => $subcategories
        ));
    }
}