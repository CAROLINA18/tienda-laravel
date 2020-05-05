<?php

namespace App\Http\Middleware;

use Closure;
use App\ShoppingCart;
class SetShoppingCart
{
    /**
     * Handle an incoming request.
     * Esta funcion es la que le da manejo a las sesiones del carrito de compras matiene el carrito si la sesion existe
     * si no hay sesion permite crear un nuevo carrito de compras.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $sessionName="shopping_cart_id";
        $shopping_cart_id= \Session::get($sessionName);
        $shopping_cart=ShoppingCart::findOrCreateById($shopping_cart_id);
        \Session::put($sessionName,$shopping_cart->id);
        $request->shopping_cart = $shopping_cart;
        return $next($request);
    }
}
