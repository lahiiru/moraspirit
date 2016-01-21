<?php
/**
 * Created by PhpStorm.
 * User: Nuwan Rathnayaka
 * Date: 1/21/2016
 * Time: 3:35 AM
 */

namespace AppBundle\Modal;

/*
$r=new DBQuery();
$t=$r->isEmailPresent("nimal@gmail.com");
echo $t;
*/
class DBQuery
{
    private $link;
    private $db;

    function __construct(){
        $this->db=new DBConnection();
        $this->link=$this->db->connect();
    }
    public function isEmailPresent($email){
        $index=null;
        $sql="SELECT id FROM app_user WHERE email='".$email."'";
        $index=$this->link->query($sql);
        $result_array=array();
        while($row = mysqli_fetch_assoc($index)){
            array_push($result_array,$row);
        }
        if(!empty($result_array)){
            return true;
        }
        else{
            return false;
        }
        $this->db->closeConnection();
    }

}