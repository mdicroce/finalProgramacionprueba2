<?php

namespace Controllers;

use Models\Technician;
use DAO\TechnicianDAO;
use DAO\ToRepairDAO;

class TechnicianController
{
    private $TechnicianDao;
    private $ToRepairDao;
    public function __construct()
    {
        $this->TechnicianDao = new TechnicianDAO();
        $this->ToRepairDao = new ToRepairDAO();
    }

    public function login($username, $password)
    {
        $encriptedPass = sha1($password);
        $technician = $this->TechnicianDao->getTechnician($username, $encriptedPass);
        if (empty($technician)) {
            $message = "The Username or Password is incorrect, please try again.";
            include VIEWS_PATH . "Login.php";
        } else {
            session_start();
            $_SESSION['loggedUser'] = $technician;
            $this->technicianPanelView();
        }
    }
    public function register($name, $username, $password)
    {
        $encriptedPass = sha1($password);
        $this->TechnicianDao->create($name, $username, $encriptedPass);
        include VIEWS_PATH . 'Login.php';
    }

    public function TechnicianPanelView()
    {
        $technician = $_SESSION['loggedUser'];
        $jobs = $this->ToRepairDao->show($technician->getUsername());
        include VIEWS_PATH . "TechnicianPanel.php";
    }
}
