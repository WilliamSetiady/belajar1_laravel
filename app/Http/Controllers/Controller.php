<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function callName(){
        return "Ini Belajar Laravel";
    }

    public function update($name){
        return "Selamat Datang $name";
    }
    public function nuall(){
        return "Nuall";
    }
}
