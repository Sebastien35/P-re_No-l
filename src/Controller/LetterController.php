<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LetterController extends AbstractController
{
    #[Route('/letter', name: 'app_letter')]
    public function index(): Response
    {
        return $this->render('letter/index.html.twig', [
            'controller_name' => 'LetterController',
        ]);
    }
}
