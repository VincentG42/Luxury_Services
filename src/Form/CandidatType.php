<?php

namespace App\Form;

use App\Entity\Candidat;
use App\Entity\Experience;
use App\Entity\Gender;
use App\Entity\JobCategory;
use App\Entity\Media;
use App\Entity\User;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('adress')
            ->add('country')
            ->add('nationality')
            ->add('birthDate',DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('birthPlace')
            ->add('shortDescription')

            // ->add('createdAt', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('updatedAt', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('deletedAt', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('adminNote')

            // ->add('isAvailable')

            // ->add('user', EntityType::class, [
            //     'class' => User::class,
            //     'choice_label' => 'id',
            // ])

            ->add('gender', EntityType::class, [
                'class' => Gender::class,
                'choice_label' => 'gender',
            ])

            
            ->add('passportfile', FileType::class,[
                'mapped' =>false,
                'required' => false,
            ])

            ->add('cvfile', FileType::class, [
                'mapped' =>false,
                'required' => false,
            ])

            ->add('picturefile', FileType::class, [
                'mapped' =>false,
                'required' => false,
            ])

            ->add('jobCategory', EntityType::class, [
                'class' => JobCategory::class,
                'choice_label' => 'category',
            ])
            
            ->add('experience', EntityType::class, [
                'class' => Experience::class,
                'choice_label' => 'duration',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
