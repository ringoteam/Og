<?php

namespace Og\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sonata\AdminBundle\Controller\CRUDController;

class ArtworkController extends CRUDController
{
    
    
    public function indexAction() 
    {
        $sTest = "mon test";echo 'AAAA';
    die();
        $this->render('OgAdminBundle:Admin:test_form.html.twig', array($sTest));
    }
}