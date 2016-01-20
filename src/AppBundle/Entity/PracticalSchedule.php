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
    protected $studentID;
    protected $instructorID;
    protected $sportID;
    protected $sportName;
    protected $day;

    /**
     * @return mixed
     */
    public function getStudentID()
    {
        return $this->studentID;
    }

    /**
     * @param mixed $studentID
     */
    public function setStudentID($studentID)
    {
        $this->studentID = $studentID;
    }

    /**
     * @return mixed
     */
    public function getInstructorID()
    {
        return $this->instructorID;
    }

    /**
     * @param mixed $instructorID
     */
    public function setInstructorID($instructorID)
    {
        $this->instructorID = $instructorID;
    }

    /**
     * @return mixed
     */
    public function getSportID()
    {
        return $this->sportID;
    }

    /**
     * @param mixed $sportID
     */
    public function setSportID($sportID)
    {
        $this->sportID = $sportID;
    }

    /**
     * @return mixed
     */
    public function getSportName()
    {
        return $this->sportName;
    }

    /**
     * @param mixed $sportName
     */
    public function setSportName($sportName)
    {
        $this->sportName = $sportName;
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





}