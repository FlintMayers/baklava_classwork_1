<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Symfony\Component\HttpFoundation\Response;
class HelloWorldController extends Controller
{
    /**
     * @Route("/hello", name="hello")
     */

    public function helloAction()
    {
        $greeting = 'Hello world';

        $arr = ['hello' => $greeting];

        return $this->render('hello.html.twig', $arr);
    }
}
