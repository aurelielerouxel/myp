<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class MypController extends AbstractController
{
    /**
     * @Route("/acceuil", name="home")
     * @Route("/", name="root")
     */
    public function index(): Response
    {
        return $this->render('myp/index.html.twig');
    }

    /**
     * Require ROLE_USER for only this controller method.
     * @IsGranted("ROLE_USER")
     * @Route("/archive", name="archive")
     */
    public function archive(): Response
    {
        return $this->render('myp/archive.html.twig');
    }
}
