@extends('layouts.app')

@section('title', '403 Forbidden')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Forbidden.
    </div>
    <div>
        {!! isset($exception) ? ( $exception->getMessage() ? $exception->getMessage() : null ) : null !!}
    </div>
</div>
@endsection
