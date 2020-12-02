@extends('layouts.control')
@section('title','Classification')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-6.5">
                        <div class="card">
                            <div class="card-header">{{ __('Classifications') }}</div>

                            <div class="card-body" style="text-align: center">
                                <table class="table table-striped" style="width: 100px">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">USER</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">EDIT</th>
                                        <th scope="col">DELETE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($classification as $class)
                                        <tr>
                                            <th>{{$class->id}}</th>
                                            <td><b>{{$class->name}}</b></td>
                                            <th>{{$class->user->name}}</th>
                                            <th>{{$class->user->email}}</th>
                                            <th><a href="{{route('class.edit',['classification'=>$class])}}"
                                                   class="btn btn-outline-secondary">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                         class="bi bi-pen-fill"
                                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                                    </svg>
                                                </a></th>

                                            <th>
                                                <form action="{{route('class.destroy',['classification'=>$class])}}"
                                                      method="post">
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
                    </div>
                </div>
            </div>
        </div>


@endsection
