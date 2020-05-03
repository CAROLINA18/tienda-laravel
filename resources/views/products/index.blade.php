@extends('layouts.app');
@section('content')
<div class = "container">

    <div class="">
        <products-component></products-component>
    </div>

</div>
<div class="">
    {{$products->links()}}
</div>
@endsection
