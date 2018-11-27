<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/Front", name="Front_")
 */
class FrontController extends AbstractController
{
    /**
     *  @Route("/")
     */
    public function index()
    {
       return $this->render('FrontView/Index.html.twig');
    }

    /**
     *  @Route("/Suivi", name="suivi")
     */
    public function suivi()
    {
        return $this->render('FrontView/Suivi.html.twig');
    }

    /**
     *  @Route("/FAQ", name="FAQ")
     */
    public function FAQ()
    {
        return $this->render('FrontView/FAQ.html.twig');
    }

    /**
     *  @Route("/Saisie", name="saisie")
     */
    public function saisie()
    {
        return $this->render('FrontView/Saisir.html.twig');
    }
}