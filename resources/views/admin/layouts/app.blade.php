@extends('templates.adminlte.layouts.master')

@if (auth()->check())
    @section('user-avatar', Gravatar::get(auth()->user()->email, ['size' => 160]))
    @section('user-name', auth()->user()->name)
    @section('user-since', auth()->user()->created_at->format('M Y'))
@endif
