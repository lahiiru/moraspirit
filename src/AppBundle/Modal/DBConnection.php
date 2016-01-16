<?php
/**
 * Created by PhpStorm.
 * User: bmCSoft
 * Date: 2015-12-16
 * Time: 5:21 PM
 */

namespace AppBundle\Modal;


use Symfony\Component\Config\Definition\Exception\Exception;

class DBConnection
{
    private $username = 'root';
    private $password = '1234';
    private $host = 'localhost';
    private $database_name = 'moraspirit';

    private $con = null;

    public function connect(){
        $link = mysqli_connect($this->host,$this->username,$this->password,$this->database_name);
        if(!$link){
            return false;
        }
        else{
            $this->con = $link;
            return true;
        }
    }

    public function executeQuery($query){
        if($this->con != null){
            try{
                $query_result = mysqli_query($this->con,$query);
                return $query_result;
            }catch(Exception $e){
                return false;
            }

        }
    }

    public function closeConnection(){
        if($this->con != null){
            mysqli_close($this->con);
        }
    }
}