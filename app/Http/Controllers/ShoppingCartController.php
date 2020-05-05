<?php

namespace App\Http\Controllers;
use App\Http\resources\ProductsCollection;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
   //Se invoca el middleware con el fin de manejar las sesiones del carrito de compras.
    public function __construct(){
        $this->middleware('shopping_cart');
    }

    //Funcion show muestra el carrito de compras.
    public function show(Request $request){
        return view('shopping_cart.show',['shopping_cart' => $request->shopping_cart]);
    }

    //Funcion productos permite traer los productos que han sido agregados al carrito.
    public function products(Request $request){
        return new ProductsCollection($request->shopping_cart->products()->get());
    }
}
