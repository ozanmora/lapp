@extends('layouts.app')

@section('title', '404 Not Found')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Not Found.
    </div>
    <div>
        {!! isset($exception) ? ( $exception->getMessage() ? $exception->getMessage() : null ) : null !!}
    </div>
</div>
@endsection
