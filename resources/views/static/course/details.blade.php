@extends('layouts.app')
@section('title','Details')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">About :<b>{{$course->name}}</b></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="alert-header"><strong>Name:</strong>
                                    <p style="color: olive">{{ $course->name }}</p></h1>
                                <p><strong>Couch:</strong> {{ $course->couch_name }}</p>
                                <p><strong>Details:</strong> {{ $course->details }}</p>
                            </div>
                        </div>

                        @if($course->image)
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('storage/' . $course->image) }}" alt="" class="img-thumbnail">
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
