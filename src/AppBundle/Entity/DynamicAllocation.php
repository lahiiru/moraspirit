<?php
/**
 * Created by PhpStorm.
 * User: bmCSoft
 * Date: 2015-12-16
 * Time: 4:49 PM
 */

namespace AppBundle\Entity;


class DynamicAllocation
{
    protected $type_id;
    protected $member_id;
    protected $comments;
    protected $issued_date;
    protected $due_date;
    protected $catogory;
    protected $quntity;
    protected  $daterange;

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
    public function getQuntity()
    {
        return $this->quntity;
    }

    /**
     * @param mixed $quntity
     */
    public function setQuntity($quntity)
    {
        $this->quntity = $quntity;
    }



    /**
     * @return mixed
     */
    public function getCatogory()
    {
        return $this->catogory;
    }

    /**
     * @param mixed $catogory
     */
    public function setCatogory($catogory)
    {
        $this->catogory = $catogory;
    }




    /**
     * @return mixed
     */
    public function getMemberId()
    {
        return $this->member_id;
    }

    /**
     * @param mixed $member_id
     */
    public function setMemberId($member_id)
    {
        $this->member_id = $member_id;
    }


    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * @param mixed $type_id
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }


    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */
    public function getIssuedDate()
    {
        return $this->issued_date;
    }

    /**
     * @param mixed $issued_date
     */
    public function setIssuedDate($issued_date)
    {
        $this->issued_date = $issued_date;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * @param mixed $due_date
     */
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
    }

}