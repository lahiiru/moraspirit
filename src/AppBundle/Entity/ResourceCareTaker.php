<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/19/16
 * Time: 7:57 AM
 */

namespace AppBundle\Entity;


class ResourceCareTaker
{
    protected $rid;
    protected  $oid;

    /**
     * @return mixed
     */
    public function getRid()
    {
        return $this->rid;
    }

    /**
     * @param mixed $rid
     */
    public function setRid($rid)
    {
        $this->rid = $rid;
    }

    /**
     * @return mixed
     */
    public function getOid()
    {
        return $this->oid;
    }

    /**
     * @param mixed $oid
     */
    public function setOid($oid)
    {
        $this->oid = $oid;
    }



}