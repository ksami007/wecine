<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="app_home")
 */
class DefaultController extends AbstractController
{
    public function __invoke(): Response
    {
       return $this->render('index.html.twig');
    }
}

