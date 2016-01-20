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
        $query = "SELECT rt.type_id,rt.name,rt.available_quantity FROM resource_registration rr INNER JOIN resource_type rt ON rr.type_id = rt.type_id WHERE rr.category = '".$category."'";
        $result = $link->query($query);
        $result_array=array();
        while($row = mysqli_fetch_assoc($result)){
            $temp_array = array();
            $temp_array[$row['name']]=$row['available_quantity'];
            $result_array[$row['type_id']]= $temp_array;
        }
        $db->closeConnection();
        return $result_array;
    }
    $db->closeConnection();
    return null;
}
}