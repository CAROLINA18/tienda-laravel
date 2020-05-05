<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductsCollection;
use App\ShoppingCart;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *Funcion Index que muestra la lista de productos disponibles por medio de una salida json y los pagina
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $products=Product::paginate(3);
        if($request->wantsJson()){
            return new ProductsCollection($products);
        }
        return view('products.index',['products' => $products ]);

    }

    /**
     * Show the form for creating a new resource.
     *Funcion create que sirve para permitir crear nuevos productos y retorna la vista del formulario para creacion
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product=new Product;
        return view('products/create',["product" => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *Funcion store recibe todos los parametros que entran por el formulario para crear un nuevo producto si la creacion
     *es exitosa redirige hacia el home de productos si no redirige hacia el formulario de creacion de productos
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $options = [
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price

        ];

        if(Product::create($options)){
            return redirect('/productos');
        }
        else{
            return view('products.create');
        }
    }

    /**
     * Display the specified resource.
     *La funcion show muestra el producto segun el id seleccionado
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *La funcion edit permite traer todos los valores del producto a modificar segun el id seleccionado.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =Product::find($id);
        return view("products.edit",["product" =>$product]);
    }

    /**
     * Update the specified resource in storage.
     *La funcion update recoge todos los parametros ingresados en el formulario de edicion y realiza una actualizacion
     *de la informacion del producto si la actualizacion es exitosa redirige al home de productos , si no redirige al formulario de edicion.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product =Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;

        if($product->save()){
            return redirect('/productos');
        }
        else{
            return view("products.edit",["product" =>$product]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *La funcion destroy elimina el producto segun el id seleccionado.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/productos');
    }
}
