<?php
// src/AppBundle/Controller/LuckyController.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{count}")
     * @Method("GET")
     */
    public function numberAction($count)
    {
        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }
        $numbersList = implode(', ', $numbers);

        return $this->render(
            'lucky/number.html.twig',
            array('luckyNumberList' => $numbersList)
        );
    }

    /**
     * @Route("/api/lucky/number")
     * @Method("GET")
     */
    public function apiNumberAction()
    {
        $data = array(
            'lucky_number' => rand(0, 100)
        );

        return new JsonResponse($data);
    }
}
