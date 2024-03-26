<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends Controller
{
        /**
     * @Route("/client/profile/{id}", name="client.profile")
     */
    public function profileAction($id)
    {
        // Your controller logic to display the client profile
    }
}
