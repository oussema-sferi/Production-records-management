<?php

namespace App\Controller;

use App\Repository\F28entryRepository;
use App\Repository\FormRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/dashboard/forms/{id}')]
class EntryController extends AbstractController
{
    #[Route('/entries', name: 'app_entries_list')]
    public function index($id, F28entryRepository $f28entryRepository, FormRepository $formRepository): Response
    {
        /*dd($f28entryRepository->getEntriesByFormId($id));*/
        return $this->render('entry/entries_per_form.html.twig', [
            'entries' => $f28entryRepository->getEntriesByFormId($id),
            'form' => $formRepository->find($id)
        ]);
    }
}
