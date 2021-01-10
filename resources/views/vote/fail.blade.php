@extends('layouts.app')

@section('buttons')

    <a class="btn btn-primary mr-2 text-white" href="{{ url()->previous() }}">Volver</a>
    <a class="btn btn-primary mr-2 text-white" href="{{ route('polls.index') }}">Inicio</a>

@endsection

@section('content')
    <div class="alert alert-danger w-100" role="alert">
        Usted ya ha votado.
    </div>
@endsection