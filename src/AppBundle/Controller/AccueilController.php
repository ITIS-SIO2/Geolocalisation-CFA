<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AccueilController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('form/accueil.html.twig');
    }

    /**
     * @Route("/nouveau/partenaire", name="new_partenaire")
     */
    public function newPartenaireAction()
    {
        return $this->render('form/new_partenaire.html.twig');
    }

    /**
     * @Route("/deposer-offre", name="deposer_offre")
     */
    public function deposerOffreAction()
    {
        return $this->render('form/deposer_offre.html.twig');
    }
}
