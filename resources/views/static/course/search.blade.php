@extends('layouts.app')
@section('title', 'Searching')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color: olive"><b>{{ __('Search Result') }}</b></div>

                    <div class="card-body">
                        @if (isset($details))
                            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                            @foreach ($details as $course)
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="alert-header"><strong>Name:</strong>
                                            <p style="color: olive">{{ $course->name }}</p>
                                        </h1>
                                        <p><strong>Couch:</strong> {{ $course->couch_name }}</p>
                                    </div>

                                    @if ($course->image)
                                        <div class="row">
                                            <div class="col-12 ">
                                                <img src="{{ asset('storage/' . $course->image) }}" alt=""
                                                     class="img-thumbnail">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
