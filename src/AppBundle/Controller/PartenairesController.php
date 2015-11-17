<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PartenairesController extends Controller
{
    /**
     * @Route("/devenir-partenaire", name="devenir_partenaire")
     */
    public function devenirAction()
    {
        return $this->render('form/partenaires/devenir_partenaire.html.twig');
    }

}
