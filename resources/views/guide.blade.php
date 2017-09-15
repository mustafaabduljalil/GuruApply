@extends('layouts.master')
@section('title')
    Course Student Guide
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection

@section('content')
    <div class="commondiv top_gap gray">
        <div class="container">
            <div class="row">
                <div class="commondiv">

                    <!--left-->
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 left_section">
                        <div class="commondiv">
                            <h2>Student Guides</h2>
                            @foreach($guides as $guide)

                                <div class="commondiv common_slide">
                                    <div class="commondiv st_img"><img src="{{asset($guide->file->path)}}" alt="guide image"></div>
                                    <h3>{{$guide->title}}</h3>
                                    <p>{{$guide->description}}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="commondiv clear_height"></div>
                        <div class="common_slide commondiv text-center">
                            <h2>Download this guide to read it offline</h2>
                            <a href="download_student_guide/" class="btn">Download Now</a> </div>
                    </div>
                    <!--left-->

                    <!--right-->
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">
                        <div class="commondiv sidebar">
                            <div class="commondiv side_header">
                                <h4>Popular Guides & Articles</h4>
                            </div>
                            <div class="commondiv side_cont course_long">
                                <ul>
                                    @foreach($popular_guides as $popular)
                                        <li><a href="/get_student_guide/{{$popular->id}}">{{$popular->title}}</a>
                                            <p class="fade_normal">799 comments | 1000 views</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="commondiv sidebar">
                            <div class="commondiv side_header">
                                <h4>Related Guides & Articles</h4>
                            </div>
                            <div class="commondiv side_cont course_long">
                                <ul>
                                    @foreach($related_guides as $related)
                                        <li><a href="/get_student_guide/{{$related->id}}">{{$related->title}}</a>
                                                <p class="fade_normal">799 comments | 1000 views</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--right-->

                </div>
            </div>
        </div>
    </div>
@endsection



