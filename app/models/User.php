<?php

namespace StudioVisual\Models;


use StudioVisual\Core\Database\Database;

class User extends Database
{
    protected
        $table = 'users';


    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->attributes['surname'];
    }

    /**
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->attributes['surname'] = $surname;
        return $this;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->attributes['name'];
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->attributes['name'] = $name;
        return $this;
    }


}