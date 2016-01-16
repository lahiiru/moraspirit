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
        $q="CREATE VIEW avalabil AS
            SELECT r_ID,type, description FROM resource WHERE state='AVL' AND type='".$type."'";
        //$q->bind_param(":type", $type);
        $db->executeQuery($q);
        $query = "SELECT * FROM avalabil";
        $result = $db->executeQuery($query);
        $resultrow=array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($resultrow,$row);
        }
        $q="DROP VIEW avalabil";
        $db->executeQuery($q);
        $db->closeConnection();
        return $resultrow;

    }
}



}