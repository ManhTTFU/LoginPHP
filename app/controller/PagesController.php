<?php

namespace App\Controller;
class PagesController
{
    public function home()
    {
       
        
        return view('index');
    }

    public function login()
    {
        return view('login');
    } 

    public function register()
    {
        return view('register');
    }

    public function message(){
        return view('message');
    }






}


?>