<?php
/**
 * Created by PhpStorm.
 * User: bmCSoft
 * Date: 2016-01-20
 * Time: 10:38 PM
 */

namespace AppBundle\Modal;

class EventAccess{
    public static function getEvents(){
        $db = new DBConnection();
        $link = $db->connect();
        if($link != null){
            $query = "SELECT event_name,start_date,end_date,start_time FROM event";
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
}