@extends('layouts.app')

@section('title' , 'Home')

@section('content')

<div class="bg-info text-center shadow boreder container w-50 my-5
mx-auto py-5">
    <h2 style="font-weight: bolder">
        Course Title : {{$course->title}}</h2>
    <hr>
    <p> {{$course->desc}}</p>
    <hr>
    <div class="bg-warning p-4 w-50 mx-auto rounded shadow">
        Designed By <strong>
            {{$course->instructor}}</strong> At {{$course->created_at}}
        <br> <strong class="bg-info">Course Price {{$course->price}}</strong>
    </div>
    <a href="{{route('courses')}}" class="mt-4 mb-3 btn btn-dark">Return to all courses</a>
</div>

@endsection