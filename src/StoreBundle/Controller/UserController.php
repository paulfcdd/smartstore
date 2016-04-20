<?php
/**
 * Created by PhpStorm.
 * User: paulf_000
 * Date: 2016-04-19
 * Time: 21:12
 */

namespace StoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function indexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        return new Response('Hello ' . $user->getUsername());
    }
}