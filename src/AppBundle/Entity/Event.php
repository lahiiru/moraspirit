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
    protected $eventid;
    protected  $eventname;
    protected  $budget;
    protected  $date;
    protected $totalparticipant;
    protected $oid;

    /**
     * @return mixed
     */
    public function getEventid()
    {
        return $this->eventid;
    }

    /**
     * @param mixed $eventid
     */
    public function setEventid($eventid)
    {
        $this->eventid = $eventid;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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

    /**
     * @return mixed
     */
    public function getOid()
    {
        return $this->oid;
    }

    /**
     * @param mixed $oid
     */
    public function setOid($oid)
    {
        $this->oid = $oid;
    }

}