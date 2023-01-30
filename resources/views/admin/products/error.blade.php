@extends('layouts.admin')
@section('content')
    <h1 class="text-center">Error 404</h1>
    <h3 class="text-center">{{$error}}</h3>
    <div class="card-body text-center">
        <a href="{{redirect()->back()}}" class="btn bg-primary text-white">Volver</a>
    </div>
@endsection