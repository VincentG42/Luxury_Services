<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Repository\ApplyRepository;
use App\Repository\CandidatRepository;
use App\Repository\JobCategoryRepository;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/job')]
class JobController extends AbstractController
{
    #[Route('/', name: 'app_job')]
    public function index(JobOfferRepository $jobOfferRepository, JobCategoryRepository $jobCategoryRepository): Response
    {
        $jobs = $jobOfferRepository->findAll();
        $jobCategories = $jobCategoryRepository->findAll();

        return $this->render('job/index.html.twig', [
            'controller_name' => 'JobController',
            'jobs' => $jobs,
            'jobCategories' => $jobCategories
        ]);
    }

    #[Route('/show-{id}', name: 'app_job_show')]
    public function show(JobOffer $jobOffer, 
                            JobOfferRepository $jobOfferRepository,
                            ApplyRepository $applyRepository, 
                            CandidatRepository $candidatRepository): Response
    {
        $allJobs = $jobOfferRepository-> findAll();

        $allAppliesByJob = $applyRepository -> findBy(['jobOffer' => $jobOffer]);

        $candidats = $candidatRepository ->findAll();

        return $this->render('job/show.html.twig', [
            'controller_name' => 'JobController',
            'job' => $jobOffer,
            'allJobs' => $allJobs,
            'allAppliesByJob' => $allAppliesByJob,
            'candidats' => $candidats

        ]);
    }
}
