<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, CompanyRepository $companyRepository, CategoryRepository $categoryRepository): Response
    {
        $search = $request->query->get('query');

        if (!$search) {
            return $this->render('index.html.twig', [
                'controller_name' => 'MainController',
                'companies' => $companyRepository->findAll(),
            ]);
        }

        return $this->render('index.html.twig', [
            'controller_name' => 'MainController',
            'companies' => $companyRepository->findByNameField($search),
        ]);
    }
}
