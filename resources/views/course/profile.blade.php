<?php $fees_amount = 0 ;$video_no = 1;?>
@extends('layouts.master')
@section('title')
    {{$course->name}}
    @endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/frontend/course.css')}}" >

@endsection

@section('scripts')
    <script src="{{asset('js/frontend/course.js')}}" type="text/javascript"></script>

@endsection

@section('content')
    <!--body-->
    <div class="commondiv top_gap gray">
        <div class="container">
            <div class="row">
                <div class="commondiv">
                    <div class="commondiv bread_new">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Study in {{$course ? $course->institution->country : ''}}</a></li>
                            <li><a href="/{{$course->institution->id}}">Universities in {{$course ? $course->institution->country : ''}}</a></li>
                            <li>{{$course ? $course->name : ''}}</li>
                        </ul>
                    </div>
                    <!--left-->
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 left_section">
                        <div class="commondiv">
                            <h2>{{$course->name}}</h2>
                            <div class="commondiv panel with-nav-tabs panel-default custom_tabs custompane">
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 panel-heading nobor">
                                    <ul class="nav nav-tabs nobor ">
                                        <li class="active"><a href="#tab1default" data-toggle="tab">Overview</a></li>
                                        <li><a href="#tab2default" data-toggle="tab">Fees & expenses</a></li>
                                        <li><a href="#tab3default" data-toggle="tab">Entry requirements</a></li>
                                        <li><a href="#tab4default" data-toggle="tab">Application process</a></li>
                                        <li><a href="#tab5default" data-toggle="tab">Placement</a></li>
                                        <li><a href="#tab6default" data-toggle="tab">scholarships</a></li>
                                        <li><a href="#tab7default" data-toggle="tab">Student Guides</a></li>
                                    </ul>
                                </div>
                                <div class="ol-xs-12 col-sm-9 col-md-9 col-lg-9 panel-body custom_panel">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1default">
                                            <div class="commondiv small_pad">
                                                <h5>About this course</h5>
                                                <p><span>Duration: </span>{{$course ? $course->duration : ''}}</p>
                                                <p><span>Level: </span>{{$course ? $course->level : ''}}</p>
                                            </div>
                                            <div class="commondiv small_pad">
                                                <h5>Course Description</h5>
                                                <p>{{$course ? $course->description : ''}}</p>
                                            </div>
                                            <div class="commondiv small_pad">
                                                <h5>University offering this course</h5>
                                                <p><a href="#">{{$course ? $course->institution->name : ''}} University</a><br>
                                                    @if($course->institution->public == "Yes" )
                                                        Public University, Estd in {{$course ? $course->institution->year_of_establishment : ''}}<br>
                                                    @else
                                                        Private University, Estd in {{$course ? $course->institution->year_of_establishment : ''}}<br>
                                                    @endif
                                                    {{$course ? $course->institution->address : ''}}</p>
                                            </div>
                                            @if(count($course->fees)>0)
                                                <div class="commondiv gray grayarea">
                                                    @foreach($course->fees  as  $fees)
                                                        @if($fees->type == "first")
                                                            <h5>1st year {{$fees->fees}}</h5>
                                                            <p>Rs {{$fees->fees_amount_indian}} Lacs</p>
                                                        @endif
                                                    @endforeach
                                                    <a href="#tab2default" data-toggle="tab" class="bl_but">View breakup</a>
                                                </div>
                                            @endif
                                            <div class="commondiv gray grayarea">
                                                <h5>Interested in this course?</h5>
                                                <a href="#tab2default" data-toggle="tab" class="bl_but">View breakup</a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2default">
                                            @if(count($course->fees)>0)
                                                <div class="commondiv small_pad">
                                                    <h5>1st year tuition fees</h5>
                                                    <table class="table_price commondiv">
                                                        <tr>
                                                            <th>Fees components	Amount in</th>
                                                            <th>US Dollar (USD)	Amount in</th>
                                                            <th>Indian Rupees (Rs.)</th>
                                                        </tr>
                                                        @foreach($course->fees  as  $fees)
                                                            @if($fees->type == "first")
                                                                <tr>
                                                                    <td>{{$fees->fees}}</td>
                                                                    <td>{{$fees->fees_amount_dollar}}</td>
                                                                    <td>{{$fees->fees_amount_indian}}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </table>
                                                </div>
                                                <div class="commondiv small_pad">
                                                    <h5>Other expenses in 1st year</h5>
                                                    <table class="table_price commondiv">
                                                        <tr>
                                                            <th>Fees components	Amount in</th>
                                                            <th>US Dollar (USD)	Amount in</th>
                                                            <th>Indian Rupees (Rs.)</th>
                                                        </tr>
                                                        @foreach($course->fees  as  $fees)
                                                            @if($fees->type == "other")
                                                                <tr>
                                                                    <td>{{$fees->fees}}</td>
                                                                    <td>{{$fees->fees_amount_dollar}}</td>
                                                                    <td>{{$fees->fees_amount_indian}}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </table>
                                                </div>
                                            @endif
                                            <div class="commondiv small_pad">
                                                <p>Calculated at the exchange rate of 1 USD = Rs 67.5</p>
                                                <p><a href="#tab2default" data-toggle="tab">Tuition & expenses were last updated on 21st August 2015</a></p>
                                                <p><a href="#">Report incorrect information</a></p>
                                            </div>
                                            @if(count($course->fees)>0)
                                                <div class="commondiv gray grayarea">
                                                    @foreach($course->fees  as  $fees)
                                                        @if($fees->type == "first")
                                                            <h5>Tuition</h5>
                                                            <p>Rs {{$fees->fees_amount_indian}} Lacs</p>
                                                        @endif
                                                    @endforeach
                                                        <h5>Other</h5>
                                                        <p>Rs {{$total_other_fees}} Lacs</p>
                                                        <h5>1st year total fees</h5>
                                                        <p>{{$total_fees}} Lacs </p>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="tab-pane fade" id="tab3default">
                                            <div class="commondiv small_pad">
                                                <h5>Entry requirements for this course</h5>
                                                <h6>Class 12th: No specific cutoff mentioned</h6>
                                                <h6>Bachelors: No specific cutoff mentioned</h6>
                                            </div>
                                            @if(count($course->requirements)>0)
                                                @foreach($course->requirements as $requirement)
                                                    <div class="commondiv small_pad">
                                                        <p><span><a href="#"  class="gmat">GMAT</a></span>{{$requirement->description}}</p>
                                                    </div>
                                                @endforeach

                                                <div class="commondiv small_pad">
                                                    <p><a href="#">Which out of the above do I need to give?</a></p>
                                                    <p><a href="#">Report incorrect information</a></p>
                                                </div>
                                                <div class="commondiv gray grayarea sidelink">
                                                    <h5>Learn more about exams</h5>
                                                    <p><a href="#">GMAT</a></p>
                                                    <p><a href="#">GRE </a></p>
                                                    <p><a href="#">IELTS </a></p>
                                                    <p><a href="#">TOEFL</a></p>
                                                </div>
                                                <div class="commondiv gray grayarea">
                                                    <h5>Interested in this course?</h5>
                                                    <a href="#" class="bl_but">View breakup</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="tab4default">
                                            @if(count($course->steps) > 0)
                                                @foreach($course->steps as$step)
                                                    <div class="commondiv gray grayarea">
                                                        <h5>Step {{$step->step_number}}</h5>
                                                        <h6>{{$step->title}}</h6>
                                                        <p>{{$step->description}}</p>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="commondiv clear_height"></div>
                                            <div class="commondiv gray grayarea sidelink">
                                                <h5>Learn about application process</h5>
                                                <p><a href="#">SOP</a><br>
                                                    Statement of purpose</p>
                                                <p><a href="#">SOP</a><br>
                                                    Statement of purpose</p>
                                                <p><a href="#">SOP</a><br>
                                                    Statement of purpose</p>
                                                <p><a href="#">SOP</a><br>
                                                    Statement of purpose</p>
                                                <p><a href="#">SOP</a><br>
                                                    Statement of purpose</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab5default">
                                            @if(count($course->placement) > 0)

                                                <div class="commondiv small_pad">
                                                    <h5>Placement Information</h5>
                                                    <h6>Popular sectors</h6>
                                                    @if($course->placement[0]->sector)
                                                        @foreach($course->placement as $sector)
                                                            <p>
                                                                {{$sector->sector}}
                                                            </p>
                                                        @endforeach
                                                    @else
                                                        <p class="text-center">Sectors are not available now</p>
                                                    @endif
                                                </div>
                                                <div class="commondiv small_pad">
                                                    <h6>Internships</h6>
                                                    @if($course->placement[0]->internship)
                                                        @foreach($course->placement as $internship)
                                                            <p>
                                                                {{$internship->internship}}
                                                            </p>
                                                        @endforeach
                                                    @else
                                                        <p class="text-center">Internships are not available now</p>
                                                    @endif                                                </div>
                                                <div class="commondiv small_pad">
                                                    <h5>Placement Services</h5>
                                                    <p><a href="#">More about placement on university website </a></p>
                                                </div>
                                                <div class="commondiv gray grayarea">
                                                    <h5>Interested in this course?</h5>
                                                    <a href="#" class="bl_but">View breakup</a> </div>
                                             @endif
                                        </div>
                                        <div class="tab-pane fade" id="tab6default">
                                            <div class="commondiv small_pad">
                                                <h5>Student scholarships for this course</h5>
                                                @if(count($course->sholarships)>0)
                                                    <h6>More details on the following links:</h6>
                                                    @foreach($course->sholarships as $scholarship)
                                                        <p><a href="{{$scholarship->url}}" target="_blank">{{$scholarship->description}}</a></p>
                                                    @endforeach
                                                @else
                                                    <p class="text-center">Scholarships are not available now</p>
                                                @endif
                                            </div>
                                            <div class="commondiv gray grayarea">
                                                <h5>Interested in this course?</h5>
                                                <a href="#" class="bl_but">View breakup</a> </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab7default">
                                            <div class="commondiv small_pad">
                                                <h5>Student guides available for free download</h5>
                                            </div>
                                            @if(count($course->studentGuide)>0)
                                                @foreach($course->studentGuide as $guide)
                                                    <div class="commondiv small_pad gray grayarea">
                                                        <div class="img_rightpan"><img src="{{asset($guide->file->path)}}" alt=""> </div>
                                                        <div class="img_left_pane">
                                                            <h5><a href="#">{{$guide->title}}</a></h5>
                                                            <p>{{$guide->description}}</p>
                                                            <a href="/get_student_guides/{{$course->id}}" class="bl_but">Read More</a> </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-center">Student Guides are not available now</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="commondiv small_pad">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 but1"><a href="#download_brochure" class="green_but1"><img src="{{asset('images/folding-map.png')}}" alt="">Download Brochure</a></div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 but1"><a href="#" class="dark_but1"><img src="{{asset('images/list.png')}}" alt="">Shortlist this Course</a></div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 but1"><a href="#" class="green_but1"><img src="{{asset('images/icon.png')}}" alt="">Compare this course</a></div>
                        </div>
                        <div class=" commondiv clear_height"></div>
                        <div class="commondiv">
                            <h2>Photos & Videos</h2>
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
                                            @if(count($course->institution->multimedia)>0)
                                                @foreach($course->institution->multimedia  as $photo)
                                                    @if($photo->type == "photo")
                                                        <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 image_photo">
                                                            <a href="#" data-toggle="modal" data-target="#image-modal" class="open_image">
                                                                <img id="myImg" src="{{asset($photo->file->path)}}" alt="Trolltunga, Norway" width="300" height="200"></a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                <h3 class="text-center">There is not any photo now</h3>
                                            @endif
                                        </div>
                                        <div class="tab-pane fade in" id="tab9default">
                                            @if(count($course->institution->multimedia)>0)
                                                @foreach($course->institution->multimedia  as $video)
                                                    @if($video->type == "video")
                                                        <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4">
                                                                <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{asset($video->file->path)}}">Video {{$video_no++}}</a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                <h3 class="text-center">There is not any photo now</h3>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" commondiv clear_height"></div>
                        <div class="commondiv" id="download_brochure">
                            <form id="about_user_form" method="post" action="/download_brochure">

                                <h2>Download brochure for this course</h2>
                                <div class="commondiv formbrochure">
                                    <h5>Tell us about yourself</h5>
                                    <div class="commondiv blockform">
                                        <h6>A. Study Preferences</h6>
                                        <table class="commondiv small_bol">
                                            <tr>
                                                <td width="50%"><p>Have you given any study abroad exam?</p>
                                                    <input name="study_abroad" type="radio" value="yes">
                                                    <label>Yes</label>
                                                    <input name="study_abroad" type="radio" value="no">
                                                    <label>No</label></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><p>Select & enter your exam score</p>
                                                    @if(count($course->institution->exams)>0)
                                                        @foreach($course->institution->exams as $exam)
                                                            <span>
                                                                <input name="exam_checkbox[]" type="checkbox" value="{{$exam->name}}">
                                                                <label>{{$exam->name}}</label>
                                                                <input name="exam_score[]" type="text" class="small_fil">
                                                            </span>
                                                        @endforeach
                                                    @else
                                                        <p>There is not exams now</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td id="course_country">
                                                    <p>Preferred study destination</p>
                                                    <select name="dest_country" id="country" data-region-id="state" class="form-control crs-country" ></select>
                                                    {{--<select id="state"></select>--}}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="commondiv formbrochure">
                                    <div class="commondiv blockform">
                                        <h6>B. Personal Info</h6>
                                        <table class="commondiv small_bol">
                                            <tr>
                                                <td width="50%"><input name="email" type="email" placeholder="Enter Email"></td>
                                                <td width="50%"><input name="phone" type="text" placeholder="Enter Phone No."></td>
                                            </tr>
                                            <tr>
                                                <td width="50%"><input name="name" type="text" placeholder="Enter Name"></td>
                                                <td width="50%"><input name="title" type="text" placeholder="Enter Title"></td>
                                            </tr>
                                            <tr>
                                                <td width="50%">
                                                    <select name="personal_country" data-region-id="state" class="form-control crs-country" ></select>

                                                </td>
                                                <td width="50%">
                                                    <select id="state" name="personal_city"></select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="commondiv formbrochure">
                                    <div class="commondiv blockform">
                                        <h6>C. Education details</h6>
                                        <table class="commondiv small_bol">
                                            <tr>
                                                <td width="50%">
                                                    <select name="educational_country" data-region-id="educational_state" class="form-control crs-country" ></select>

                                                </td>
                                                <td width="50%">
                                                    <select id="educational_state" name="educational_city"></select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="stream" type="text" placeholder="Select Graduation Stream">
                                                 </td>
                                                <td>
                                                    <input name="marks" type="text" placeholder="Select Graduation Marks">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="experience" type="text" placeholder="Select Work Experience">

                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                    <input type="hidden" name="course_id"  value="{{$course->id}}" />
                                    <div class="commondiv small_pad small_mar">
                                        <button type="submit" class="btn download-brochure">Download Brochure</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!--left-->

                    <!--right-->
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">
                        <div class="commondiv sidebar">
                            <div class="commondiv side_header">
                                <h4>University Info</h4>
                            </div>
                            <div class="commondiv side_cont unidescr course_long text-center ">
                                <div class="commondiv text-center unilogo"> <img src="{{asset($course->institution->file->path)}}" alt="University logo"> </div>
                                <p><img src="{{asset('images/facebook-placeholder-for-locate-places-on-maps.png')}}" width="16" height="16" alt=""> {{$course->institution->address}}</p>
                                <p><img src="{{asset('images/close-envelope.png')}}" width="16" height="16" alt=""> {{$course->institution->email}}</p>
                                <p><img src="{{asset('images/phone-receiver.png')}}" width="16" height="16" alt=""> {{$course->institution->phone}}</p>
                            </div>
                        </div>
                        <div class="commondiv sidebar">
                            <div class="commondiv side_header">
                                <h4>Course</h4>
                            </div>
                            <div class="commondiv side_cont course_long">
                                <ul>
                                    <li><a href="#">MBA</a>
                                        <p>1st year total fees:Rs 57.79 Lakhs
                                            Eligibility: GMAT:Accepted, GRE:Accepted</p>
                                        <a href="#" role="button" data-toggle="modal" data-target="#applyfor" class="bl_but displaybl text-center">Apply for this course</a><br>
                                        <p>You are likely to receive approved for this course</p>
                                        <a href="#" class="dark_but1 dark_but2">Check my approval score</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="commondiv sidebar">
                            <div class="commondiv side_header">
                                <h4>Student scholarships at this
                                    university</h4>
                            </div>
                            <div class="commondiv side_cont course_long">
                                <ul>
                                    <li><a href="#">Department Level on university websiteUniversity Level on university website</a></li>
                                    <li><a href="#">Department Level on university websiteUniversity Level on university website</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="commondiv sidebar">
                            <div class="commondiv side_header">
                                <h4>More information about this
                                    course on university website</h4>
                            </div>
                            <div class="commondiv side_cont course_long">
                                <ul>
                                    <li><a href="#">Alumni Information on university </a></li>
                                    <li><a href="#">website Course FAQs on university website</a></li>
                                    <li><a href="#">Alumni Information on university </a></li>
                                    <li><a href="#">website Course FAQs on university website</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--right-->

                </div>
            </div>
        </div>
    </div>
    <!--body-->


@endsection

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