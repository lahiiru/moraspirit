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
        return array('Saman'=>1, 'Nimal'=>4 );
    }


}
