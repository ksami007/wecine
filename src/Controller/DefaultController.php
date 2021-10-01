<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="app_home")
 */
class DefaultController extends AbstractController
{
    public function __invoke()
    {
       return $this->render('index.html.twig');
    }
}

