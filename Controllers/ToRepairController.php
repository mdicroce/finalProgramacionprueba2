<?php

namespace Controllers;

use DAO\ToRepairDAO;
use DAO\ClientDAO;

class ToRepairController
{
    private $toRepairDao;
    private $clientDao;

    public function __construct()
    {
        $this->toRepairDao = new ToRepairDAO();
        $this->clientDao = new ClientDAO();
    }

    public function addNewJobView()
    {
        $clients = $this->clientDao->getClients();

        if (empty($clients)) {
            require_once VIEWS_PATH . 'AddClient.php';
        } else {
            require_once VIEWS_PATH . 'AddJob.php';
        }
    }

    public function addJob($name, $estado, $clientId)
    {
        session_start();
        $loggedUser = $_SESSION['loggedUser'];
        $this->toRepairDao->add($estado, $name, $loggedUser->getId(), $clientId);
        $this->addNewJobView();
    }
}
