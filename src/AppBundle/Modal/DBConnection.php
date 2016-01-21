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
    private $username ;
    private $password ;
    private $host = 'localhost';
    private $database_name = 'moraspirit';

    private $con = null;

    public function connect($role = "none"){
        if($role = 'ROLE_ADMIN'){
            $this->username = 'admin';
            $this->password ='1234';
        }elseif($role = 'ROLE_MEMBER'){
            $this->username = 'member';
            $this->password ='1234';
        }elseif($role = 'ROLE_OFFICER'){
            $this->username = 'officer';
            $this->password ='1234';
        }else{
            $this->username = 'root';
            $this->password ='';
        }

        $link = mysqli_connect($this->host,$this->username,$this->password,$this->database_name);
        if(empty($link)){
            return  null;
        }
        else{
            $this->con = $link;
            return $link;
        }
    }

    /*
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
    */
    public function closeConnection(){
        if($this->con != null){
            mysqli_close($this->con);
        }
    }
}