<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EntreprisesController extends Controller
{
    /**
     * @Route("/deposer-offre", name="deposer_offre")
     */
    public function deposerOffreAction()
    {
        return $this->render('form/entreprises/deposer_offre.html.twig');
    }

}
