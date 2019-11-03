<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @package App\Controller
 *
 * @Route("/game/")
 *
 * @Template
 */
class GameController extends Controller
{
    /**
     * @Route("", name="play_game")
     */
    public function playGame(Request $request)
    {
        return [];
    }
}
