<?php
/**
 * Created by PhpStorm.
 * User: bmCSoft
 * Date: 2015-12-16
 * Time: 4:40 PM
 */

namespace AppBundle\Entity;


class Member
{
    protected $student_id;
    protected $first_name;
    protected $last_name;
    protected $dept_name;
    protected $register_date;
    protected $email;
    protected $mobile;
    protected $facultyname;
    protected  $gender;
    protected  $birthday;
    protected $bloodgroup;
    protected $nic;
    protected $address;
    protected $index_nu;

    /**
     * @return mixed
     */
    public function getIndexNu()
    {
        return $this->index_nu;
    }

    /**
     * @param mixed $index_nu
     */
    public function setIndexNu($index_nu)
    {
        $this->index_nu = $index_nu;
    }

    /**
     * @return mixed
     */
    public function getFacultyname()
    {
        return $this->facultyname;
    }

    /**
     * @param mixed $facultyname
     */
    public function setFacultyname($facultyname)
    {
        $this->facultyname = $facultyname;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getBloodgroup()
    {
        return $this->bloodgroup;
    }

    /**
     * @param mixed $bloodgroup
     */
    public function setBloodgroup($bloodgroup)
    {
        $this->bloodgroup = $bloodgroup;
    }

    /**
     * @return mixed
     */
    public function getNic()
    {
        return $this->nic;
    }

    /**
     * @param mixed $nic
     */
    public function setNic($nic)
    {
        $this->nic = $nic;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }



    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->student_id;
    }

    /**
     * @param mixed $student_id
     */
    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getDeptName()
    {
        return $this->dept_name;
    }

    /**
     * @param mixed $dept_name
     */
    public function setDeptName($dept_name)
    {
        $this->dept_name = $dept_name;
    }

    /**
     * @return mixed
     */
    public function getRegisterDate()
    {
        return $this->register_date;
    }

    /**
     * @param mixed $register_date
     */
    public function setRegisterDate($register_date)
    {
        $this->register_date = $register_date;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }



}