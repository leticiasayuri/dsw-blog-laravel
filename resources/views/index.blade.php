@extends('master')

@section('header')
    @include('menu')
@stop

@section('content')
<div class="container col-md-8">
    @include('posts')
</div>
@stop