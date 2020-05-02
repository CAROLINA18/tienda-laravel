<!-- en esta vista se crea el formulario tanto para editar como para crear productos. -->
{!! Form::open(['route' => [$product->url(),$product->id],'method'=>$product->method()]) !!}
    <div clas="app-form">
        {!! Form:: label ('title','Titulo de producto') !!}
        {!! Form::text('title',$product->title,['class' => 'form-control']) !!}
    </div>

    <div clas="app-form">
        {!! Form:: label ('description','Descripcion de producto') !!}
        {!! Form::textarea('description',$product->description,['class' => 'form-control']) !!}
    </div>

    <div clas="app-form">
        {!! Form:: label ('price','Precio de producto') !!}
        {!! Form::number('price',$product->price,['class' => 'form-control']) !!}
    </div>
    <br>
    <div class="">
        <input type="submit" value="Guardar" class = "btn btn-primary">
    </div>
{!! Form:: close() !!}
