<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\CompanyRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecordsController extends AbstractController
{
    /**
     * @Route("/category/{name}", name="category")
     */
    public function category(string $name, CategoryRepository $categoryRepository): Response
    {
        return $this->render('records/category.html.twig', [
            'controller_name' => 'RecordsController',
            'category' => $categoryRepository->findOneBy(["name" => $name])
        ]);
    }

    /**
     * @Route("/company/{name}", name="company")
     */
    public function company(string $name, CompanyRepository $companyRepository): Response
    {
        $company = $companyRepository->findBy(["name" => $name]);


        if ($company) {
            return $this->render('records/company.html.twig', [
                'controller_name' => 'RecordsController',
                'company' => $company[0]
            ]);
        }

        return $this->redirect($this->generateUrl('home'));
    }
}
