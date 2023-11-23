<?php

namespace App\Controller;

use App\Entity\Gift;
use App\Repository\GiftRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GiftsController extends AbstractController
{
    #[Route('/gifts', name: 'app_gifts_index', methods: ['GET'])]
    public function index(GiftRepository $giftRepository): Response
    {
        $gifts = $giftRepository->findAll();

        return $this->render('gifts/index.html.twig', [
            'gifts' => $gifts,
        ]);
    }
}
