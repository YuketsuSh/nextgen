@extends('layouts.base')

@section('app')
<main class="content">
    @include('elements.session-alerts')
    
    @yield('content')
</main>
@endsection