<?php

namespace App\Controller\Admin;

use App\Entity\DemandeDeContact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerFieldField;


class DemandeDeContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DemandeDeContact::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('prenom'),
            TextField::new('nom'),
            IntegerField::new('age'),
            TextField::new('mail'),
            TextField::new('message'),
            TextField::new('adresse_postale'),
         
        ];
    }
}
