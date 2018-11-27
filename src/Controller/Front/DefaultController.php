<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/", name="Front_")
 */
class DefaultController extends AbstractController
{
    /**
     *  @Route("/")
     */
    public function index()
    {

        $array = [ "truc", "truc", "truc" ];

        return $this->render('Front/Index.html.twig');
    }

    /**
     *  @Route("/Suivi", name="suivi")
     */
    public function suivi()
    {
        return $this->render('Front/Suivi.html.twig');
    }

    /**
     *  @Route("/FAQ", name="FAQ")
     */
    public function FAQ()
    {
        return $this->render('Front/FAQ.html.twig');
    }

    /**
     *  @Route("/Saisie", name="saisie")
     */
    public function saisie()
    {
        return $this->render('Front/Saisir.html.twig');
    }
}