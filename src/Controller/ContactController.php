<?php

namespace App\Controller;

use App\Entity\DemandeDeContact;
use App\Repository\DemandeDeContactRepository;

use Doctrine\ORM\EntityManagerInterface;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;


class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact_demande')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #[Route('/contact/post', name: 'contact_post')]
public function post(Request $request, EntityManagerInterface $entityManager)
{
    // Retrieve form data from the request
    $prenom = $request->request->get('prenom');
    $nom = $request->request->get('nom');
    $age = $request->request->get('age');
    $mail = $request->request->get('mail');
    $message = $request->request->get('message');
    $adresse_postale = $request->request->get('adresse_postale');

    // Create a new DemandeDeContact entity and set its properties
    $demandeDeContact = new DemandeDeContact();
    $demandeDeContact->setPrenom($prenom);
    $demandeDeContact->setNom($nom);
    $demandeDeContact->setAge($age);
    $demandeDeContact->setMail($mail);
    $demandeDeContact->setMessage($message);
    $demandeDeContact->setAdressePostale($adresse_postale);

    // Persist the entity to the database
    $entityManager->persist($demandeDeContact);
    $entityManager->flush();

    // Redirect to the home page after successful form submission
    return $this->redirectToRoute('app_home');
}
}
