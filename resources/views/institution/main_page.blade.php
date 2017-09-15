{{$video_no = 1 }}
@extends('layouts.master')
@section('title')
    {{$institution->name}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/frontend/course.css')}}" >

@endsection
@section('scripts')
    <script src="{{asset('js/frontend/course.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/frontend/messages.js')}}" type="text/javascript"></script>
@endsection
@section('content')

    <!--body-->
    <div class="commondiv top_gap gray">
        <div class="container">
            <div class="row">
                <div class="commondiv">

                    <!--left-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 left_section">
                        <div class="commondiv">
                            <div class="commondiv panel with-nav-tabs panel-default custom_tabs custompane">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-body custom_panel">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1default">
                                            <div class="commondiv logopart">
                                                <div class="commondiv unilogo text-center"><img src="{{$institution->file->path}}" alt="{{$institution ? $institution->name : 'institution logo'}}"></div>
                                                <h5>{{$institution->name}}</h5>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>contact details</h6>
                                                <p class="bold"><span>Address</span> <span class="des_pro">{{$institution ? $institution->address : ''}}</span></p>
                                                <p class="bold"><span>Email</span> <span class="des_pro">{{$institution ? $institution->email : ''}}</span></p>
                                                <p class="bold"><span>Phone No</span> <span class="des_pro">{{$institution ? $institution->phone : ''}}</span></p>
                                                <p class="bold"><span>website</span> <span class="des_pro">{{$institution ? $institution->website : ''}}</span></p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>Courses Avalable Here</h6>
                                                @foreach($institution->courses as $course)
                                                    <p class="bold"><span>{{$course ? $course->name : ''}}</span> <span class="des_pro">{{$course ? $course->duration : ''}}</span></p>
                                                @endforeach
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>Affiliation</h6>
                                                <p class="bold"><span class="des_pro">{{$institution ? $institution->affiliation : ''}}</span></p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>Accreditation</h6>
                                                <p class="bold"><span class="des_pro">{{$institution ? $institution->accreditation : ''}}</span></p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>year of establishments </h6>
                                                <p class="bold"><span>University Establishment year</span> <span class="des_pro">{{$institution ? $institution->year_of_establishment : ''}}</span></p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>number of students</h6>
                                                <p class="bold"><span>Total Number of Students</span> <span class="des_pro">{{$institution ? $institution->number_of_students : ''}}</span></p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>public university</h6>
                                                <p class="bold"><span class="des_pro">{{$institution ? $institution->public : ''}}</span></p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>scholarships</h6>
                                                <p class="bold"><span class="des_pro">{{$institution ? $institution->scholarship : ''}}</span></p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>basic eligibility</h6>
                                                <p class="bold"><span>Education</span> <span class="des_pro">{{$institution ? $institution->basicEligibility->education : ''}}</span></p>
                                                <p class="bold"><span>Marks</span> <span class="des_pro">{{$institution ? $institution->basicEligibility->mark : ''}}</span></p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>country</h6>
                                                <p class="bold text-uppercase">{{$institution ? $institution->country : ''}}</p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>Profile</h6>
                                                <p class="bold">{{$institution ? $institution->profile : ''}}</p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>photos and videos</h6>
                                                <div class="commondiv panel with-nav-tabs panel-default custom_tabs custompane">
                                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 panel-heading nobor">
                                                        <ul class="nav nav-tabs nobor ">
                                                            <li class="active"><a href="#tab8default" data-toggle="tab">Photos</a></li>
                                                            <li><a href="#tab9default" data-toggle="tab">Videos</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="ol-xs-12 col-sm-9 col-md-9 col-lg-9 panel-body custom_panel">
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active" id="tab8default">
                                                                @if(count($photos)>0)
                                                                    @foreach($photos  as $photo)
                                                                        <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 image_photo">
                                                                            <a href="#" class="open_image">
                                                                                <img id="myImg" src="{{$photo->file->path}}" alt="Institution image" width="300" height="200"></a>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <h3 class="text-center">There is not any photo now</h3>
                                                                @endif


                                                            </div>
                                                            <div class="tab-pane fade" id="tab9default">

                                                                @if(count($videos)>0)
                                                                    @foreach($videos  as $video)
                                                                        <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 image_photo">
                                                                            <a class="venobox" data-autoplay="true" data-vbtype="iframe" href="{{asset($video->file->path)}}">Youtube</a>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <h4 class="text-center">There is not any video now</h4>
                                                                @endif





                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>brochure</h6>
                                                @foreach($institution->brochures as $brochure)
                                                    <p class="bold"><a target="_blank" href="{{$brochure? $brochure->url : ''}}">{{$brochure ? $brochure->name : ''}}</a></p>
                                                @endforeach
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>accommodation details</h6>
                                                <p class="bold">{{$institution ? $institution->accommodation : '' }}</p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts ">
                                                <div class="commondiv blockform contact_form nopadd nomar nobor">
                                                    <form method="post" id="message_form">
                                                        <h6>GET IN TOUCH</h6>
                                                        <table class="commondiv small_bol">
                                                            <tbody>
                                                            <tr>
                                                                <td width="50%"><input name="name" type="text" placeholder="Enter Your Name"></td>
                                                                <td width="50%"><input name="email" type="email" placeholder="Enter Email"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input name="phone" type="text" placeholder="Enter Phone No"></td>
                                                                <td><input name="subject" type="text" placeholder="Enter Subject"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><textarea name="content" cols="" rows="" placeholder="Enter Message"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><div class="commondiv small_pad small_mar"><a href="#" class="btn message_btn">Send Now</a></div></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <input type="hidden" name="" value="{{$institution->id}}">
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--left-->

                </div>
            </div>
        </div>
    </div>
    <!--body-->


    <!--Image popup-->
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- The Close Button -->
        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">
        <!-- Modal Caption (Image Text) -->
        <div id="caption" ></div>
    </div>

@endsection