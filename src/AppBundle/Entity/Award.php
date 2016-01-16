<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/13/16
 * Time: 3:22 AM
 */

namespace AppBundle\Entity;


class Award
{
    protected  $awardnumber;
    protected  $awardtype;
    protected  $scope;
    protected  $issuedate;
    protected  $studentid;
    protected  $sportid;
    protected  $cetificatenumber;
    /**
     * @return mixed
     */
    public function getAwardnumber()
    {
        return $this->awardnumber;
    }

    /**
     * @param mixed $awardnumber
     */
    public function setAwardnumber($awardnumber)
    {
        $this->awardnumber = $awardnumber;
    }

    /**
     * @return mixed
     */
    public function getAwardtype()
    {
        return $this->awardtype;
    }

    /**
     * @param mixed $awardtype
     */
    public function setAwardtype($awardtype)
    {
        $this->awardtype = $awardtype;
    }

    /**
     * @return mixed
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @param mixed $scope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
    }

    /**
     * @return mixed
     */
    public function getIssuedate()
    {
        return $this->issuedate;
    }

    /**
     * @param mixed $issuedate
     */
    public function setIssuedate($issuedate)
    {
        $this->issuedate = $issuedate;
    }

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
    public function getCetificatenumber()
    {
        return $this->cetificatenumber;
    }

    /**
     * @param mixed $cetificatenumber
     */
    public function setCetificatenumber($cetificatenumber)
    {
        $this->cetificatenumber = $cetificatenumber;
    }



}