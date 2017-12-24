<?php


namespace StudioVisual\Core;


use StudioVisual\Core\Database\Connection;
use StudioVisual\Core\Database\Database;
use StudioVisual\Core\Database\OutputType;

abstract class Model
{
    protected
        $table;


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

    public function selectById(int $id)
    {
        $stmt = Connection::getConnection()->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, static::class);
        return $stmt->fetch();
    }

    public function insert()
    {
        $stmt = Connection::getConnection()
            ->prepare("
                INSERT INTO {$this->table} (" . Database::getFileds($this, OutputType::STRING) . ") 
                VALUES (" . Database::getReplacement($this, OutputType::STRING) . ")
            ");
        $stmt->execute(Database::getParams($this));
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