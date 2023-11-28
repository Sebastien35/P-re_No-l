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
        // Récupérer tous les cadeaux depuis la base de données
        $gifts = $giftRepository->findAll();

        return $this->render('gifts/index.html.twig', [
            'gifts' => $gifts,
        ]);
    }

    #[Route('/gifts/{id}', name: 'app_gift_show', methods: ['GET'])]
    public function show(Gift $gift): Response
    {
        return $this->render('gifts/show.html.twig', [
            'gift' => $gift,
        ]);
    }
}