<?php

class User
{
    public $id;
    public $userName;
    public $password;

  


    public function __construct($id, $userName, $password)
    {
        // echo 'objeto construido';
        $this->id = $id;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function __destruct()
    {
        // echo 'objeto user destruido';
        /* para destruir ej unset($persona); */
    }

    public function getUserName()
    {
        return $this->userName;
    }
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }
    public function showInfo(){
        $info = '<h1> Id: ' . $this->getId();
        $info += ' Username: ' . $this->getUserName();
        $info += ' Password: ' . $this->getPassword() . '</h1>';
        echo $info;
    }
}
