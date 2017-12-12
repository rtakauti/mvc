<?php

namespace StudioVisual\Models;


class User
{
    private $name;
    private $work;

    public function __construct()
    {
        $this->name = 'Rubens';
        $this->work = 'StudioVisual';
    }

    /**
     * @return string
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * @param string $work
     * @return User
     */
    public function setWork($work)
    {
        $this->work = $work;
        return $this;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }



}