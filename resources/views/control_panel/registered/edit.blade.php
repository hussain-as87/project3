@extends('layouts.control')
@section('title','Registered')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color: olive"><b>{{ __('Edit Registered') }}</b></div>
                    <div class="card-body">

                        <form action="{{route('reg.update',['registered'=>$registered])}}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control"
                                       aria-describedby="nameHelp" name="name"
                                       value="{{old('name') ?? $registered->name}}">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            @csrf
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control"
                                       aria-describedby="CityHelp" name="city"
                                       value="{{old('city')??$registered->city}}">
                                @error('city')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control"
                                       aria-describedby="PhoneHelp" name="phone"
                                       value="{{old('phone')??$registered->phone}}">
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
                                          name="notes">{{old('notes')?? $registered->notes}}</textarea>
                                @error('notes')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-outline-success">
                                <svg width="60px" height="30px" viewBox="0 0 16 16" class="bi bi-check-circle-fill"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                            </button>
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
