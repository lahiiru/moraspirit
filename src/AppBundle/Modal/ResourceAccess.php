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

    public static function  getCommingEvent()
    {

        $conn = new DBConnection();
        $link = $conn->connect();

        if (!($link == null)) {
           // $query="CREATE VIEW avalability1 AS select a.event_id,a.event_name,a.location,(a.tot_participants-count(b.event_id)) AS Avalability ,a.event_name AS 'Event Name' from event a inner join event_member b  where a.event_id=a.event_id and a.start_date > CURRENT_DATE";
            $query="CREATE VIEW avalability1 AS select event_name,location from event";
            $link->query($query);

            $query = "SELECT * FROM avalability1";
            $result = $link->query($query);
            $resultrow = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($resultrow, $row);
            }
            $q = "DROP VIEW avalability1";
            $link->query($q);
            $conn->closeConnection();
            return $resultrow;
        }



    }




}