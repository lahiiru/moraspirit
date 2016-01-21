<?php
/**
 * Created by PhpStorm.
 * User: Nuwan Rathnayaka
 * Date: 1/21/2016
 * Time: 3:35 AM
 */

namespace AppBundle\Modal;



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
        $sql="SELECT id FROM members WHERE email='".$email."'";
        $index=$this->link->query($sql);
        if($index!=null){
            return 1;
        }
        else{
            return 0;
        }
        $this->db->closeConnection();
    }




}