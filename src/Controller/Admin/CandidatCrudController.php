<?php

namespace App\Controller\Admin;

use App\Entity\Candidat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CandidatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidat::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id') -> hideWhenCreating()
                                -> hideWhenUpdating(),
            TextField::new('firstName'),
            AssociationField::new('user'),
            AssociationField::new('gender'),
            AssociationField::new('passport'),
            AssociationField::new('cv'),
            AssociationField::new('picture'),
            AssociationField::new('experience'),
            TextField::new('adress'),
            TextField::new('country'),
            TextField::new('nationality'),
            DateField::new('birthDate'),
            TextField::new('birthPlace'),
            TextareaField::new('shortDescription'),
            DateField::new('createdAt')-> hideWhenCreating()
                                        -> hideWhenUpdating(),
            DateField::new('updatedAt')-> hideWhenCreating()
                                        -> hideWhenUpdating(),
            DateField::new('deletedAt')-> hideWhenCreating()
                                        -> hideWhenUpdating(),
            TextareaField::new('adminNote'),
            BooleanField::new('isAvailable')
            
        ];
    }
    
}
