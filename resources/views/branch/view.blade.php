@extends('layouts/app-master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Branch</strong>details</h1>

        <div class="row">
            <div class="col-md-2 my-4">
                <a href="{{route('branch.index')}}" class="btn btn-sm btn-primary float-left">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <p>Branch name : {{$branches->branch_name}}</p>
            </div>
            <div class="col-md-4"></div>
        </div>



    </div>
</main>
@endsection