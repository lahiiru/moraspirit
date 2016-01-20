<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/21/16
 * Time: 12:34 AM
 */

namespace AppBundle\Entity;


class NewResourceType
{

    protected  $name;
    protected $o_id;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getOId()
    {
        return $this->o_id;
    }

    /**
     * @param mixed $o_id
     */
    public function setOId($o_id)
    {
        $this->o_id = $o_id;
    }





}