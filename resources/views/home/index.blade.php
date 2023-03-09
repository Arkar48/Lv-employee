@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Dashboard</h1>
            <p>Only authenticated users can access this section</p>

            @can('isAdmin')
                <p>Admin Access</p>
            @elsecan('isManager')
                <p>Manager Access</p>
            @elsecan('isBranchManager')
                <p>Branch Manager Access</p>
            @else
                <p>Employee Access</p>
            <div style="text-align: left;">
                <p>Name : {{auth()->user()->name}}</p>
                <p>Email : {{auth()->user()->email}}</p>
                @foreach ($branches as $value)
                    @if ($value->id == auth()->user()->branch_id)
                        <p>Branch : {{$value->branch_name}}</p>
                    @endif
                @endforeach
                <p>Role : {{auth()->user()->role}}</p>
            </div>
            @endcan
        @endauth
        @guest
            <h2>Home page</h2>
            <p>You are in home page</p>
        @endguest
    </div>
@endsection