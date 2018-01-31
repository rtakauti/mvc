<?php

namespace StudioVisual\Core;

use StudioVisual\Core\Database\Connection;
use StudioVisual\Core\Database\Database;
use StudioVisual\Core\Database\OutputType;

abstract class Model
{
    protected
        $table;
    private
        $data = [];


    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __call($name, $arguments)
    {
        if (0 === strpos($name, 'get')) {
            $key = strtolower(str_replace('get', '', $name));
            return $this->data[$key];
        }

        if (0 === strpos($name, 'set')) {
            $key = strtolower(str_replace('set', '', $name));
            $this->data[$key] = $arguments[0];
        }

        if (0 === strpos($name, 'selectBy')) {
            $field = strtolower(str_replace('selectBy', '', $name));
            $stmt = Connection::getConnection()->prepare("SELECT * FROM {$this->table} WHERE {$field} = :{$field}");
            $stmt->execute([":$field" => $arguments[0]]);
            return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
        }
    }

    public function getTable()
    {
        return $this->table;
    }


    public function selectAll()
    {
        $stmt = Connection::getConnection()->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
    }


    public function insert()
    {
        $db = Connection::getConnection();
        $stmt =
            $db->prepare("
                INSERT INTO {$this->table} (" . Database::getFileds($this, OutputType::STRING) . ") 
                VALUES (" . Database::getReplacement($this, OutputType::STRING) . ")
            ");
        $stmt->execute(Database::getParams($this));
        if ($stmt->errorInfo()[2]) {
            die($stmt->errorInfo()[2]);
        }
        return $this;
    }

    public function update($id)
    {
        $stmt = Connection::getConnection()
            ->prepare("
                UPDATE {$this->table} 
                SET " . Database::getUpdateParam($this) . " 
                WHERE id = :id
            ");
        $stmt->execute(array_merge([':id' => $id], Database::getParams($this)));
        return $this;
    }

    public function delete($id)
    {
        $stmt = Connection::getConnection()
            ->prepare("
                DELETE FROM {$this->table} 
                WHERE id = :id
            ");
        $stmt->execute([':id' => $id]);
        return $this;
    }


}