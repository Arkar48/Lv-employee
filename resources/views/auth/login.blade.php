@extends('layouts.auth-master')


@section('content')
<h1>Login User</h1>
<form action="{{route('login.loginUser')}}" method="post">
    @csrf
    <div class="form-group">
        <input type="name" name="name" id="" class="form-control mt-3" placeholder="Name" required>
        @if ($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control mt-3" id="" placeholder="Password" required>
        @if ($errors->has('password'))
            <span class="text-danger">{{$errors->first('password')}}</span>
        @endif
    </div>
    <button type="submit" class="w-100 btn btn-primary mt-3" >Login</button>
</form>
@endsection