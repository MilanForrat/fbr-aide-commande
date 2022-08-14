<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\OrdersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'main_')]
class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(OrdersRepository $ordersRepository): Response
    {
        return $this->render('main/index.html.twig', [
            "controller_name" => "Accueil",
            'orders' => $ordersRepository->findBy([],['id' => 'asc'])
        ]);
    }
    #[Route('/liste-commandes', name: 'orders-list')]
    public function ordersList(): Response
    {
        return $this->render('main/index.html.twig', [
           "controller_name" => "Commandes réalisées",
        ]);
    }
    #[Route('/liste-categories', name: 'categories-list')]
    public function categoriesList(CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('main/index.html.twig', [
            "controller_name" => "Liste des Catégories",
            'categories' => $categoriesRepository->findBy([],['categoryOrder' => 'asc'])
        ]);
    }
}
