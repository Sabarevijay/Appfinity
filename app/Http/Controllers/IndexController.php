<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
   
    public function index(){
        return view('front.index');
    }   
    public function calc(){
        return view('tasks.calc');
    }  
    public function timer(){
        return view('tasks.timer');
    } 
    public function todo(){
        return view('tasks.todo');
    }
    
}
