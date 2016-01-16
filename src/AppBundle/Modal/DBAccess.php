<?php
/**
 * Created by PhpStorm.
 * User: bmCSoft
 * Date: 2015-12-16
 * Time: 4:57 PM
 */

namespace AppBundle\Modal;

use AppBundle\Entity\Member;
use AppBundle\Entity\Resource;
use AppBundle\Entity\ResourceAllocation;

class DBAccess
{
    private $entity_type;
    private $entity;

    function __construct($entity){
        if ($entity != null){
            $this->entity = $entity;
            switch(get_class($entity)){
                case 'AppBundle\Entity\Member':
                    $this->entity_type = 'Member';
                    break;
                case 'AppBundle\Entity\Resource':
                    $this->entity_type = 'Resource';
                    break;
                case 'AppBundle\Entity\DynamicAllocation':
                    $this->entity_type = 'ResourceAllocation';
                    break;
                case 'AppBundle\Entity\Instuctor':
                    $this->entity_type = 'Instuctor';
                    break;
            }
        }

    }

    public function update(){
        $db=new DBConnection();
        if($db->connect()){
            $query ="";
            if($this->entity_type == 'Member'){
                $query = "UPDATE member SET first_name='".$this->entity->getFirstName()."',last_name='".$this->entity->getLastName()."',dept_name='".$this->entity->getDeptName()."',register_date='".$this->entity->getRegisterDate()."',email='".$this->entity->getEmail()."',mobile='".$this->entity->getMobile()."' WHERE s_ID = '".$this->entity->getStudentId()."'";
            }
            elseif($this->entity_type == 'Resource'){
                $query = "UPDATE resource SET value='".$this->entity->getValue()."',description='".$this->entity->getDescription()."',o_ID='".$this->entity->getOfficerId()."' WHERE r_ID='".$this->entity->getResourceId()."'";
            }
            elseif($this->entity_type=='ResourceAllocation'){
                $query = "UPDATE resource_alloc SET s_ID='".$this->entity->getMemberId()."',r_ID='".$this->entity->getResourceId()."',comments='".$this->entity->getComments()."',issued_date='".$this->entity->getIssuedDate()."',due_date='".$this->entity->getDueDate()."' WHERE s_ID='".$this->entity->getMemberId()."'";
            }
            $db->executeQuery($query);
            $db->closeConnection();
        }
        else{
            echo "Cannot connect to database";
        }

    }

    public function delete(){
        $db=new DBConnection();
        if($db->connect()){
            $query="";
            if($this->entity_type == 'Member'){
                $query = "DELETE FROM member WHERE s_ID='".$this->entity->getStudentId()."'";
            }
            elseif($this->entity_type == 'Resource'){
                $query = "DELETE FROM resource WHERE r_ID = '".$this->entity->setResourceId()."'";
            }
            elseif($this->entity_type=='ResourceAllocation'){
                $query = "DELETE FROM resource_alloc WHERE s_ID = '".$this->entity->getMemberId()."' AND r_ID = '".$this->entity->setResourceId()."'";
            }
            $db->executeQuery($query);
            $db->closeConnection();
        }
        else{
            echo "Cannot connect to database";
        }
    }

    public function insert(){
        $db=new DBConnection();
        if($db->connect()){
            $query = "";
            if($this->entity_type == 'Member'){
                $query = "INSERT INTO member (s_ID,first_name,last_name,dept_name,register_date,email,mobile,gender,faculty,birthday,bloodgroup,nic,address) VALUES ('".$this->entity->getStudentId()."','".$this->entity->getFirstName()."','".$this->entity->getLastName()."','".$this->entity->getDeptName()."','".$this->entity->getRegisterDate()."','".$this->entity->getEmail()."','".$this->entity->getMobile()."'".$this->entity->getGender()."','".$this->entity->getFacultyname()."','".$this->entity->getBirthday()."','".$this->entity->getBloodgroup()."','".$this->entity->getNic()."','".$this->entity->getAddress()."')";

            }
            elseif($this->entity_type == 'Resource'){
                $query = "INSERT INTO resource (r_ID,value,description,o_ID) VALUES ('".$this->entity->getResourceId()."','".$this->entity->getValue()."','".$this->entity->getDescription()."','".$this->entity->getOfficerId()."')";
            }
            elseif($this->entity_type=='ResourceAllocation'){
                $query = "INSERT INTO resource_alloc (s_ID,r_ID,comments,issued_date,due_date) VALUES ('".$this->entity->getMemberId()."','".$this->entity->getResourceId()."','".$this->entity->getComments()."','".$this->entity->getIssuedDate()."','".$this->entity->getDueDate()."')";
            }
            $db->executeQuery($query);
            $db->closeConnection();
        }
        else{
            echo "Cannot connect to database";
        }
    }

    public function getDetail(){
        $db=new DBConnection();
        if($db->connect()){
            if($this->entity_type == 'Member'){
                $member = new Member();
                foreach($this->entity as $property => $value){
                    $member->$property($value);
                }
                $query = "SELECT * FROM member WHERE s_ID = '".$member->getStudentId()."'";
                $result = $db->executeQuery($query);
                while($row = mysqli_fetch_assoc($result)){
                    $member->setFirstName($row[1]);
                    $member->setLastName($row[2]);
                    $member->setDeptName($row[3]);
                    $member->setRegisterDate($row[4]);
                    $member->setEmail($row[5]);
                    $member->setMobile($row[6]);
                }
                $db->closeConnection();
                return $member;

            }
            elseif($this->entity_type == 'Resource'){
                $resource = new Resource();
                foreach($this->entity as $property => $value){
                    $resource->$property($value);
                }
                $query = "SELECT * FROM resource WHERE r_ID='".$resource->getResourceId()."'";
                $result = $db->executeQuery($query);
                while($row = mysqli_fetch_assoc($result)){
                    $resource->setResourceId($row[1]);
                    $resource->setValue($row[2]);
                    $resource->setDescription($row[3]);
                    $resource->setOfficerId($row[4]);
                }
                $db->closeConnection();
                return $resource;
            }
            elseif($this->entity_type=='DynamicAllocation'){
                $resourceAlloc = new ResourceAllocation();
                foreach($this->entity as $property => $value){
                    $resourceAlloc->$property($value);
                }
                $query = "SELECT * FROM dynamic_alloc WHERE r_ID ='".$resourceAlloc->getResourceId()."' AND s_ID = '".$resourceAlloc->getMemberId()."'";
                $result = $db->executeQuery($query);
                while($row = mysqli_fetch_assoc($result)){
                    $resourceAlloc->setComments($row[2]);
                    $resourceAlloc->setIssuedDate($row[3]);
                    $resourceAlloc->setDueDate($row[4]);
                }
                $db->closeConnection();
                return $resourceAlloc;
            }

        }
        else{
            echo "Cannot connect to database";
        }
    }
}