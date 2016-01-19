<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/17/16
 * Time: 11:12 PM
 */

namespace AppBundle\Entity;


class StaticAllocation
{
    protected  $slotname;
    protected $day;
    protected $sportid;
    protected $resourceid;
    protected $maximumplayers;

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
    public function getSlotname()
    {
        return $this->slotname;
    }

    /**
     * @param mixed $slotname
     */
    public function setSlotname($slotname)
    {
        $this->slotname = $slotname;
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
    public function getResourceid()
    {
        return $this->resourceid;
    }

    /**
     * @param mixed $resourceid
     */
    public function setResourceid($resourceid)
    {
        $this->resourceid = $resourceid;
    }

    /**
     * @return mixed
     */
    public function getMaximumplayers()
    {
        return $this->maximumplayers;
    }

    /**
     * @param mixed $maximumplayers
     */
    public function setMaximumplayers($maximumplayers)
    {
        $this->maximumplayers = $maximumplayers;
    }


}