<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class AdminController extends Controller {

    public function cpanelAction() {
        var_dump($user = $this->get('security.token_storage')->getToken()->getUser());
        die;
    }
}