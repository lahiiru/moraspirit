<?php
/**
 * Created by PhpStorm.
 * User: Nuwan Rathnayaka
 * Date: 1/19/2016
 * Time: 12:30 PM
 */

namespace AppBundle\Entity;


class EventIncharge
{
    protected $officerID;
    protected $eventID;

    /**
     * @return mixed
     */
    public function getOfficerID()
    {
        return $this->officerID;
    }

    /**
     * @param mixed $officerID
     */
    public function setOfficerID($officerID)
    {
        $this->officerID = $officerID;
    }

    /**
     * @return mixed
     */
    public function getEventID()
    {
        return $this->eventID;
    }

    /**
     * @param mixed $eventID
     */
    public function setEventID($eventID)
    {
        $this->eventID = $eventID;
    }


}