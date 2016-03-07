<?php

namespace Ct\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CtJobeetBundle::layout.html.twig');
    }
}
