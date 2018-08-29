@extends('layouts.app')

@section('content')
<div class="content">
    <div class="title m-b-md">
        {{ config('app.name', 'LAPP') }}
    </div>

    <div class="links">
        <a target="_blank" href="https://ozanmora.com">Ozan Mora</a>
        <a target="_blank" href="https://github.com/ozanmora/lapp">GitHub</a>
        <a target="_blank" href="https://linkedin.com/in/ozanmora">LinkedIn</a>
        <a target="_blank" href="https://laravel.com">Laravel</a>
    </div>
</div>
@endsection
