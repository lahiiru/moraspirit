<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/13/16
 * Time: 3:29 AM
 */

namespace AppBundle\Entity;


class Event
{
    protected  $eventname;
    protected  $budget;
    protected  $eventtype;
    protected $startdate;
    protected  $enddate;
    protected $starttime;
    protected $endtime;
    protected $location;
    protected $description;
    protected $totalparticipant;
    protected $eventIncharge;
    protected $daterange;

    /**
     * @return mixed
     */
    public function getDaterange()
    {
        return $this->daterange;
    }

    /**
     * @param mixed $daterange
     */
    public function setDaterange($daterange)
    {
        $this->daterange = $daterange;
    }




    /**
     * @return mixed
     */
    public function getEventIncharge(){
        return $this->eventIncharge;
    }


    /**
     * @param mixed $eventIncharge
     */
    public function setEventIncharge($eventIncharge){
        $this->eventIncharge = $eventIncharge;
    }

    /**
     * @return mixed
     */
    public function getEventtype()
    {
        return $this->eventtype;
    }

    /**
     * @param mixed $eventtype
     */
    public function setEventtype($eventtype)
    {
        $this->eventtype = $eventtype;
    }

    /**
     * @return mixed
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * @param mixed $startdate
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * @return mixed
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * @param mixed $enddate
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    }

    /**
     * @return mixed
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * @param mixed $starttime
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;
    }

    /**
     * @return mixed
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * @param mixed $endtime
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * @return mixed
     */
    public function getEventname()
    {
        return $this->eventname;
    }

    /**
     * @param mixed $eventname
     */
    public function setEventname($eventname)
    {
        $this->eventname = $eventname;
    }

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }


    /**
     * @return mixed
     */
    public function getTotalparticipant()
    {
        return $this->totalparticipant;
    }

    /**
     * @param mixed $totalparticipant
     */
    public function setTotalparticipant($totalparticipant)
    {
        $this->totalparticipant = $totalparticipant;
    }


}