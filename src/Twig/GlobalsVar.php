<?php

namespace App\Twig;

use App\Entity\Category;
use App\Entity\Company;

use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class GlobalsVar extends AbstractExtension
{

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('categoriesVar', [$this, 'getCategoriesVar']),
            new TwigFunction('companiesVar', [$this, 'getCompaniesVar'])
        ];
    }

    public function getCategoriesVar(): array
    {
        return $this->em->getRepository(Category::class)->findAll();
    }

    public function getCompaniesVar(): array
    {
        return $this->em->getRepository(Company::class)->findAll();
    }
}