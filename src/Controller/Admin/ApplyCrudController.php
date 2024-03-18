<?php

namespace App\Controller\Admin;

use App\Entity\Apply;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ApplyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Apply::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id') ->hideWhenCreating()
                                ->hideWhenUpdating(),
            AssociationField::new('candidat'),
            AssociationField::new('jobOffer'),
            AssociationField::new('status'),
            DateField::new('createdAt')->hideWhenCreating()
                                        ->hideWhenUpdating(),
            TextareaField::new('adminNote')
            
        ];
    }
    
}
