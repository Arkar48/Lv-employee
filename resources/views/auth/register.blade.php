@extends('layouts.auth-master')


@section('content')
    <h1>Register</h1>
    <form action="{{route('register.registeration')}}" method="post">
        @csrf
        <div class="form-group">
            <input type="email" name="email" id="" class="form-control mt-3" placeholder="example@gmail.com" required>
            @if ($errors->has('email'))
                <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
        </div>
        <div class="form-group">
            <input type="text" name="name" id="" class="form-control mt-3" placeholder="Username" required>
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
        <div class="form-group">
            <input type="password" name="confirmpassword" class="form-control mt-3" id="" placeholder="Comfirm Password" required>
            @if ($errors->has('confirmpassword'))
                <span class="text-danger">{{$errors->first('confirmpassword')}}</span>
            @endif
        </div>
        <button type="submit" class="w-100 btn btn-primary mt-3" >Register</button>
    </form>
@endsection