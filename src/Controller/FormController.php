<?php

namespace App\Controller;

use App\Repository\FormRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dashboard/forms')]
class FormController extends AbstractController
{
    #[Route('/list', name: 'app_form_list')]
    public function index(FormRepository $formRepository): Response
    {
        $forms = $formRepository->findAll();
        return $this->render('form/index.html.twig', [
            'forms' => $forms,
        ]);
    }
}
