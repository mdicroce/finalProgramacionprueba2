<?php

namespace Models;

class Technician
{
    private $id;
    private $name;
    private $username;
    private $password;

    public function  __construct($id, $name, $username, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
