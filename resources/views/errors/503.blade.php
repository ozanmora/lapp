@extends('layouts.app')

@section('title', '503 Be right back.')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Be right back.
    </div>
    <div>
        {!! isset($exception) ? ( $exception->getMessage() ? $exception->getMessage() : null ) : null !!}
    </div>
</div>
@endsection
