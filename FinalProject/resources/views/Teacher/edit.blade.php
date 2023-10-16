@extends('layouts.user')

@section('title','Create new student')

@section('content')

<section class="vh-100 gradient-custom ">
    <div class="container py-3 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">

                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Update Student Info</h3>

                        <form action="{{route('update',$data['id'])}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Name</label>
                                        <input type="text" name="name" id="firstName"
                                            class="form-control form-control-lg" value="{{$data['name']}}" />
                                        @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-outline">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control form-control-lg" value="{{$data['email']}}" />
                                            @error('email')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-1">
                                            <select name="status" class="select form-control-lg">
                                                <option value="" disabled>Choose option</option>
                                                <option value="0" {{$data['status']==0?'selected':''}}>Active</option>
                                                <option value="1"{{$data['status']==1?'selected':''}}>Not Active</option>
                                            </select>
                                            @error('status')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="mt-4 pt-2">
                                        <input class="btn btn-primary btn-lg" type="submit" value="Edit" />
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection