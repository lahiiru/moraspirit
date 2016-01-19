<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/13/16
 * Time: 4:41 PM
 */

namespace AppBundle\Entity;


class EventMember
{

    protected  $studentid;
    protected  $eventid;

    /**
     * @return mixed
     */
    public function getStudentid()
    {
        return $this->studentid;
    }

    /**
     * @param mixed $studentid
     */
    public function setStudentid($studentid)
    {
        $this->studentid = $studentid;
    }

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



}