@extends('dashboard.layout.auth')
@section('content')

<div class="card-body">
    <form role="form" class="text-start" action="{{ route('login_request') }}" method="POST"> 
        @csrf
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
      </div>
      <div class="input-group input-group-outline mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
      </div>
      
      <div class="text-center">
        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
      </div>
      
    </form>
  </div>


@endsection
