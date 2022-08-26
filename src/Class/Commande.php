<?php

namespace App\Class;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Commande
{
    private $session;

    public function __construct(SessionInterface $session){
        $this->session = $session;
    }

    public function add($id){
        $this->session->set('commande', [
            [
                'id' => $id,
                'quantity' => 1
            ]
        ]);
    }
}

