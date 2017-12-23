<?php

namespace StudioVisual\Models;


use StudioVisual\Core\Model;

class User extends Model
{
    public
        $name,
        $surname;
    protected
        $table = 'users';


}