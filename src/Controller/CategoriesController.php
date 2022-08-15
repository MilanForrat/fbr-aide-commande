<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categories', name: 'categories_')]
class CategoriesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
            'categories' => $categoriesRepository->findBy([], ['categoryOrder' => 'asc'])
        ]);
    }
    #[Route('/{name}', name: 'details')]
    public function list(Categories $category): Response
    {

        //on va chercher les produits liés à la catégorie
        $products = $category->getProducts();


        return $this->render('categories/details.html.twig', [
            'controller_name' => 'détails produits par catégorie controller',
            'category'=> $category,
            'products'=>$products,
        ]);
    }
}
