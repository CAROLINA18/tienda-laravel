{!! Form::open(['method' => 'DELETE' , 'route' => ['productos.destroy',$product->id] , 'onsubmit' => 'return confirm("¿Estas seguro de eliminar este producto?")'  ]) !!}
<input type="submit" value="Eliminar" class="btn btn-danger">
{!! Form::close() !!}
