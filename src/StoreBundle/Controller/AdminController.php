<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;


class AdminController extends Controller {

    public function indexAction() {
        return new Response('test');
    }
}