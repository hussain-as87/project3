@extends('layouts.app')
@section('title','Registered')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color: olive"><b>{{ __('Registered') }}</b></div>

                    <div class="card-body">
                        <form action="{{route('reg.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control"
                                       aria-describedby="nameHelp" name="name" value="{{old('name')}}">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            @csrf
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control"
                                       aria-describedby="CityHelp" name="city" value="{{old('city')}}">
                                @error('city')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control"
                                       aria-describedby="PhoneHelp" name="phone" value="{{old('phone')}}">
                                @error('phone')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="course_id">Course</label>
                                <select name="course_id" class="form-control">
                                    @foreach ($courses as $course)
                                        <option
                                            value="{{ $course->id }}" {{ $course->id == $registered->course_id ? 'selected' : '' }}>{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <textarea class="form-control" rows="4"
                                          name="notes">{{old('notes')}}</textarea>
                                @error('notes')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-dark">Submit</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
