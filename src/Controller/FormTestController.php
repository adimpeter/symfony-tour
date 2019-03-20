<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormTestController extends AbstractController
{
    /**
     * @Route("/form/test", name="form_test")
     */
    public function index(Request $request)
    {
        // mag placeholder
        $msg = '';
        //create task
        $task = new Task();

        // create the form
        $form = $this->createForm(TaskType::class, $task);

        // handle request
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $task = $form->getData();
            if($form->get('agreeTerms')->getData()){
                $msg = 'You Agreed to sell your kidneys.';
            }
        }


        return $this->render('form_test/index.html.twig', [
            'form' => $form->createView(),
            'task' => $task,
            'msg' => $msg,
        ]);
    }

    /**
     * @Route("/form/thanks", name="redirect_on_submit")
     */
    public function redirectOnSubmit(){

    }
}
