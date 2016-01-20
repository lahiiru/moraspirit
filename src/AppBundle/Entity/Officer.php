<?php
/**
 * Created by PhpStorm.
 * User: Nuwan Rathnayaka
 * Date: 1/19/2016
 * Time: 9:10 AM
 */

namespace AppBundle\Entity;


class Officer
{
    protected $memberId;
    protected $roles;
    protected $appointedDate;

    /**
     * @return mixed
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * @param mixed $memberId
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return mixed
     */
    public function getAppointedDate()
    {
        return $this->appointedDate;
    }

    /**
     * @param mixed $appointedDate
     */
    public function setAppointedDate($appointedDate)
    {
        $this->appointedDate = $appointedDate;
    }





}