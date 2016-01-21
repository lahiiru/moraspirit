<?php
/**
 * Created by PhpStorm.
 * User: niroshan
 * Date: 1/15/16
 * Time: 12:47 AM
 */

namespace AppBundle\Modal;



class ResourceAccess
{

    //got category and give out put as array of resource types and available quantities
public static function getResourceAvalability($category){
    $db=new DBConnection();
    $link =  $db->connect();
    if($link != null){
        $query = "SELECT rt.type_id AS ID,rt.name AS Name,rt.available_quantity  AS  'Avalable Quantity'  FROM resource_registration rr INNER JOIN resource_type rt ON rr.type_id = rt.type_id WHERE rr.category = '".$category."'";
        $result = $link->query($query);
        $result_array=array();
        $index=0;
        while($row = mysqli_fetch_assoc($result)){
            $result_array[$index] = $row;
            $index = $index+1;
        }
        $db->closeConnection();
        return $result_array;
    }
    $db->closeConnection();
    return null;
}


    public  static  function getResourceType(){
        $db=new DBConnection();
        $link =  $db->connect();
        if($link != null){
            $query = "SELECT type_id, name  FROM resource_type";
            $result = $link->query($query);
            $result_array=array();
            while($row = mysqli_fetch_assoc($result)){
                array_push($result_array,$row);
            }

            $db->closeConnection();
            return $result_array;
        }
        $db->closeConnection();
        return null;

    }

    public  static function getOfficer(){

        $db=new DBConnection();
        $link =  $db->connect();
        if($link != null) {
           $query = "SELECT concat(member.first_name,\" \",member.last_name) AS name,officer.id FROM officer INNER JOIN member ON officer.id = member.id";
           $result = $link->query($query);
           $result_array=array();
           while($row = mysqli_fetch_assoc($result)){
                   $result_array[$row['name']]=$row['id'];
               }
            $db->closeConnection();
             return $result_array;
         }
         $db->closeConnection();
        return null;
      }

    public static function updateRole($userid,$role ){

        $db=new DBConnection();
        $link =  $db->connect();
        if($link != null) {
            $roles = serialize(array($role));
            $sql = "UPDATE `app_user` SET `role`='" . $roles . "'  WHERE id='" . $userid . "'";
            $link->query($sql);
            $db->closeConnection();

        }



    }

    public static function getMembers(){
        $db=new DBConnection();
        $link =  $db->connect();
        if($link != null) {
            $query = "SELECT concat(first_name,\" \",last_name) AS name,id FROM member";
            $result = $link->query($query);
            $result_array=array();
            while($row = mysqli_fetch_assoc($result)){
                $result_array[$row['name']]=$row['id'];
            }
            $db->closeConnection();
            return $result_array;
        }
        $db->closeConnection();
        return null;
    }

    public static function getMemberDetail($id){
        $db=new DBConnection();
        $link =  $db->connect();
        if($link != null) {
            $query = "SELECT concat(first_name,\" \",last_name) , gender , email ,mobile   FROM member WHERE id ='".$id."'";
            $result = $link->query($query);


            $db->closeConnection();
            return $result;
        }
        $db->closeConnection();
        return null;
    }

}
