@extends('layouts.control')
@section('title','Classification')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color: olive"><b>{{ __('Create Classification') }}</b></div>
                    <div class="card-body">
                        <form action="{{route('class.store')}}" method="post">
                            @include('control_panel.classification.form')
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
