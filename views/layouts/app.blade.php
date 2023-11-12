@extends('layouts.base')

@section('app')
    @include('elements.session-alerts')
    
    @yield('content')
@endsection