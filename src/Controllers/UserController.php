<?php

require_once '../src/Models/User.php';
require_once '../src/Views/login.php';
require_once '../src/Views/home.php';
require_once '../src/Views/View.php';

class UserController{
    
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }
}