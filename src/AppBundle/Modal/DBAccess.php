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
                $query="UPDATE event SET event_name='".$this->entity->getEventname()."'tot_participants'".$this->entity->getTotalparticipant()."'event_type'".$this->entity->getEventtype()."'start_date'".$this->entity->getStartdate()."'end_date'".$this->entity->getEnddate()."'start_time'".$this->entity->getStarttime()."'end_time'".$this->entity->getEndtime()."'budget'".$this->entity->getBudget()."'description'".$this->entity->getDescription()."'location'".$this->entity->getLocation()."'i_id'".$this->entity->getEventIncharge()."'";
            }
            elseif($this->entity_type=='Sport'){
                $query="UPDATE sport SET title='".$this->entity->getTitle()."'tot_players'".$this->entity->getTotalplayers()."'type'".$this->entity->getType()."'";
            }
            elseif($this->entity_type=='')
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
            if($this->entity_type == 'Member'){
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
                $password='$2y$13$0aW6zsmFJEZKWgS8o5kK..U3KOP6mWC6rBl9VLPvEMuH6j8/1mLlO';
                $roles='a:2:{i:0;s:10:"ROLE_ADMIN";i:1;s:9:"ROLE_USER";}';
                $isActice=1;


                mysqli_autocommit($link,FALSE);
                $query =$link->prepare("INSERT INTO member (first_name,last_name,dept_name,register_date,email,mobile,gender,faculty_name,birthday,bloodgroup,NIC,address,index_no) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $query->bind_param("sssssssssssss",$FirstName,$LastName,$DeptName,$RegisterDate,$Email,$Mobile,$Gender,$Facultyname,$Birthday,$Bloodgroup,$Nic,$Address,$IndexNu);
                $query->execute();

                $last_id = mysqli_insert_id($link);
                mysqli_query($link,"INSERT INTO app_user(email,password,role,is_active) VALUES('".$Email."','".$password."','".$roles."','".$isActice."')");
                mysqli_commit($link);

            }

            elseif($this->entity_type=='Sport')
            {
                mysqli_report(MYSQLI_REPORT_ALL);
                $obj=$this->entity;
                $title = $obj->getTitle();
                $totPlayers = $obj->getTotalPlayers();
                $type = $obj->getType();
                $query =$link->prepare("INSERT INTO sport  (title ,tot_players ,type) VALUES (?,?,?)");
                $query->bind_param("sss",$title,$totPlayers,$type);
                $query->execute();
            }
            elseif($this->entity_type == 'Resource'){
                $obj=$this->entity;
                mysqli_report(MYSQLI_REPORT_ALL);
                $value=$obj->getValue();
                $state=$obj->getState();
                $type=$obj->getType();
                $description=$obj->getDescription();
                $o_id=$obj->getOfficerId();
                $regDate=$obj->getRegDate();
                $name=$obj->getName();

                $query=$link->prepare("INSERT INTO resource (`value`,state,`type`,description,o_id,reg_date,`name`) VALUES (?,?,?,?,?,?,?)");
                $query->bind_param("dsssiss",$value,$state,$type,$description,$o_id,$regDate,$name);
                var_dump($query);
                $query->execute();



            }
            elseif($this->entity_type=='PracticalSchedule'){
                $studentID=$this->entity->getStudentID();
                $instructorID=$this->entity->getInstructorID();
                $sportID=$this->entity->getSportID();
                $slotName=$this->entity->getSportName();
                $day=$this->entity->getDay();

                $query=$link->prepare("INSERT INTO practical_schedule(s_id,i_id,sport_id,slot_name,day) VALUES(?,?,?,?,?)");
                $query->bind_param("iiiss",$studentID,$instructorID,$sportID,$slotName,$day);
                $query->execute();
            }

            elseif($this->entity_type=='Officer'){
                $memberID=$this->entity->getMemberId();
                $roles=$this->entity->getRoles();
                $appointedDate=$this->entity->getAppointedDate();

                $query=$link->prepare("INSERT INTO officer(s_id,appointed_date,roles) VALUES (?,?,?)");
                $query->bind_param("iss",$memberID,$appointedDate,$roles);
                $query->execute();

            }

            elseif($this->entity_type == 'Event'){
                mysqli_report(MYSQLI_REPORT_ALL);
                $obj = $this->entity;
                $eName = $obj->getEventName();
                $tParticipants = $obj->getTotalparticipant();
                $eType = $obj->getEventtype();
                $startDate = $obj->getStartdate();
                $endDate = $obj->getEndDate();
                $startTime = $obj->getStartTime();
                $endTime = $obj->getEndTime();
                $budget  = $obj-> getBudget();
                $description = $obj->getDescription();
                $location = $obj->getLocation();
                $eventIncharge = $obj->getEventIncharge();
                // Set autocommit to off
                mysqli_autocommit($link,FALSE);
                mysqli_query($link,"INSERT INTO event (event_name,tot_participants,event_type,start_date,end_date,start_time,end_time,budget,description,location)
                VALUES ('".$eName."','".$tParticipants."','".$eType."','".$startDate."','".$endDate."','".$startTime."','".$endTime."','".$budget."','".$description."','".$location."')");
                $last_id = mysqli_insert_id($link);
                mysqli_query($link,"INSERT INTO event_incharge (o_id,event_id) VALUES ('".$last_id."','".$eventIncharge."')");
                mysqli_commit($link);
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
        $link=$db->connect();
        if($link){
            if($this->entity_type == 'Member'){
                $member = new Member();
                $query = "SELECT * FROM member WHERE id = ".$this->entity->getStudentId();
                $result = $link->query($query);
                while($row = mysqli_fetch_assoc($result)){
                    $member->setFirstName($row['first_name']);
                    $member->setLastName($row['last_name']);
                    $member->setDeptName($row['dept_name']);
                    $member->setRegisterDate($row['register_date']);
                    $member->setEmail($row['email']);
                    $member->setMobile($row['mobile']);
                    $member->setIndexNu($row['index_no']);
                    $member->setBirthday($row['birthday']);
                    $member->setGender($row['gender']);
                    $member->setFacultyname($row['faculty_name']);
                    $member->setNic($row['NIC']);
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