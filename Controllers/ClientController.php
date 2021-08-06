<?php

namespace Controllers;

use DAO\ClientDAO as ClientDAO;
use \Exception as Exception;

class ClientController
{
    private $clientDao;

    public function __construct()
    {
        $this->clientDao = new ClientDAO();
    }
    public function addClient($name, $phone)
    {
        $this->clientDao->add($name, $phone);
        $this->addClientView();
    }
    public function addClientView()
    {
        session_start();
        if (isset($_SESSION['loggedUser'])) {
            require_once VIEWS_PATH . 'AddClient.php';
        } else {
            require_once VIEWS_PATH . 'Login.php';
        }
    }
}
