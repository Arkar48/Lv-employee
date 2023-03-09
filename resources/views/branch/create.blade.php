@extends('layouts/app-master')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Branch</strong>Create</h1>

        <div class="row">
            <div class="col-md-2 my-4">
                <a href="{{route('branch.index')}}" class="btn btn-sm btn-primary float-left">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="{{route('branch.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                                <label for="floatinginput" class="form-label">Name</label>
                                <input type="text" name="name" id="" class="form-control" placeholder="Branch Name">
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