@extends('layouts.app')

@section('title', '500 Internal Server Error')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Internal Server Error.
    </div>
    <div>
        {!! isset($exception) ? ( $exception->getMessage() ? $exception->getMessage() : null ) : null !!}
    </div>
</div>
@endsection
