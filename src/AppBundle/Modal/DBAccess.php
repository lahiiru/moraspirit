<?php
/**
 * Created by PhpStorm.
// * User: bmCSoft
 * Date: 2015-12-16
 * Time: 4:57 PM
 */

namespace AppBundle\Modal;

use AppBundle\Entity\Member;
use AppBundle\Entity\Resource;
use AppBundle\Entity\ResourceAllocation;

$r=new DBAccess(null);
$r->insert();

class DBAccess
{
    private $entity_type;
    private $entity;

    function __construct($entity){
        if ($entity != null) {
            $this->entity = $entity;
            switch (get_class($entity)) {
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
            elseif($this->entity_type=='Entity'){
                $query="UPDATE event SET event_name='".$this->entity->getEventname()."'tot_participants'".$this->entity->getTotalparticipant()."'event_type'".$this->entity->getEventtype()."'start_date'".$this->entity->."'end_date'".$this->entity->."'start_time'".$this->entity->."'end_time'".$this->entity->.
            }
         //   $db->executeQuery($query);
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
                $query = "DELETE FROM resource WHERE r_ID = '".$this->entity->getResourceId()."'";
            }
            elseif($this->entity_type=='ResourceAllocation'){
                $query = "DELETE FROM resource_alloc WHERE s_ID = '".$this->entity->getMemberId()."' AND r_ID = '".$this->entity->setResourceId()."'";
            }
        //    $db->executeQuery($query);
            $db->closeConnection();
        }
        else{
            echo "Cannot connect to database";
        }
    }

    public function insert(){


        $db=new DBConnection();
        $link=$db->connect();
        if($link != null){
            $query = "";
            if($this->entity_type == 'Member'){                           //
                mysqli_report(MYSQLI_REPORT_ALL);
                $obj=$this->entity;
                $FirstName=$obj->getFirstName();
                $LastName=$obj-> getLastName();
                $DeptName=$obj->getDeptName();
                $RegisterDate=$obj->getRegisterDate();
                $Email=$obj->getEmail();
                $Mobile=$obj->getMobile();
                $Gender=$obj->getGender();
                $Facultyname=$obj->getFacultyname();
                $Birthday=$obj->getBirthday();
                $Bloodgroup=$obj->getBloodgroup();
                $Nic=$obj->getNic();
                $Address=$obj->getAddress();
                $IndexNu=$obj->getIndexNu();


                $query =$link->prepare("INSERT INTO member (first_name,last_name,dept_name,register_date,email,mobile,gender,faculty_name,birthday,blood_group,NIC,address,index_no) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $query->bind_param("sssssssssssss",$FirstName,$LastName,$DeptName,$RegisterDate,$Email,$Mobile,$Gender,$Facultyname,$Birthday,$Bloodgroup,$Nic,$Address,$IndexNu);
                $query->execute();

            }
            elseif($this->entity_type == 'Resource'){
                $obj=$this->entity;

                $value=$obj->getValue();
                $state=$obj->getState();
                $type=$obj->getType();
                $description=$obj->getDescription();
                $o_id=$obj->getOfficerId();
                $regDate=$obj->getreg_date();

                $query=$link->prepare("INSERT INTO resource (value,type,state,description,o_id) VALUES (?,?,?,?,?,?)");
                $query->bind_param("dsssi",$value,$state,$type,$description,$o_id,$regDate);



            }
            elseif($this->entity_type=='DyanamicAllocation'){
                //$query = "INSERT INTO resource_alloc (s_ID,r_ID,comments,issued_date,due_date) VALUES ('".$this->entity->getMemberId()."','".$this->entity->getResourceId()."','".$this->entity->getComments()."','".$this->entity->getIssuedDate()."','".$this->entity->getDueDate()."')";
                $query=$link->prepare("INSERT INTO dynamic_allocation(s_id,r_id,issued_date,due_date,comments) VALUES(?,?,?,?,?)");

            }
           // $db->executeQuery($query);
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