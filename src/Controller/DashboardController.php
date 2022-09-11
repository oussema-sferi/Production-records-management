<?php

namespace App\Controller;

use App\Repository\FormRepository;
use App\Repository\PolicyRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(FormRepository $formRepository, PolicyRepository $policyRepository, UserRepository $userRepository): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'forms_count' => count($formRepository->findAll()),
            'policies_count' => count($policyRepository->findAll()),
            'users_count' => count($userRepository->findAll()),
        ]);
    }
}
