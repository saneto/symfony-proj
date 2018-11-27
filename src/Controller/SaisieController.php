<?php

namespace App\Controller;

use App\Entity\Saisie;
use App\Form\SaisieType;
use App\Repository\SaisieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/saisie")
 */
class SaisieController extends AbstractController
{
    /**
     * @Route("/", name="saisie_index", methods="GET")
     */
    public function index(SaisieRepository $saisieRepository): Response
    {
        return $this->render('saisie/index.html.twig', ['saisies' => $saisieRepository->findAll()]);
    }

    /**
     * @Route("/new", name="saisie_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $saisie = new Saisie();
        $form = $this->createForm(SaisieType::class, $saisie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($saisie);
            $em->flush();

            return $this->redirectToRoute('saisie_index');
        }

        return $this->render('saisie/new.html.twig', [
            'saisie' => $saisie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="saisie_show", methods="GET")
     */
    public function show(Saisie $saisie): Response
    {
        return $this->render('saisie/show.html.twig', ['saisie' => $saisie]);
    }

    /**
     * @Route("/{id}/edit", name="saisie_edit", methods="GET|POST")
     */
    public function edit(Request $request, Saisie $saisie): Response
    {
        $form = $this->createForm(SaisieType::class, $saisie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('saisie_index', ['id' => $saisie->getId()]);
        }

        return $this->render('saisie/edit.html.twig', [
            'saisie' => $saisie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="saisie_delete", methods="DELETE")
     */
    public function delete(Request $request, Saisie $saisie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$saisie->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($saisie);
            $em->flush();
        }

        return $this->redirectToRoute('saisie_index');
    }
}
