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

public static function getResourceAvalability($type){

    $db=new DBConnection();

    if($db->connect()){
        $conn=new DBConnection();
        $link=$conn->connect();

        if(!($link==null)){
            $link->query("CREATE VIEW avalabil AS
            SELECT r_ID,type, description FROM resource WHERE state='AVL' AND type='".$type."'");
            $query = "SELECT * FROM avalabil";
            $result = $link->query($query);
            $resultrow=array();
            while($row = mysqli_fetch_assoc($result)){
                array_push($resultrow,$row);
            }
            $q="DROP VIEW avalabil";
            $link->query($q);
            $db->closeConnection();
            return $resultrow;
        }




    }
}



}