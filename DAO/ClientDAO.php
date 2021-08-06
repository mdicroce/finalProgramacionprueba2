<?php

namespace DAO;

use FFI\Exception;
use Models\Client as Client;

class ClientDAO
{
    private $tableName = 'client';
    private $connection;

    public function add($name, $phone)
    {
        session_start();
        if (isset($_SESSION['loggedUser'])) {
            $query = "INSERT INTO $this->tableName (name, phone) VALUES (:name,:phone);";
            $parameters['name'] = $name;
            $parameters['phone'] = $phone;
            try {
                $this->connection = Connection::getInstance();
                $this->connection->executeNonQuery($query, $parameters);
            } catch (Exception $th) {
                throw $th;
            }
        } else {
            return "not logged yet";
        }
    }

    public function getClients()
    {
        session_start();
        if (isset($_SESSION['loggedUser'])) {
            $query = "SELECT * from $this->tableName;";
            try {
                $this->connection = Connection::getInstance();
                $results = $this->connection->execute($query);
            } catch (Exception $ex) {
                throw $ex;
            }
            $clients = array();
            foreach ($results as $result) {
                array_push($clients, new Client($result['id'], $result['name'], $result['phone']));
            }
            return $clients;
        } else {
            return array();
        }
    }
}
