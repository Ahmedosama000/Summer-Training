@extends('layouts.user')

@section('title','Students')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(session()->has('msg'))
                <div class="alert alert-success">
                    {{ session()->get('msg') }}
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$student['id']}}</td>
                            <td>{{$student['name']}}</td>
                            <td>{{$student['email']}}</td>
                            <td>{{$student['status']==0?'Active':'Not active'}}</td>
                            <td>
                                <a href="{{route('edit',$student['id'])}}" class="btn btn-info mx-1">Edit</a>
                                <form class="d-inline" action="{{route('delete',$student['id'])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center p-4">
                {{$students->links()}}
            </div>
            @if(!$students->hasMorePages())
            <div class="alert alert-info text-center h3">Finish</div>
            @endif
        </div>
    </div>
</div>

@endsection