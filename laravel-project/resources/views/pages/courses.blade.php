@extends('layouts.app')

@section('title' , 'Home')

@section('content')

<div class="my-5 container bg-dark py-4 rounded w-50 text-center mx-auto">
    <h2 class="text-white"> Courses List </h2>
</div>

<div class="my-5 container">
    @if (count($courses) > 0)
        <div class="row text-center">
            @foreach ($courses as $course)
                <div class="col-lg-4 col-sm-12 my-3">
                    <div class="card py-3 px-3 text-bg-light mb-3" 
                    style="max-width: 22rem;">
                        <div class="card-header">
                            Let's Get Started
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">{{$course->title}}</h5>
                          <p class="card-text">
                            {{$course->desc}}
                          </p>
                          <hr>
                          <div class="bg-warning p-3 rounded shadow">
                            Designed By <strong>
                                {{$course->instructor}}</strong> At {{$course->created_at}}
                                <br> <strong class="bg-info">Course Price {{$course->price}}</strong>
                          </div>
                          <hr>
                          <a href="{{'/courses/' . $course->id }}" class="btn my-2 btn-primary">show</a>
                          <a href="{{'/courses/' . $course->id . '/edit'}}" class="btn my-2 btn-success">edit</a>
                          <form action="{{route('destroy' , ['id' => $course->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">delete</button>
                         </form>
                        </div>
                      </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="d-flex justify-content-center py-2 my-4">
        {{$courses->links()}}
    </div>
</div>

@endsection