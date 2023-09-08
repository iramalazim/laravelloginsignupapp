@extends('layout')
@section('title', 'Registration')
@section('content')
<div class="container">
  <div class="mt-5">
    @if($errors->any())
    <div class="col-12">
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

    <form action="{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-5" style="width: 500px">
      @csrf  
      <div class="mb-3">
          <label class="form-label"> Username</label>
          <input type="text" class="form-control" name='name'>
        </div>
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control" name= 'email'>
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection