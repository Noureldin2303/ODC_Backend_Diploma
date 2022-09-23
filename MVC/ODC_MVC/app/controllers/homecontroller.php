<?php

namespace MVC\controllers;

use MVC\core\controller;
use MVC\models\user;

class homecontroller extends controller{
    public function index(){

        $user = new user();
        $data = $user->GetAllUsers();

        $title = 'Home Index';
        $this->view("\home\index",['title'=>$title,'h1'=>'Home Page','data'=>$data]);    
    }

    public function add(){
        
    }
}