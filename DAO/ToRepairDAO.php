<?php

namespace DAO;

use Models\ToRepair as ToRepair;
use Models\Client as Client;

use \Exception as Exception;

class ToRepairDAO
{
    private $connection;
    private $tableName = "to_repair";

    public function add($state, $name, $id_technician, $id_client)
    {
        $query = "INSERT INTO $this->tableName (state, name, id_tech, id_client) VALUES (:state, :name, :id_tech, :id_client);";
        $parameters["state"] = $state;
        $parameters["name"] = $name;
        $parameters["id_tech"] = (int)$id_technician;
        $parameters["id_client"] = (int)$id_client;
        try {
            $this->connection = Connection::getInstance();
            $this->connection->executeNonQuery($query, $parameters);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($technician_user)
    {
        $query = "SELECT t.id, t.name, t.state,c.id as client_id, c.name as client_name, c.phone as client_phone from $this->tableName t LEFT JOIN client c on c.id = t.id_client LEFT JOIN technician tc on tc.id = t.id_tech where :username = tc.username ;";
        $parameters['username'] = $technician_user;
        try {
            $this->connection = Connection::getInstance();
            $results = $this->connection->execute($query, $parameters);
        } catch (Exception $e) {
            throw $e;
        }
        $to_return = array();
        foreach ($results as $to_repair) {
            array_push($to_return, new ToRepair($to_repair["id"], $to_repair["name"], $to_repair["state"], new Client($to_repair['client_id'], $to_repair['client_name'], $to_repair['client_phone'])));
        }
        return $to_return;
    }
    public function remove($id)
    {
        $query = "DELETE from $this->tableName where id = $id;";
        try {
            $this->connection = Connection::getInstance();
            $this->connection->executeNonQuery($query);
        } catch (Exception $th) {
            throw $th;
        }
    }

    public function update($id, $name, $state)
    {
        $query = "UPDATE to_repair name = :name, state = :state where id = $id;";
        $parameters["name"] = $name;
        $parameters["state"] = $state;

        try {
            $this->connection = Connection::getInstance();
            $this->connection->executeNonQuery($query, $parameters);
        } catch (Exception $th) {
            throw $th;
        }
    }
}
