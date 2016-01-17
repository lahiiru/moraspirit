<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/13/16
 * Time: 3:32 AM
 */

namespace AppBundle\Entity;


class Sport
{

    protected  $sportid;
    protected  $title;
    protected $type;
    protected $totalplayers;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTotalplayers()
    {
        return $this->totalplayers;
    }

    /**
     * @param mixed $totalplayers
     */
    public function setTotalplayers($totalplayers)
    {
        $this->totalplayers = $totalplayers;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


}