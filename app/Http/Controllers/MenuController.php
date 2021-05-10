<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagaments;
use App\Categoria;


//realitzar pagaments

class MenuController extends Controller
{

  public function getMenu(){
      $pagaments = Pagaments::all();
      $categories = Categoria::all();
    return view("index", compact('pagaments','categories'));  
  }
 
}