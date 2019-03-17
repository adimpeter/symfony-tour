<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NumberGeneratorController extends AbstractController{
    
    /**
     * @Route("generate/number")
     */
    public function generateNumber(){
        $number = random_int(1,100);
        
        return $this->render('generator/base.html.twig', [
            'number' => $number
        ]);
    }
}