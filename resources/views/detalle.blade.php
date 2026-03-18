@extends('layouts.app')

@section('content')

<h1 class="mb-4">{{ $producto['nombre'] }}</h1>

<div class="row">

<div class="col-md-6">

<img src="{{ $producto['imagen1'] }}" class="img-fluid mb-2 img-detalle">

@if($producto['imagen2'])
<img src="{{ $producto['imagen2'] }}" class="img-fluid mb-2 img-detalle">
@endif

@if($producto['imagen3'])
<img src="{{ $producto['imagen3'] }}" class="img-fluid img-detalle">
@endif

</div>

<div class="col-md-6">
<p>{{ $producto['descripcion'] }}</p>
<p><strong>Precio:</strong> ${{ $producto['precio'] }}</p>
<p><strong>Existencia:</strong> {{ $producto['stock'] }}</p>
</div>

</div>

@endsection