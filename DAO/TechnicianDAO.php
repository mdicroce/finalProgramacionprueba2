<?php

namespace DAO;

use Exception;
use Models\Technician as Technician;

class TechnicianDAO
{
    private $tableName = "technician";
    private $connection;

    public function getTechnician($username, $password)
    {
        $query = "SELECT * FROM $this->tableName WHERE username = :username AND password = :password;";
        $parameters['username'] = $username;
        $parameters['password'] = $password;

        try {
            $this->connection = Connection::getInstance();
            $results = $this->connection->execute($query, $parameters);
        } catch (\Throwable $th) {
            throw $th;
        }
        if (!empty($results)) {
            $technician = "";
            foreach ($results as $result) {
                $technician = new Technician($result['id'], $result['name'], $result['username'], $result['password']);
            }
            return $technician;
        } else {
            return "";
        }
    }
    public function create($name, $username, $password)
    {
        $query = "INSERT INTO $this->tableName (name,username,password) VALUES(:name,:username,:password);";
        $parameters['name'] = $name;
        $parameters['username'] = $username;
        $parameters['password'] = $password;
        try {
            $this->connection = Connection::getInstance();
            $this->connection->executeNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
