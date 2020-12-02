@extends('layouts.control')
@section('title','Course')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9.5">
                <div class="card">
                    <table class="table table-striped" style="width: 100px">
                        <thead>
                        <tr>
                            <th scope="col">course</th>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">COUCH_NAME</th>
                            <th scope="col">SUMMARY</th>
                            <th scope="col">DETAILS</th>
                            <th scope="col">ACTIVE</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <th><a href="{{$course->path_show()}}"><img
                                            src="{{ asset('storage/' . $course->image) }}" alt=""
                                            style="width: 100px;height: 100px"></a></th>
                                <th scope="row">{{$course->id}}</th>
                                <td>{{$course->name}}</td>
                                <td>{{$course->couch_name}}</td>
                                <td>
                                    <div class="d3 row-cols-md-5">{{$course->summary}}</div>
                                </td>
                                <td>
                                    <div class="d3 row-cols-md-5">{{$course->details}}</div>
                                </td>
                                <td>{{$course->active}}</td>
                                <th><a href="{{route('course.edit',['course'=>$course])}}"
                                       class="btn btn-outline-secondary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen-fill"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                        </svg>
                                    </a></th>

                                <th>
                                    <form action="{{route('course.destroy',['course'=>$course])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                 class="bi bi-trash-fill"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


@endsection
