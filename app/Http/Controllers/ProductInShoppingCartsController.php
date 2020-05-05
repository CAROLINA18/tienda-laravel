<?php

namespace App\Http\Controllers;
use App\ProductInShoppingCart;
use Illuminate\Http\Request;

class ProductInShoppingCartsController extends Controller
{

    //Se crea un middleware con la intencion de manejar sesiones en cuanto al manejo de carrito de compra
    //este se encarga de mantener el carrito mientras la sesion este abierta y de lo contrario crear un nuevo carro de compras
    public function __construct(){
        $this->middleware("shopping_cart");
    }

    //La funcion store permite agregar productos al carrito de compras, si se agrego el producto de manera correcta
    //redireciona a la pagina anterior si no despliega un error.
    public function store(Request $request){
        $in_shopping_cart = ProductInShoppingCart::create([
            'shopping_cart_id' => $request->shopping_cart->id,
            'product_id' => $request->product_id
        ]);
        if($in_shopping_cart){
          return redirect()->back();
        }

        return redirect()->back->withErrors(['product'=>'No se puso agregar el producto']);
    }

    public function destroy($id){

    }
}
