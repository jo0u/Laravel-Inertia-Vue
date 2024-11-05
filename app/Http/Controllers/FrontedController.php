<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontedController extends Controller
{
   public function index(){


    return Inertia::render('Frontend/Home');
 
   } 

   public function about(){
    return Inertia::render('Frontend/About',[
        'title' => 'About Us Page'
    ]);
   }

   public function contact(){
    
   }

}
