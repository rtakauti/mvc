<?php


namespace StudioVisual\Core\Database;


use StudioVisual\Core\Model;

class Database
{

    public static function getFileds(Model $model, int $type = OutputType::ARRAY)
    {
        $fields = Connection::getConnection()
            ->query('
                    SELECT COLUMN_NAME 
                    FROM INFORMATION_SCHEMA.COLUMNS 
                    WHERE TABLE_SCHEMA = "' . Connection::DBNAME . '" 
                    AND TABLE_NAME = "' . $model->getTable() . '" 
                    AND EXTRA <> "auto_increment"
            ')->fetchAll(\PDO::FETCH_COLUMN, 0);
        if ($type === OutputType::STRING) {
            $fields = implode(', ', $fields);
        }
        return $fields;
    }

    public static function getReplacement(Model $model, int $type = OutputType::ARRAY)
    {
        $fields = array_map(function ($field) {
            return ':' . $field;
        }, static::getFileds($model, OutputType::ARRAY));
        if ($type === OutputType::STRING) {
            $fields = implode(', ', $fields);
        }
        return $fields;
    }

    public static function getParams(Model $model)
    {
        $params = [];
        foreach (static::getFileds($model, OutputType::ARRAY) as $field) {
            $params[":$field"] = $model->{$field};
        }
        return $params;
    }

    public static function getUpdateParam(Model $model)
    {
        return implode(', ', array_map(function ($field){
            return "$field = :$field";
        }, static::getFileds($model, OutputType::ARRAY)));
    }


}