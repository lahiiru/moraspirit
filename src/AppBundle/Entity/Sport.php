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

    /**
     * @return mixed
     */
    public function getTotalplayer()
    {
        return $this->totalplayer;
    }

    /**
     * @param mixed $totalplayer
     */
    public function setTotalplayer($totalplayer)
    {
        $this->totalplayer = $totalplayer;
    }
    protected $totalplayer;
}