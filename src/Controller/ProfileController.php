<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Media;
use App\Entity\User;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use App\Service\FileUploader;
use DateTimeImmutable;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile/{id}', name: 'app_profile')]
    public function index(
        CandidatRepository $candidatRepository,
        User $user,
        EntityManagerInterface $entityManager,
        Request $request,
        FileUploader $fileUploader
    ): Response {
        $id = $user->getId('id');
        $candidat = $candidatRepository->findOneBySomeField($id);
        // dd($candidat);


        //check candidat en BDD, si existe stocke dans $candidat, sinon
        // instancie un nouveau candidat enregistre en BDD et stocke dans $candidat
        if (!$candidat) {
            $candidat = new Candidat;
            $candidat->setUser($user);
            $candidat->setCreatedAt(new DateTimeImmutable());
            $candidat->setIsAvailable(true);
            $entityManager->persist($candidat);
            $entityManager->flush();
        }

        //creation du formulaire et edit en BDD
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);
        // dd($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedPassportFile = ($form->get('passportfile')->getData());
            $uploadedCvFile = ($form->get('cvfile')->getData());
            $uploadedPictureFile = ($form->get('picturefile')->getData());

            $candidat->setUpdatedAt(new DateTimeImmutable());


            if ($uploadedPassportFile) {
                $uploadedFile = $fileUploader->uploadFiles($uploadedPassportFile);
                $media = new Media;
                $media -> setFilename($uploadedFile['fileName']);
                $media -> setOriginalName(($uploadedFile['safeFileName']));
                $candidat->setPassport($media);
                $entityManager->flush();
            }

            if ($uploadedCvFile) {
                $uploadedFile = $fileUploader->uploadFiles($uploadedCvFile);
                $media = new Media;
                $media -> setFilename($uploadedFile['fileName']);
                $media -> setOriginalName(($uploadedFile['safeFileName']));
                $candidat->setCv($media);
                $entityManager->flush();
            }

            if ($uploadedPictureFile) {
                $uploadedFile = $fileUploader->uploadFiles($uploadedPictureFile);
                $media = new Media;
                $media -> setFilename($uploadedFile['fileName']);
                $media -> setOriginalName(($uploadedFile['safeFileName']));
                $candidat->setPicture($media);
                $entityManager->flush();
            }


            // return $this->redirectToRoute('app_profile', [], Response::HTTP_SEE_OTHER);
        }




        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'candidat' => $candidat,
            'form' => $form,
        ]);
    }

}
