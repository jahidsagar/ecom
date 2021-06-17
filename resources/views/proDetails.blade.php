@extends('layouts.admin')
@section('title','dashboard')

@section('content')

@if(Session::has('message'))
    <p class="alert alert-info my-2">{{ Session::get('message') }}</p>
@endif
hi


@endsection