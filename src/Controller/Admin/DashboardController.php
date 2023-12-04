<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Gift; 
use App\Entity\Avis;
use App\Entity\DemandeDeContact;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect($adminUrlGenerator->setController(GiftCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('L\'atelier du Père-Noël');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Gifts');
        yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Create Gift', 'fas fa-plus-circle', Gift::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Gifts', 'fas fa-eye', Gift::class),
        ]);
        yield MenuItem::section('Avis');
        yield MenuItem::subMenu('Actions','fas fa-bar')->setSubItems([
            MenuItem::linktoCrud('Edit Avis','fas fa-plus-circle', Avis::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Avis', 'fas fa-eye', Avis::class),

        ]);
        yield MenuItem::section('Demandes de contact');
        yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Voir les demandes de contact', 'fas fa-eye', DemandeDeContact::class)
        ]);
    }
}