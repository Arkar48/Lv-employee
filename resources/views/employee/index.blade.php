@extends('layouts/app-master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 my-3"><strong>Employee</strong> Information</h1>

        <div class="row">
            @can('isAdmin')
                <div class="col-md-2 ms-auto my-4">
                    <a href="{{route('employee.create')}}" class="btn btn-sm btn-primary float-left">Add New Employee</a>
                </div>
            @elsecan('isManager')
                <div class="col-md-2 ms-auto my-4">
                    <a href="{{route('employee.create')}}" class="btn btn-sm btn-primary float-left">Add New Employee</a>
                </div>
            @elsecan('isBranchManager')
                <div class="col-md-2 ms-auto my-4">
                    <a href="{{route('employee.create')}}" class="btn btn-sm btn-primary float-left">Add New Employee</a>
                </div>
            @endcan
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Branch Name</th>
                            <th>Action</th>                     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $value)
                            <form action="{{route('employee.destroy',$value->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value->name}}</td>
                                    @foreach ($branches as $i)
                                        @if ($value->branch_id == $i->id)
                                            <td>{{$i->branch_name}}</td>
                                        @endif
                                    @endforeach
                                    @can('isAdmin')
                                    <td class="">
                                        <a href="{{route('employee.show',$value->id)}}" class="btn btn-sm btn-success">View</a>
                                        <a href="{{route('employee.edit',$value->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    </td>
                                    @elsecan('isManager')
                                    <td class="">
                                        <a href="{{route('employee.show',$value->id)}}" class="btn btn-sm btn-success">View</a>
                                        <a href="{{route('employee.edit',$value->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                    </td>
                                    @elsecan('isBranchManager')
                                    <td class="">
                                        <a href="{{route('employee.show',$value->id)}}" class="btn btn-sm btn-success">View</a>
                                        <a href="{{route('employee.edit',$value->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                    </td>
                                    @endcan
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </div>
</main>
@endsection
