<?php

namespace App\Controller;

use App\Repository\PolicyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dashboard/policies')]
class PolicyController extends AbstractController
{
    #[Route('/list', name: 'app_policy_list')]
    public function index(PolicyRepository $policyRepository): Response
    {
        return $this->render('policy/policies_list.html.twig', [
            'policies' => $policyRepository->findAll()
        ]);
    }

    #[Route('/create', name: 'app_policy_create')]
    public function create(PolicyRepository $policyRepository): Response
    {
        return $this->render('policy/create_policy.html.twig', [
            //'policies' => $policyRepository->findAll()
        ]);
    }
}
