@extends('layout')
@section('title', 'Login')
@section('content')
<div class="container">


    <form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-5" style="width: 500px">
      @csrf  
      <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control" name= 'email'>
          
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" name="remember" id="remember">
          <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>





      <div class="mt-5">
        @if($errors->any())
        <div class="col-sm-7 ms-auto me-auto mt-5 text-center">
          @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">{{$error}}</div>
          @endforeach
        </div>
        @endif
    
        @if(session()->has('success'))
          <div class="alert alert-success" role="alert">{{session()->get('success')}}</div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">{{session()->get('error')}}</div>
      @endif
      </div>
</div>
@endsection