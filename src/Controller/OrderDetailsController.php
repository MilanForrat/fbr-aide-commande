<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Class\Commande;

#[Route('/commande-en-cours', name: 'orders')]
class OrderDetailsController extends AbstractController
{

}
