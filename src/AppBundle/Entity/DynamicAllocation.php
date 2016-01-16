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
    protected $resource_id;
    protected $member_id;
    protected $comments;
    protected $issued_date;
    protected $due_date;
    protected  $resourcetype;

    /**
     * @return mixed
     */
    public function getResourcetype()
    {
        return $this->resourcetype;
    }

    /**
     * @param mixed $resourcetype
     */
    public function setResourcetype($resourcetype)
    {
        $this->resourcetype = $resourcetype;
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
    public function getResourceId()
    {
        return $this->resource_id;
    }

    /**
     * @param mixed $resource_id
     */
    public function setResourceId($resource_id)
    {
        $this->resource_id = $resource_id;
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