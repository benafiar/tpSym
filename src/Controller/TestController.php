<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
      
       /* $rep = new Response("<html><head></head><body>bonjour</body></html>");
        return $rep;*/
         $classe="CCDAD2020";
         $tab = ["ali","salah","fatma"];
         return $this->render('test/index.html.twig', [
            'info' => $classe,
            'names'=> $tab
        ]);
    }
    
    /**
     * @Route("/somme/{a}/{b}", name="somme")
     */
    public function somme($a,$b)
    {
         $s= $a + $b;
         
         return $this->render('test/somme.html.twig', [
            'a' => $a,
            'b'=> $b,
            's'=> $s,
        ]);
    }
    
}
