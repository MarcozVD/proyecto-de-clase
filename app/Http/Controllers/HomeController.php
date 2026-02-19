<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return 'Lista de Produtos';
    }
    public function create(){
        return 'Formulario crear un producto';

    }
    public function show($product){
        return "Detalles del producto $product";
    }
    
}
