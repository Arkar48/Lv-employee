@extends('layouts/app-master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 my-3"><strong>Branch</strong> Information</h1>

        <div class="row">
            @can('isAdmin')
                <div class="col-md-2 ms-auto my-4">
                    <a href="{{route('branch.create')}}" class="btn btn-sm btn-primary float-left">Add New Branch</a>
                </div>
            @elsecan('isManager')
                <div class="col-md-2 ms-auto my-4">
                    <a href="{{route('branch.create')}}" class="btn btn-sm btn-primary float-left">Add New Branch</a>
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
                            @can('isAdmin')
                                <th>Action</th> 
                            @elsecan('isManager')
                                <th>Action</th>
                            @endcan                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $value)
                            <form action="{{route('branch.destroy',$value->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value->branch_name}}</td>
                                    @can('isAdmin')
                                    <td class="">
                                        <a href="{{route('branch.show',$value->id)}}" class="btn btn-sm btn-success">View</a>
                                        <a href="{{route('branch.edit',$value->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    </td>
                                    @elsecan('isManager')
                                    <td class="">
                                        <a href="{{route('branch.show',$value->id)}}" class="btn btn-sm btn-success">View</a>
                                        <a href="{{route('branch.edit',$value->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
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
