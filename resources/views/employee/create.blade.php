@extends('layouts/app-master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Employee</strong>Create</h1>

        <div class="row">
            <div class="col-md-2 my-4">
                <a href="{{route('employee.index')}}" class="btn btn-sm btn-primary float-left">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="{{route('employee.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="div">
                                <label for="floatinginput" class="form-label">Name</label>
                                <input type="text" name="name" id="" class="form-control" placeholder="Name">
                            </div>
                            <div class="div">
                                <label for="floatinginput" class="form-label">Email</label>
                                <input type="text" name="email" id="" class="form-control" placeholder="Email">
                            </div>
                            @can('isAdmin')
                                <div>
                                    <label for="" class="form-label">Branch</label>
                                    <select name="branch_id" id="" class="form-select">
                                        @foreach ($branches as $value)
                                            <option value="{{$value->id}}">{{$value->branch_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @elsecan('isManager')
                                <div>
                                    <label for="" class="form-label">Branch</label>
                                    <select name="branch_id" id="" class="form-select">
                                        @foreach ($branches as $value)
                                            <option value="{{$value->id}}">{{$value->branch_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @elsecan('isBranchManager')
                                <div>
                                    <input type="hidden" name="branch_id" value="{{Auth::user()->branch_id}}"">
                                </div>
                            @endcan
                            

                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <button class="btn btn-sm btn-success" type="submit">Add</button>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                </form>
            </div>
        </div>



    </div>
</main>
@endsection