<?php

namespace App\Controller;

use App\Entity\Products;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\ProductsFormType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/produits', name: 'products_')]
class ProductsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProductsRepository $productsRepository): Response
    {
        return $this->render('products/index.html.twig', [
            'controller_name' => 'ProductsController',
            'products' => $productsRepository->findBy([], ['name' => 'asc'])
        ]);
    }
    #[Route('/nouveau-produit', name: 'new-product')]
    public function new(Request $request, ManagerRegistry $mr)
    {
        $product = new Products();
        // ...

        $form = $this->createForm(ProductsFormType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $product = $form->getData();

            // ... perform some action, such as saving the task to the database
            $entityManager = $mr->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('products_new-product');
        }

        return $this->renderForm('products/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{slug}', name: 'details')]
    public function productsDetails(Products $product): Response
    {
        return $this->render('products/details.html.twig', [
            'controller_name' => 'détails produits controller',
            'product' => $product,
        ]);
    }
}
