<?php

namespace BLOG\models;

class Main
{
    protected function dbConnect()
    {

	    $db = new \PDO('mysql:host=localhost;dbname=blog', 'root','');
	    return $db;
    }
}
