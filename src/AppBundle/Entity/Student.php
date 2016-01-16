<?php

/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 12/16/15
 * Time: 9:30 PM
 */

namespace AppBundle\Entity;
class Student
{
    protected $task;
    protected $dueDate;

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
}