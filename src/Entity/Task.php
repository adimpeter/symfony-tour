<?php
/**
 * Created by PhpStorm.
 * User: ADIM
 * Date: 19/03/2019
 * Time: 2:30 PM
 */

namespace App\Entity;
use Symfony\Component\Form\Extension\Validator\Constraints as Assert;


class Task
{
    /**
     * @Assert\NotBlank
     */
    protected $task;
    protected $dueDate;

    public function getTask(){
        return $this->task;
    }
    public function setTask($title){
        $this->task = $title;
    }

    public function getDueDate(){
        return $this->dueDate;
    }
    public function setDueDate($date){
        $this->dueDate = $date;
    }
}