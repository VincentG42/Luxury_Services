<?php

namespace App\Controller;

use App\Repository\JobCategoryRepository;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(JobOfferRepository $jobRepository, JobCategoryRepository $jobCategoryRepository): Response
    {

        $jobs =$jobRepository ->findBy([], ['createdAt' =>'DESC'], 10);

        $jobCategories = $jobCategoryRepository ->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'jobs' => $jobs,
            'jobCategories' => $jobCategories,
            
        ]);
    }
}
