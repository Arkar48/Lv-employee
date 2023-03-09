@extends('layouts/app-master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Employee</strong>Details</h1>

        <div class="row">
            <div class="col-md-2 my-4">
                <a href="{{route('employee.index')}}" class="btn btn-sm btn-primary float-left">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="text-align:left;">
                <p>Employee name : {{$employee->name}}</p>
                <p>Email : {{$employee->email}}</p>
                <p>Role : {{$employee->role}}</p>
                @foreach ($branch as $value)
                    @if ($value->id == $employee->branch_id)
                        <p>Branch : {{$value->branch_name}}</p>
                    @endif
                @endforeach
            </div>
            <div class="col-md-4"></div>
        </div>



    </div>
</main>
@endsection