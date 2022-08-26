<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Class\Commande;

#[Route('/commande-en-cours', name: 'orders')]
class CommandeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('order_details/index.html.twig', [
            
        ]);
    }

    #[Route('/add/{id}', name: '_add-to-cart')]
    public function add(Commande $commande, $id)
    {
        $commande->add($id);
        return $this->render('order_details/index.html.twig', [
            
        ]);
    }
}
