{{$video_no = 1 }}
@extends('layouts.master')
@section('title')
    Institution Profile
    @endsection
    @section('styles')
    <link rel="stylesheet" href="{{asset('css/frontend/course.css')}}" >
        @endsection
@section('scripts')
    <script src="{{asset('js/frontend/institution.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/frontend/course.js')}}" type="text/javascript"></script>
@endsection
@section('content')
<div class="container-fluid nopadd">
    <!--body-->
    <div class="commondiv top_gap gray">
        <div class="container">
            <div class="row">
                <div class="commondiv">

                    <!--left-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 left_section">
                        <div class="commondiv">
                            <div class="commondiv userview">
                                <div class="user_image"><img src="{{$general_information ? $general_information->file->path : ''}}" alt=""></div>
                                <div class="usernames">
                                    <h2>{{$general_information ? $general_information->name : ''}}</h2>
                                    <span>Established {{$general_information ? $general_information->year_of_establishment : ''}}</span></div>
                            </div>
                            <div class="commondiv panel with-nav-tabs panel-default custom_tabs custompane">
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 panel-heading nobor">
                                    <ul class="nav nav-tabs nobor ">
                                        <li class="active"><a href="#tab1default" data-toggle="tab">Profile</a></li>
                                        <li class="dropdown"><a href="#" data-toggle="dropdown">Courses</a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#tab2default" data-toggle="tab">Add Course</a></li>
                                                <li><a href="#tab100default" data-toggle="tab">Edit Course</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#" data-toggle="dropdown">Applicant Management</a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#tab25default" data-toggle="tab">Pending Application </a></li>
                                                <li><a href="#tab26default" data-toggle="tab">Approved Application</a></li>
                                                <li><a href="#tab27default" data-toggle="tab">Rejected Application</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#" data-toggle="dropdown">Inbox <span class="pull-right">(20)</span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#tab20default" data-toggle="tab">Applicant Message</a></li>
                                                <li><a href="#tab21default" data-toggle="tab">Public Message</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ol-xs-12 col-sm-9 col-md-9 col-lg-9 panel-body custom_panel">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1default">
                                            <div class="commondiv logopart">
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent');" style="margin-top: 45px"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv unilogo text-center"><img src="{{$general_information ? $general_information->file->path : ''}}" alt=""></div>
                                                <h5>{{$general_information ? $general_information->name : ''}}</h5>
                                                <div class="commondiv hiddenclass blockform border_bot" id="myContent">
                                                    <form method="post" id="logo_form" action="{{route('institution_logo')}}" enctype="multipart/form-data">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>upload logo</p>
                                                            <input name="logo" type="file">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>University Name</p>
                                                            <input name="name" type="text" value="{{$general_information ? $general_information->name : ''}}">
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name="" class="dark_but1 "type="submit" value="Update">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>contact details</h6>
                                                <p class="bold"><span>Address</span> <span class="des_pro">{{$general_information?$general_information->address:''}}</span></p>
                                                <p class="bold"><span>Email</span> <span class="des_pro">{{$general_information?$general_information->email:''}}</span></p>
                                                <p class="bold"><span>Phone No</span> <span class="des_pro">
                                                    {{$general_information?$general_information->phone:''}}

                                                    </span>
                                                </p>
                                                <p class="bold"><span>website</span> <span class="des_pro">{{$general_information?$general_information->website:''}}</span></p>
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent1');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor" id="myContent1">
                                                    <form method="post" id="contact_details_form">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                                            <p>Address</p>
                                                            <textarea name="address" id="address" cols="" rows="">{{$general_information ? $general_information->address : ''}}</textarea>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Email</p>
                                                            <input name="email" id="email" type="email" value="{{$general_information ? $general_information->email : ''}}">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Phone No</p>
                                                            <input name="phone" id="phone" type="text" value="{{$general_information ? $general_information->phone : ''}}">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Website</p>
                                                            <input name="website" id="website" type="text" value="{{$general_information ? $general_information->website : ''}}">
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1 contact_details_btn"type="button" value="Update">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="commondiv small_pad information uniparts">
                                                <h6>Affiliation</h6>
                                                <p class="bold"><span class="des_pro">{{$general_information?$general_information->affiliation:''}}</span></p>
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent2');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor" id="myContent2">
                                                    <form method="post" id="affiliation_form">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                                            <p>Affiliation</p>
                                                            <textarea name="affiliation" cols="" rows="">{{$general_information ? $general_information->affiliation : ''}}</textarea>
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1 affiliation_btn"type="button" value="Update">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>Accreditation</h6>
                                                <p class="bold"><span class="des_pro">{{$general_information?$general_information->accreditation:''}}</span></p>
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent3');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor" id="myContent3">
                                                    <form method="post" id="accreditation_form">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                                            <p>Accreditation</p>
                                                            <textarea name="accreditation" cols="" rows="">{{$general_information ? $general_information->accreditation : ''}}</textarea>
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1 accreditation_btn"type="button" value="Update">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>year of establishments </h6>
                                                <p class="bold"><span>University Establishment year</span> <span class="des_pro">{{$general_information?$general_information->year_of_establishment:''}}</span></p>
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent4');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor" id="myContent4">
                                                    <form method="post" id="year_of_establishment_form">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Enter Year</p>
                                                            <input name="year_of_establishment" type="text" {{$general_information ? $general_information->year_of_establihsment : ''}}>
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1 year_of_establishment_btn"type="button" value="Update">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>number of students</h6>
                                                <p class="bold"><span>Total Number of Students</span> <span class="des_pro">{{$general_information?$general_information->number_of_students:''}}</span></p>
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent5');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor" id="myContent5">
                                                    <form method="post" id="number_of_Students_form">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Enter No</p>
                                                            <input name="number_of_students" type="text" value="{{$general_information ? $general_information->number_of_students : ''}}">
                                                            <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1 number_of_students_btn" type="button" value="Update">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>public university</h6>
                                                <p class="bold"><span class="des_pro">{{$general_information?$general_information->public:''}}</span></p>
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent6');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor" id="myContent6">
                                                    <form method="post" id="university_public">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Select Type</p>
                                                            <input name="public" type="radio" value="Yes">
                                                            <label>Yes</label>
                                                            <br>
                                                            <input name="public" type="radio" value="No">
                                                            <label>No</label>
                                                            <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name="" id="public_btn"  class="dark_but1"type="button" value="Update">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>scholarships</h6>
                                                <p class="bold"><span class="des_pro">{{$general_information?$general_information->scholarship:''}}</span></p>
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent7');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor" id="myContent7">
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                        <form method="post" id="scholarship_form">
                                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                                <p>Select Type</p>
                                                                <input name="scholarship" type="radio" value="Yes">
                                                                <label>Yes</label>
                                                                <br>
                                                                <input name="scholarship" type="radio" value="No">
                                                                <label>No</label>
                                                                <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                                <input name="" id="scholarship_btn"  class="dark_but1"type="button" value="Update">
                                                            </div>
                                                        </form>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>basic eligibility</h6>
                                                        <p class="bold"><span>{{$general_information?$general_information->basicEligibility->education:''}}</span> <span class="des_pro">{{$general_information?$general_information->basicEligibility->mark:''}}</span></p>

                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent8');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor" id="myContent8">
                                                    <form method="post" id="eligibility_form">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Education</p>
                                                            <input name="education" type="text" value="{{$general_information?$general_information->basicEligibility->education:''}}">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Marks</p>
                                                            <input name="mark" type="text" value="{{$general_information?$general_information->basicEligibility->mark:''}}">
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1 eligibility-btn"type="button" value="Update">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>country</h6>
                                                <p class="bold text-uppercase">{{$general_information?$general_information->country:''}}</p>
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent9');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor" id="myContent9">
                                                    <form method="post" id="country_form">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Select</p>
                                                            <select id="country_select" name="country" class="form-control bfh-countries" data-country="US"></select>
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1 country-btn"type="button" value="Update">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts">
                                                <h6>Profile</h6>
                                                <p class="bold">{{$general_information?$general_information->profile:''}}</p>
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent10');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor" id="myContent10">
                                                    <form method="post" id="profile_form">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                                            <p>Enter Profile Details</p>
                                                            <textarea name="profile" cols="" rows="">{{$general_information?$general_information->profile:''}}</textarea>
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1 profile-btn" type="button" value="Update">
                                                        </div>
                                                    </form>
                                                </div>
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
                                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent11');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                                <form id="photo_form" method="post" action="/upload_multimedia" enctype="multipart/form-data">
                                                                    <div class="commondiv hiddenclass blockform nobor nopadd" id="myContent11">
                                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                                            <h5>Upload New Photos</h5>
                                                                            <input name="photo" type="file">
                                                                        </div>
                                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                                            <input name=""  class="dark_but1 photo-btn"type="submit" value="Upload">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <form method="delete" id="remove_multimedia_form">
                                                                    @if(count($photos)>0)
                                                                    @foreach($photos  as $photo)
                                                                        <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 image_photo">
                                                                            <input name="remove_media"  id="myContent11" type="checkbox" class="remove_media ch" value="{{$photo->id}}">
                                                                            <a href="#" data-toggle="modal" data-target="#image-modal" class="open_image">
                                                                                <img id="myImg" src="{{$photo->file->path}}" alt="Trolltunga, Norway" width="300" height="200"></a>
                                                                        </div>
                                                                    @endforeach
                                                                    <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                                        <input name=""  class="dark_but1 remove-media-btn"type="button" value="Remove Image">
                                                                    </div>
                                                                    @else
                                                                        <h3 class="text-center">There is not any photo now</h3>
                                                                    @endif
                                                                </form>

                                                            </div>
                                                            <div class="tab-pane fade" id="tab9default">
                                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent12');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                                <form id="video_form" method="post" action="/upload_multimedia" enctype="multipart/form-data">
                                                                    <div class="commondiv hiddenclass blockform nobor nopadd" id="myContent12">
                                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                                            <h5>Upload New Video</h5>
                                                                            <input name="video" type="file">
                                                                        </div>
                                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

                                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                                            <input name=""  class="dark_but1"type="submit" value="Upload">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                @if(count($videos)>0)
                                                                    @foreach($videos  as $video)
                                                                        <div class="col-xs-12 col-sm-2 col-md-4 col-lg-4 image_photo">
                                                                            <input name="remove_media" type="checkbox" class="ch remove_media" value="{{$video->id}}">
                                                                            <a class="venobox" data-autoplay="true" data-vbtype="iframe" href="{{asset($video->file->path)}}">Video {{$video_no++}}</a>

                                                                        </div>
                                                                    @endforeach
                                                                    <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                                            <input name=""  class="dark_but1 remove-media-btn"type="button" value="Remove Image">
                                                                        </div>
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
                                                @foreach($general_information ? $general_information->brochures : '' as $brochure )
                                                    <p class="bold"><a href="/download_brochure/{{$brochure->id}}">{{$brochure->name}}</a></p>
                                                @endforeach
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent13');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor nopadd" id="myContent13">
                                                    <form method="post" action="{{route('upload_brochure')}}" enctype="multipart/form-data">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <h5>Upload New Brochure</h5>
                                                            <input name="brochure" type="file">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <h5>Brochure Name </h5>
                                                            <input name="name" type="text" value="{{$brochure->name}}">
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        <input type="hidden" name="institution_id" id="csrf-token" value="{{$general_information ? $general_information->id : ''}}" />
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1"type="submit" value="Upload">
                                                        </div>
                                                    </form>
                                                    <form method="post" id="remove_brochure">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            @foreach($general_information ? $general_information->brochures : '' as $brochure )

                                                            <p class="bold">
                                                                <input name="brochures[]" type="checkbox" value="{{$brochure->id}}" class="brochures">
                                                                <a href="{{$brochure->url}}">{{$brochure->name}}</a></p>
                                                            @endforeach
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1 brochure-btn"type="button" value="Remove">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information">
                                                <h6>accommodation details</h6>
                                                <p class="bold">{{$general_information?$general_information->accommodation_details:''}}</p>
                                                <p class="commondiv bold add pull-right edit_butnew"><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent14');"><img src="images/plus.png" width="16" height="16"> Edit</a></p>
                                                <div class="commondiv hiddenclass blockform nobor" id="myContent14">
                                                    <form method="post" id="accommodation_form">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                                            <p>Enter Details</p>
                                                            <textarea name="accommodation_details" cols="" rows="">{{$general_information?$general_information->accommodation_details:''}}</textarea>
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1 accommodation-btn" type="button" value="Update">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2default">
                                            <div class="commondiv">
                                                <h2>Add a new course</h2>
                                                @include('institution.create_course')

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab25default">
                                            <div class="commondiv small_pad profile_sep nopadd nobor">
                                                <h5>Pending Applications </h5>
                                                <p class="pull-right exp"><a href="#" class="bl_but pull-right exportbut">Export All Applications</a></p>
                                            </div>
                                            <div class="commondiv filter blockform">
                                                <h5>Search Applicant</h5>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <p>Select Year</p>
                                                    <select>
                                                        <option>Select Year</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <p>Select Course</p>
                                                    <select>
                                                        <option>Select Course</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                    <p class="pull-left"><a href="#" class="green_but1">Start Conversation</a></p>
                                                    <p  class="pull-left"><a href="#" class="green_but1">Accept</a></p>
                                                    <p  class="pull-left"><a href="#" class="green_but1">Reject</a></p>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                    <p class="pull-left"><a href="#" class="green_but1">Start Conversation</a></p>
                                                    <p  class="pull-left"><a href="#" class="green_but1">Accept</a></p>
                                                    <p  class="pull-left"><a href="#" class="green_but1">Reject</a></p>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                    <p class="pull-left"><a href="#" class="green_but1">Start Conversation</a></p>
                                                    <p  class="pull-left"><a href="#" class="green_but1">Accept</a></p>
                                                    <p  class="pull-left"><a href="#" class="green_but1">Reject</a></p>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                    <p class="pull-left"><a href="#" class="green_but1">Start Conversation</a></p>
                                                    <p  class="pull-left"><a href="#" class="green_but1">Accept</a></p>
                                                    <p  class="pull-left"><a href="#" class="green_but1">Reject</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab26default">
                                            <div class="commondiv small_pad profile_sep nopadd nobor">
                                                <h5>Approved Application</h5>
                                                <p class="pull-right exp"><a href="#" class="bl_but pull-right exportbut">Export All Applications</a></p>
                                            </div>
                                            <div class="commondiv filter blockform">
                                                <h5>Search Applicant</h5>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <p>Select Year</p>
                                                    <select>
                                                        <option>Select Year</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <p>Select Course</p>
                                                    <select>
                                                        <option>Select Course</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                    <p class="pull-left"><a href="#" class="green_but1">Start Conversation</a></p>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                    <p class="pull-left"><a href="#" class="green_but1">Start Conversation</a></p>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                    <p class="pull-left"><a href="#" class="green_but1">Start Conversation</a></p>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                    <p class="pull-left"><a href="#" class="green_but1">Start Conversation</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab27default">
                                            <div class="commondiv small_pad profile_sep nopadd nobor">
                                                <h5>Rejected Application</h5>
                                                <p class="pull-right exp"><a href="#" class="bl_but pull-right exportbut">Export All Applications</a></p>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                    <p class="pull-left">
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                </div>
                                            </div>
                                            <div class="commondiv small_pad information uniparts conver">
                                                <h6><a href="#">Applicant Name</a></h6>
                                                <h5>Couse Name</h5>
                                                <p>Phone  no : 033055587458</p>
                                                <p>Email : acd@gmail.com</p>
                                                <div class="commondiv">
                                                    <p class="pull-left"><a href="#" class="dark_but1">Download Student File</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade in " id="tab100default">
                                            @include('institution.edit_course')
                                        </div>

                                        <div class="tab-pane fade in" id="tab20default">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 chat_users nopadd">
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 chatdash">
                                                <div class="commondiv chatboxmain">
                                                    <div class="commondiv chatboard">
                                                        <div class="userone"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext">
                                                            <p>Hi</p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone pull-right"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext pull-right text-right">
                                                            <p>Hello</p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the </p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone pull-right"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext pull-right text-right">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the </p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone pull-right"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext pull-right text-right">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the </p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone pull-right"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext pull-right text-right">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="commondiv chatboard">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                        <div class="chatboxx blockform ">
                                                            <textarea name="" cols="" rows="" placeholder="Type Your Message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                        <input name="" type="button" class="dark_but1 nobor" value="Post">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade in" id="tab21default">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 chat_users nopadd">
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>Applicant Name</h6>
                                                            <p>Applied for MBA</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 chatdash">
                                                <div class="commondiv chatboxmain">
                                                    <div class="commondiv chatboard">
                                                        <div class="userone"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext">
                                                            <p>Hi</p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone pull-right"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext pull-right text-right">
                                                            <p>Hello</p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the </p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone pull-right"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext pull-right text-right">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the </p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone pull-right"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext pull-right text-right">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the </p>
                                                        </div>
                                                    </div>
                                                    <div class="commondiv chatboard">
                                                        <div class="userone pull-right"><img src="images/imgblock.png" alt=""></div>
                                                        <div class="chattext pull-right text-right">
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="commondiv chatboard">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                        <div class="chatboxx blockform ">
                                                            <textarea name="" cols="" rows="" placeholder="Type Your Message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                        <input name="" type="button" class="dark_but1 nobor" value="Post">
                                                    </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@include('vendor.lrgt.ajax_script', ['form' => '#contact_details_form','request'=>'App/Http/Requests/contactDetailsRequest','on_start'=>true])