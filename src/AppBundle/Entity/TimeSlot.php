<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/13/16
 * Time: 4:36 PM
 */

namespace AppBundle\Entity;


class TimeSlot
{

    protected  $timeslotid;
    protected  $day;
    protected $hour;
    protected  $minute;
    protected $duration;

    /**
     * @return mixed
     */
    public function getTimeslotid()
    {
        return $this->timeslotid;
    }

    /**
     * @param mixed $timeslotid
     */
    public function setTimeslotid($timeslotid)
    {
        $this->timeslotid = $timeslotid;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @param mixed $hour
     */
    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    /**
     * @return mixed
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * @param mixed $minute
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }



}