<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class IndexController
 * @package App\Controller
 *
 * @Route("/")
 *
 * @Template
 */
class IndexController extends Controller
{
    /**
     * @Route("", name="index")
     */
    public function index()
    {
        return [];
    }
}
