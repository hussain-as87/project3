@extends('layouts.app')
@section('title','Home')
@section('content')
    <div class="container">

        <section class="news-group">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 columns_title">
                            <h2 style="color: olive"><strong>Computer Since </strong></h2>

                        </div>
                        <div class="row">
                            @foreach($courses1 as $course)
                                <div class="col-md-5 col-sm-5 col-xs-5 news_block d-inline-block"
                                     style="width: 50%;height: 50%">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ asset('storage/' . $course->image) }}"
                                             alt="Card image cap" height="150px" width="100px">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$course->name}}</h5>
                                            <p class="card-text">{{$course->summary}}.</p>
                                            <a href="{{$course->path_show()}}" class="btn btn-primary">Read more</a>
                                        </div>
                                    </div>
                                </div>



                            @endforeach
                        </div>


                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="right-side">

                            <div class="col-md-12 col-sm-12 col-xs-12 columns_title">
                                <h2 style="color: olive"><strong>Languages</strong></h2>

                            </div>
                            <div class="card">
                                @foreach($courses2 as $course)

                                    <div class="col-md-12 event_pad">

                                        <div class="col-md-12 event_heading">
                                            <a href="{{$course->path_show()}}">
                                                <h4>{{$course->name}}</h4>
                                            </a>
                                        </div>
                                    </div>


                                @endforeach
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 columns_title">
                                <h2 style="color: olive"><strong>Trade</strong></h2>

                            </div>
                            <div class="card">
                                @foreach($courses3 as $course)

                                    <div class="col-md-12 event_pad">
                                        <div class="col-md-12 event_heading">
                                            <a href="{{$course->path_show()}}">
                                                <h4>{{$course->name}}</h4></a>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


    </div>
@endsection
