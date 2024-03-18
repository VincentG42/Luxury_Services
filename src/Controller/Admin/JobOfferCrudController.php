<?php

namespace App\Controller\Admin;

use App\Entity\JobOffer;
use App\Entity\JobType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobOfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return JobOffer::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideWhenCreating()
                                ->hideWhenUpdating(),
            NumberField::new('reference'),
            AssociationField::new('client')-> autocomplete(),
            TextEditorField::new('description'),
            TextareaField::new('adminNote'),
            TextField::new('jobTitle'),
            TextField::new('position'),
            AssociationField::new('jobType')->autocomplete(),
            TextField::new('location'),
            AssociationField::new('jobCategory')->autocomplete(),
            IntegerField::new('salary'),
            DateTimeField::new('createdAt')->hideWhenCreating()
                                        ->hideWhenUpdating(),
            DateField::new('closingDate'),
            BooleanField::new('isAvailable'),
            
        ];
    }
    
}
