<?php

namespace TechStory\Classes\Models;

use  TechStory\Classes\Db;

class Cat extends Db
{
    public function __construct()
    {
        $this->table = "cats";
        $this->connect();
    }
}
