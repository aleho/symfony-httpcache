<?php

declare(strict_types = 1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route(
        path: '/',
        name: 'app_index',
    )]
    public function index(): Response
    {
        $response = new Response();
        $response->setPublic();
        $response->setLastModified(new \DateTime('2021-08-10 07:40:30 GMT'));

        return $this->render('index.html.twig', [], $response);
    }

    public function header(): Response
    {
        $response = new Response();
        $response->setPublic();
        $response->setLastModified(new \DateTime('2021-08-10 07:40:30 GMT'));

        return $this->render('header.html.twig', [], $response);
    }
}
