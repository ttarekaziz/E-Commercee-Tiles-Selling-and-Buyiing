@extends('admin.master')


@section('content')

    <h3>{{$title}}</h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kodeeo">
        Create Category
    </button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($all_data as $key=>$single_data)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$single_data->name}}</td>
            <td>{{$single_data->status}}</td>
            <td>
                <a href="{{route('categoryeditroute', ['id'=>$single_data->id])}}" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-success">View</a>
                <a href="{{route('categorydelete', ['id'=>$single_data->id])}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
@endforeach
        </tbody>
    </table>
{{$all_data->links()}}


    <!-- Modal -->
    <div class="modal fade" id="kodeeo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('categorycreateroute')}}" method="post" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Enter Categroy Name:</label>
                        <input name="category_name" required placeholder="Enter Category Name" class="form-control" id="name" type="text">
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>




                </div>

            </div>
        </div>
    </div>
    @endsection
