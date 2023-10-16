@extends('layouts.user')

@section('title','Not-active')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$student['id']}}</td>
                            <td>{{$student['name']}}</td>
                            <td>{{$student['email']}}</td>
                            <td>
                                <form action="{{route('activation',$student['id'])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-info mx-1">Active</button>
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
        </div>
    </div>
</div>
@endsection