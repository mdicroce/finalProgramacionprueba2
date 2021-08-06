<?php

namespace Models;

class ToRepair
{
    private $id;
    private $name;
    private $state;
    private $client;
    private $technician;

    public function __construct($id = "", $name = "", $state = "", $client = "", $technician = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->state = $state;
        $this->client = $client;
        $this->technician = $technician;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getState()
    {
        return $this->state;
    }
    public function getClient()
    {
        return $this->client;
    }
    public function getTechnician()
    {
        return $this->technician;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setState($state)
    {
        $this->state = $state;
    }
    public function setClient($client)
    {
        $this->client = $client;
    }
    public function setTechnician($technician)
    {
        $this->technician = $technician;
    }
}
