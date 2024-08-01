@extends('Panel.app')

@section('menu')
<!-- Seccion por si se debe agregar un penu personal -->


@endsection

@section('contenido')
<h1 class="mt-4">Panel de Control </h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"></li>
</ol>

<form action="{{route('import.contactos')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Import</button>
</form>


@endsection
