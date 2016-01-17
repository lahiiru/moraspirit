<?php
/**
 * Created by PhpStorm.
 * User: bmCSoft
 * Date: 2015-12-16
 * Time: 4:45 PM
 */

namespace AppBundle\Entity;


class Resource
{
    protected $resource_id;
    protected $value;
    protected $description;
    protected $officer_id;
    protected $type;
    protected $state;
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
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getOfficerId()
    {
        return $this->officer_id;
    }

    /**
     * @param mixed $officer_id
     */
    public function setOfficerId($officer_id)
    {
        $this->officer_id = $officer_id;
    }

}