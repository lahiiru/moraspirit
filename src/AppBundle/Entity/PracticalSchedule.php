<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/13/16
 * Time: 4:38 PM
 */

namespace AppBundle\Entity;


class PracticalSchedule
{
    protected  $timeslotid;
    protected $nic;
    protected $sportid;
    protected $studentis;

    /**
     * @return mixed
     */
    public function getTimeslotid()
    {
        return $this->timeslotid;
    }

    /**
     * @return mixed
     */
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * @param mixed $nic
     */
    public function setNic($nic)
    {
        $this->nic = $nic;
    }

    /**
     * @return mixed
     */
    public function getSportid()
    {
        return $this->sportid;
    }

    /**
     * @param mixed $sportid
     */
    public function setSportid($sportid)
    {
        $this->sportid = $sportid;
    }

    /**
     * @return mixed
     */
    public function getStudentis()
    {
        return $this->studentis;
    }

    /**
     * @param mixed $studentis
     */
    public function setStudentis($studentis)
    {
        $this->studentis = $studentis;
    }

    /**
     * @param mixed $timeslotid
     */
    public function setTimeslotid($timeslotid)
    {
        $this->timeslotid = $timeslotid;
    }



}