<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * @Route("/archive", name="archive")
     */
    public function archive(): Response
    {
        return $this->render('myp/archive.html.twig');
    }
}
