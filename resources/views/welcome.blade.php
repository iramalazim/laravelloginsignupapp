@extends('layout')
@section('title', 'Home')
@section('content')

<div class="container mt-5">
@auth
<h1 class="d-flex justify-content-center ">Hello,{{auth()->user()->name}}
</h1>
@else
<h1 class="d-flex justify-content-center ">Dear User, Please Login First</h1>
@endauth
</div>
@endsection