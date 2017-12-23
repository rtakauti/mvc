<?php


namespace StudioVisual\Core\Database;


class Database
{
    protected
        $conn,
        $table,
        $fields,
        $replace,
        $params = [];
    public
        $attributes = [];

    public function __construct()
    {
        $this->conn = Connection::getConnection();
        $select = $this->conn->query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = "mvc" AND TABLE_NAME = "users" AND EXTRA <> "auto_increment"');
        $this->fields = $select->fetchAll(\PDO::FETCH_COLUMN, 0);
        $this->replace = array_map(function ($field) {
            return ':' . $field;
        }, $this->fields);
    }

    public function insert()
    {
        foreach ($this->fields as $field) {
            $this->params[":$field"] = $this->{'get'.$field}();
       }
        $query = "INSERT INTO {$this->table} (" . implode(', ', $this->fields) . ") VALUES (" . implode(', ',
                $this->replace) . ")";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($this->params);
    }
}