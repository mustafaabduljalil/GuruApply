{{$video_no = 1 }}
@extends('layouts.master')
@section('title')
    Institution Profile
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/frontend/student.css')}}" >
@endsection
@section('scripts')
    <script src="{{asset('js/frontend/student.js')}}" type="text/javascript"></script>
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
                            <div class="commondiv userview">
                                <div class="user_image"><img src="{{$student ? asset($student->file->path) : asset('images/default.png')}}" alt="Profile image" class="img-responsive"></div>
                                <div class="usernames">
                                    <h2>{{$student ? $student->name : ''}}</h2>
                                <div class="public_pro pull-right"> <a href="/get_student/{{$student ? $student->id : ''}}" class="dark_but1">View your public profile</a> </div>
                            </div>
                            <div class="commondiv panel with-nav-tabs panel-default custom_tabs custompane">
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 panel-heading nobor">
                                    <ul class="nav nav-tabs nobor ">
                                        <li class="active"><a href="#tab1default" data-toggle="tab">Profile</a></li>
                                        <!--<li><a href="#tab2default" data-toggle="tab">Activity</a></li>-->
                                        <li><a href="#tab3default" data-toggle="tab">Account Settings</a></li>
                                        <li class="dropdown"><a href="#" data-toggle="dropdown">Application Management </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#tab25default" data-toggle="tab">Pending Application </a></li>
                                                <li><a href="#tab26default" data-toggle="tab">Approved Application</a></li>
                                                <li><a href="#tab27default" data-toggle="tab">Rejected Application</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#tab9default" data-toggle="tab">Shortlisted Courses</a></li>
                                        <li><a href="#tab20default" data-toggle="tab">Inbox <span class="pull-right">(125)</span></a></li>
                                    </ul>
                                </div>
                                <div class="ol-xs-12 col-sm-9 col-md-9 col-lg-9 panel-body custom_panel">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1default">
                                            <div class="commondiv small_pad profile_sep">
                                                <h5>PERSONAL INFORMATION<a href="javascript:void(0)" onclick="toggler('myContent');" class="editbut">Edit</a></h5>
                                                <form id="student_personal_form" method="post" action="/update_personal_student" enctype="multipart/form-data">
                                                    <div class="commondiv information degree">
                                                        <p class="bold"><span>Phone No.</span> <span class="des_pro">{{$student ? $student->phone : ''}}</span></p>
                                                        <p class="bold"><span>Email</span> <span class="des_pro">{{$student ? $student->email : ''}}</span></p>
                                                        <p class="bold"><span>Location</span> <span class="des_pro">{{$student ? $student->address : ''}}</span></p>
                                                        <p class="bold"><span>About</span> <span class="des_pro">{{$student ? $student->about : ''}}</span></p>
                                                        <div class="switch-field">
                                                            <h6>Visibility: </h6>
                                                            @if(isset($student->phone))
                                                                <input type="radio" class="visibility" name="visibility" id="switch_left" value="0" {{$student->visibility == "0" ? 'checked' : ''}}/>
                                                                <label for="switch_left">Private</label>
                                                                <input type="radio" class="visibility" name="visibility" id="switch_right" value="1" {{$student->visibility == "1" ? 'checked' : ''}}/>
                                                                <label for="switch_right">Public</label>
                                                            @endif
                                                            <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        </div>
                                                    </div>
                                                    <div class="commondiv hiddenclass blockform" id="myContent">
                                                        <h5>PERSONAL INFORMATION</h5>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Name (including last name)</p>
                                                            <input name="name" type="text" value="{{$student ? $student->name : ''}}">
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Father's Name</p>
                                                            <input name="father_name" type="text" value="{{$student ? $student->father_name : ''}}">
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Email</p>
                                                            <input name="email" type="Email" value="{{$student ? $student->email : ''}}">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Address </p>
                                                            <input name="address" type="text" value="{{$student ? $student->address : ''}}">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Country</p>
                                                            <select name="country" id="country" data-region-id="state" class="form-control crs-country" ></select>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>State</p>
                                                            <select name="city" id="state"></select>

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Mobile</p>
                                                            <input name="phone" type="text" value="{{$student ? $student->phone : ''}}">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Passport No</p>
                                                            <input name="passport_number" type="text" value="{{$student ? $student->passport_number : ''}}">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Date Of Birth</p>
                                                            <input class="form-control" id="date" name="date_of_birth" placeholder="MM/DD/YYY" type="date"/>                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                                            <p>Image profile</p>
                                                            <input type="file" name="image_profile">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                                            <p>Document (ID proof , Address proof)</p>
                                                            <input type="file" name="personal_file">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1"type="button" value="Cancel">
                                                            <input name="" class="green_but1" type="submit" value="Save">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="commondiv small_pad profile_sep">
                                                <h5>EDUCATION INFORMATION<a href="javascript:void(0)" onclick="toggler('myContent2');" class="editbut">Edit</a></h5>
                                                @if(count($student->studentEducation)>0)
                                                    @foreach($student->studentEducation as $education)
                                                        <div class="commondiv information degree">
                                                            <h6>{{$education ? $education->class : ''}}</h6>
                                                            <p class="bold"><span>Degree</span> {{$education ? $education->degree_method : ''}} </p>
                                                            <p class="bold"><span>Marks</span> {{$education ? $education->mark : ''}}</p>
                                                        </div>
                                                    @endforeach
                                                @endif


                                                <div class="commondiv hiddenclass blockform" id="myContent2">
                                                    <h5>EDUCATION INFORMATION</h5>
                                                    <form method="post" id="student_educational_form" enctype="multipart/form-data" action="/update_educational_student">

                                                        @if(count($student->studentEducation)>0)

                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                                                    <label>Class 10</label>
                                                                    <select id="level" name="class[]">
                                                                        <option value="CBSE" {{$student->studentEducation[0]->class == "CBSE" ? 'selected' : ''}}>CBSE</option>
                                                                        <option value="CISCE" {{$student->studentEducation[0]->class == "CISCE" ? 'selected' : ''}}>CISCE</option>
                                                                        <option value="ICSE" {{$student->studentEducation[0]->class == "ICSE" ? 'selected' : ''}}>ICSE</option>
                                                                        <option value="ISC" {{$student->studentEducation[0]->class == "ISC" ? 'selected' : ''}}>ISC</option>
                                                                        <option value="CVE" {{$student->studentEducation[0]->class == "CVE" ? 'selected' : ''}}>CVE</option>
                                                                        <option value="IB" {{$student->studentEducation[0]->class == "IB" ? 'selected' : ''}}>IB</option>
                                                                    </select>
                                                                    <p class="labelform">
                                                                        <input name="degree_type1" type="radio" value="marks" {{$student->studentEducation[0]->degree_method == "marks" ? 'checked' : ''}}>
                                                                        <label>MARKS</label>
                                                                        <input name="degree_type1" type="radio" value="cgpa" {{$student->studentEducation[0]->degree_method == "cgpa" ? 'checked' : ''}}>
                                                                        <label>CGPA</label>
                                                                    </p>
                                                                    <p>
                                                                        <input name="mark[]" type="text" value="{{$student->studentEducation[0] ? $student->studentEducation[0]->mark : ''}}">
                                                                        <input name="class_id[]" type="hidden" value="{{$student->studentEducation[0] ? $student->studentEducation[0]->id : ''}}">
                                                                    </p>
                                                                </div>

                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                                                    <label>Class 12</label>
                                                                    <select id="level" name="class[]">
                                                                        <option value="CBSE" {{$student->studentEducation[1]->class == "CBSE" ? 'selected' : ''}}>CBSE</option>
                                                                        <option value="CISCE" {{$student->studentEducation[1]->class == "CISCE" ? 'selected' : ''}}>CISCE</option>
                                                                        <option value="ICSE" {{$student->studentEducation[1]->class == "ICSE" ? 'selected' : ''}}>ICSE</option>
                                                                        <option value="ISC" {{$student->studentEducation[1]->class == "ISC" ? 'selected' : ''}}>ISC</option>
                                                                        <option value="CVE" {{$student->studentEducation[1]->class == "CVE" ? 'selected' : ''}}>CVE</option>
                                                                        <option value="IB" {{$student->studentEducation[1]->class == "IB" ? 'selected' : ''}}>IB</option>
                                                                    </select>
                                                                    <p class="labelform">
                                                                        <input name="degree_type2" type="radio" value="marks" {{$student->studentEducation[1]->degree_method == "marks" ? 'checked' : ''}}>
                                                                        <label>MARKS</label>
                                                                        <input name="degree_type2" type="radio" value="cgpa" {{$student->studentEducation[1]->degree_method == "cgpa" ? 'checked' : ''}}>
                                                                        <label>CGPA</label>
                                                                    </p>
                                                                    <p>
                                                                        <input name="mark[]" type="text" value="{{$student->studentEducation[1] ? $student->studentEducation[1]->mark : ''}}">
                                                                        <input name="class_id[]" type="hidden" value="{{$student->studentEducation[1] ? $student->studentEducation[1]->id : ''}}">
                                                                    </p>
                                                                </div>



                                                        @else
                                                            @for($i=0 ; $i<2 ;$i++)

                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                                                    <label>Class 10</label>
                                                                    <select id="level" name="class[]">
                                                                        <option value="CBSE" >CBSE</option>
                                                                        <option value="CISCE">CISCE</option>
                                                                        <option value="ICSE">ICSE</option>
                                                                        <option value="ISC">ISC</option>
                                                                        <option value="CVE">CVE</option>
                                                                        <option value="IB">IB</option>
                                                                    </select>
                                                                    <p class="labelform">
                                                                        <input name="degree_type[]" type="radio" value="marks">
                                                                        <label>MARKS</label>
                                                                        <input name="degree_type[]" type="radio" value="cgpa">
                                                                        <label>CGPA</label>
                                                                    </p>
                                                                    <p>
                                                                        <input name="mark[]" type="text">
                                                                    </p>
                                                                </div>

                                                                @endfor



                                                        @endif


                                                        <label>Diploma/Degree</label>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info parent_div_course">
                                                             @if(count($student->studentDegree) > 0)
                                                                @foreach($student->studentDegree as $degree)
                                                                    <div class="student_course" >
                                                                        <p>Course Level</p>
                                                                        <select id="level" name="course_level[]">
                                                                            <option value="selected" {{$degree->level == '' ? 'selected' : ''}}>Select Level</option>
                                                                            <option value="Bachelors" {{$degree->level == 'Bachelors' ? 'selected' : ''}}>Bachelors</option>
                                                                            <option value="Master" {{$degree->level == 'Master' ? 'selected' : ''}}>Master</option>
                                                                            <option value="Doctorate" {{$degree->level == 'Doctorate' ? 'selected' : ''}}>Doctorate</option>
                                                                        </select>
                                                                        <p>Course Name</p>
                                                                        <input class="form-control reset" name="course_name[]" type="text" value="{{$degree ? $degree->name : ''}}">
                                                                        <p>Specialization</p>
                                                                        <input class="form-control reset" name="specialization[]" type="text" value="{{$degree ? $degree->specialization : ''}}">
                                                                        <p>Institution Name</p>
                                                                        <input class="form-control reset" name="institution_name[]" type="text" value="{{$degree ? $degree->institution_name : ''}}">
                                                                        <p>Start Date</p>
                                                                        <input class="form-control reset" name="start[]" type="date" value="{{$degree ? $degree->start_date : ''}}">
                                                                        <p>End Date</p>
                                                                        <input class="form-control reset" name="end[]" type="date" value="{{$degree ? $degree->end_date : ''}}">
                                                                        <p>Marks</p>
                                                                        <input class="form-control reset" name="marks[]" type="text" value="{{$degree ? $degree->marks : ''}}">
                                                                        <input type="hidden" name="degree_id[]" value="{{$degree ? $degree->id : ''}}" >
                                                                    </div>
                                                                @endforeach
                                                                @else
                                                                <div class="student_course" >
                                                                    <p>Course Level</p>
                                                                    <select id="level" name="course_level[]">
                                                                        <option value="selected">Select Level</option>
                                                                        <option value="Bachelors">Bachelors</option>
                                                                        <option value="Master">Master</option>
                                                                        <option value="Doctorate">Doctorate</option>
                                                                    </select>
                                                                    <p>Course Name</p>
                                                                    <input class="form-control reset" name="course_name[]" type="text">
                                                                    <p>Specialization</p>
                                                                    <input class="form-control reset" name="specialization[]" type="text">
                                                                    <p>Institution Name</p>
                                                                    <input class="form-control reset" name="institution_name[]" type="text">
                                                                    <p>Start Date</p>
                                                                    <input class="form-control reset" name="start[]" type="date">
                                                                    <p>End Date</p>
                                                                    <input class="form-control reset" name="end[]" type="date">
                                                                    <p>Marks</p>
                                                                    <input class="form-control reset" name="marks[]" type="text">
                                                                    <input type="hidden" name="degree_id[]" value="" >
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info" >
                                                            <a id="add_more_course">Add More</a>
                                                        </div>
                                                        <label>Exam</label>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info parent_div_exam">

                                                            @if(count($student->studentExam) > 0)
                                                                @foreach($student->studentExam as $exam)
                                                                <div class="student_exam">
                                                                    <p class="labelform">
                                                                        <input name="exam_type[]" type="radio" value="extrance" {{$exam->exam_type == "extrance" ? 'checked' : ''}}>
                                                                        <label>Extrance Exam</label>
                                                                        <input name="exam_type[]" type="radio" value="language" {{$exam->exam_type == "language" ? 'checked' : ''}}>
                                                                        <label>Language Exam</label>
                                                                    </p>
                                                                    <select id="level" name="exam_name[]">
                                                                        <option value="Select">Select</option>
                                                                        <option value="IELTS" {{$exam->exam_name == 'IELTS' ? 'selected' : ''}}>IELTS</option>
                                                                        <option value="TOEFEL" {{$exam->exam_name == 'TOEFEL' ? 'selected' : ''}}>TOEFEL</option>
                                                                    </select>
                                                                    <label>Marks</label>
                                                                    <input class="form-control reset" name="exam_mark[]" type="text" value="{{$exam ? $exam->marks : ''}}">
                                                                    <input type="hidden" name="exam_id[]" value="{{$exam ? $exam->id : ''}}">
                                                                </div>
                                                                @endforeach
                                                                @else
                                                                    <div class="student_exam">
                                                                        <p class="labelform">
                                                                            <input name="exam_type[]" type="radio" value="extrance">
                                                                            <label>Extrance Exam</label>
                                                                            <input name="exam_type[]" type="radio" value="language">
                                                                            <label>Language Exam</label>
                                                                        </p>
                                                                        <select id="level" name="exam_name[]">
                                                                            <option value="Select" selected>Select</option>
                                                                            <option value="IELTS">IELTS</option>
                                                                            <option value="TOEFEL">TOEFEL</option>
                                                                        </select>
                                                                        <label>Marks</label>
                                                                        <input class="form-control reset" name="exam_mark[]" type="text">
                                                                        <input type="hidden" name="exam_id[]" value="">
                                                                    </div>
                                                            @endif

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info" >
                                                            <a id="more_exam">Add More</a>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info" >
                                                            <input type="file" name="marksheets" class="form-control">
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        <input type="hidden" name="student_id" value="{{$student ? $student->id : ''}}" />

                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1"type="button" value="Cancel">
                                                            <input name="" class="green_but1" type="submit" value="Save">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>




                                            <div class="commondiv small_pad profile_sep">
                                                <h5>WORK EXPERIENCE <a href="javascript:void(0)" onclick="toggler('myContent4');" class="editbut">Edit</a></h5>

                                                @if(count($student->jobs)>0)
                                                    @foreach($student->jobs as $job)
                                                        <div class="commondiv information degree">
                                                            <h6>{{$job ? $job->position : ''}}</h6>
                                                            <p class="bold"><span>Company : </span> {{$job ? $job->company : ''}} </p>
                                                            <p class="bold"><span>Start Year :</span> {{$job ? $job->start_year : ''}}</p>
                                                            <p class="bold"><span>End Year</span> {{$job ? $job->end_year : ''}}</p>
                                                            <p class="bold"><span>Description :</span> {{$job ? $job->description : ''}}</p>
                                                        </div>
                                                    @endforeach
                                                @endif


                                                <div class="commondiv hiddenclass blockform" id="myContent4">
                                                    <h5>WORK EXPERIENCE</h5>
                                                    <form method="post" id="student_work_experience">

                                                        <label>Job</label>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info parent_div_job">
                                                            @if(count($student->jobs) > 0)
                                                                @foreach($student->jobs as $job)
                                                                    <div class="student_job" >
                                                                        <p>Position</p>
                                                                        <input class="form-control reset" name="position" type="text" value="{{$job ? $job->position : ''}}">
                                                                        <p>Company</p>
                                                                        <input class="form-control reset" name="company" type="text" value="{{$job ? $job->company : ''}}">
                                                                        <p>Start Year</p>
                                                                        <select class="form-control reset" id="start_year" name="start_year"></select>
                                                                        <p>End Year</p>
                                                                        <select class="form-control reset" id="end_year" name="end_year"></select>
                                                                        <p>Job Description</p>
                                                                        <input class="form-control reset" name="description" type="text" value="{{$job ? $job->description : ''}}">
                                                                        <input type="hidden" name="job_id" value="{{$job ? $job->id : ''}}" >
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="student_job" >
                                                                    <p>Position</p>
                                                                    <input class="form-control reset" name="position" type="text">
                                                                    <p>Company</p>
                                                                    <input class="form-control reset" name="company" type="text">
                                                                    <p>Start Year</p>
                                                                    <select class="form-control reset" id="start" name="start_year[]"></select>
                                                                    <p>End Year</p>
                                                                    <select class="form-control reset" id="end" name="end_year[]"></select>
                                                                    <p>Job Description</p>
                                                                    <input class="form-control reset" name="description" type="text" >
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info" >
                                                            <a id="add_more_job">Add More</a>
                                                        </div>
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        <input type="hidden" name="student_id" value="{{$student ? $student->id : ''}}" />

                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1"type="button" value="Cancel">
                                                            <input name="" class="green_but1 student_job_btn" type="button" value="Save">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="commondiv small_pad profile_sep">
                                                <h5>EDUCATION PREFERENCES<a href="javascript:void(0)" onclick="toggler('myContent3');" class="editbut">Edit</a></h5>
                                                <div class="commondiv information degree">
                                                    <h6>Study Abroad</h6>
                                                    <p class="bold"><span>Interested in studying</span> {{$student ? $student->educationPreference->current_country : ''}}</p>
                                                    <p class="bold"><span>Budget Of Studies</span> {{$student ? $student->educationPreference->budget : ''}} Lakh</p>
                                                </div>
                                                <div class="commondiv hiddenclass blockform" id="myContent3">
                                                    <h5>EDUCATION PREFERENCES</h5>
                                                    <form method="post" id="preferences_form">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                                            <p class="labelform">
                                                                <input name="current_country" type="radio" value="India" {{$student->educationPreference->current_country == "India" ? 'checked' : ''}}>
                                                                <label>India</label>
                                                            </p>
                                                            <p class="labelform">
                                                                <input name="current_country" type="radio" value="Abroad" {{$student->educationPreference->current_country == "Abroad" ? 'checked' : ''}}>
                                                                <label>Abroad</label>
                                                            </p>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Country Of Interest</p>
                                                            <select name="country_interest" id="country_interest" class="form-control crs-country" ></select>

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Course Specialization</p>
                                                            <input name="specialization" type="text" value="{{$student ? $student->educationPreference->specialization : ''}}">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Choose Level Of Study</p>
                                                            <p class="labelform">
                                                                <input name="level" type="radio" value="Bachelors" {{$student->educationPreference->level == "Bachelors" ? 'checked' : ''}}>
                                                                <label>Bachelors</label>
                                                            </p>
                                                            <p class="labelform">
                                                                <input name="level" type="radio" value="Masters" {{$student->educationPreference->level == "Masters" ? 'checked' : ''}}>
                                                                <label>Masters</label>
                                                            </p>
                                                            <p class="labelform">
                                                                <input name="level" type="radio" value="PhD" {{$student->educationPreference->level == "PhD" ? 'checked' : ''}}>
                                                                <label>PhD</label>
                                                            </p>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form_info">
                                                            <p>Budget Of Studies</p>
                                                            <input name="budget" type="text" value="{{$student ? $student->educationPreference->budget : ''}}">
                                                        </div>


                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                                        <input type="hidden" name="student_id" value="{{$student ? $student->id : ''}}" />
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap">
                                                            <input name=""  class="dark_but1"type="button" value="Cancel">
                                                            <input name="" class="green_but1 preferences_btn" type="button" value="Save">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!--<div class="tab-pane fade" id="tab2default">

                                          <div class="commondiv small_pad profile_sep">
                                           <h5>ACTIVITY STATS</h5>

                                           <div class="commondiv tabs_two">
                                           <ul class="nav nav-tabs nobor ">
                                            <li class="active"><a href="#tab4default" data-toggle="tab">All Activity</a></li>
                                            <li><a href="http://webq.co.in/" >Ask Your Question</a></li>
                                            <li><a href="#tab5default" data-toggle="tab">Answers<br><h2>1</h2></a></li>
                                            <li><a href="#tab6default" data-toggle="tab">Discussion Comments<br><h2>2</h2></a></li>
                                            <li><a href="http://webq.co.in/">Follow Tags Now</a></li>
                                           </ul>
                                           </div>

                                            <div class="tab-content tab_con">

                                            <div class="tab-pane fade in active" id="tab4default">
                                            <div class="commondiv small_pad">
                                            <h5>Commented <span class="time">28 min ago</span></h5>
                                            <div class="commondiv information degree">
                                            <h6><a href="#">Top colleges accepting GATE 2015 scores</a></h6>
                                            <p class="fade_normal">799 comments | 1000 views</p>
                                            </div>
                                            <div class="commondiv information degree">
                                            <h6><a href="#">Top colleges accepting GATE 2015 scores</a></h6>
                                            <p class="fade_normal">799 comments | 1000 views</p>
                                            </div>
                                            </div>
                                            <div class="commondiv small_pad">
                                            <h5>Answered <span class="time">28 min ago</span></h5>
                                            <div class="commondiv information degree">
                                            <h6><a href="#">How can I become a doctor?</a></h6>
                                            <p class="fade_normal">799 comments | 1000 views</p>
                                            </div>
                                            </div>
                                            </div>

                                            <div class="tab-pane fade" id="tab5default">
                                            <div class="commondiv small_pad">
                                            <h5>Answered <span class="time">28 min ago</span></h5>
                                            <div class="commondiv information degree">
                                            <h6><a href="#">How can I become a doctor?</a></h6>
                                            <p class="fade_normal">799 comments | 1000 views</p>
                                            </div>
                                            </div>
                                            </div>

                                            <div class="tab-pane fade" id="tab6default">
                                            <div class="commondiv small_pad">
                                            <h5>Commented <span class="time">28 min ago</span></h5>
                                            <div class="commondiv information degree">
                                            <h6><a href="#">Top colleges accepting GATE 2015 scores</a></h6>
                                            <p class="fade_normal">799 comments | 1000 views</p>
                                            </div>
                                            <div class="commondiv information degree">
                                            <h6><a href="#">Top colleges accepting GATE 2015 scores</a></h6>
                                            <p class="fade_normal">799 comments | 1000 views</p>
                                            </div>
                                            </div>
                                            </div>

                                            </div>

                                          </div>

                                        </div>-->

                                        <div class="tab-pane fade" id="tab3default">
                                            <div class="commondiv small_pad profile_sep">
                                                <h5>CHANGE PASSWORD</h5>
                                                <div class="commondiv information ">
                                                    <form method="post" id="change_password">
                                                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

                                                        <div class="col-xs-12 col-sm-6 col-lg-4 col-md-4 blockform nobor">
                                                            <p>Current Password</p>
                                                            <input name="old_password" type="password">
                                                            <p>New Password</p>
                                                            <input name="password" type="password">
                                                            <p>Re Type New Password</p>
                                                            <input name="confirm_password" type="password">
                                                            <input type="hidden" name="student_id" value="{{$student->user->id}}" />
                                                        </div>
                                                        <div class="commondiv small_pad small_mar">
                                                            <input name="" class="btn change_password_btn" type="button" value="Save">
                                                            <input class="btn" name="" type="button" value="Cancel">
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                            <div class="commondiv small_pad profile_sep">
                                                <h5>COMMUNICATION PREFERENCE</h5>
                                                <div class="commondiv information ">
                                                    <div class="commondiv">
                                                        <input name="" type="checkbox" value="">
                                                        <label>I want to receive emails</label>
                                                        <p class="fade_normal">You will miss out on important notifications related to your account & activity on Shiksha. We suggest you enable it back.</p>
                                                    </div>
                                                    <div class="commondiv small_pad small_mar">
                                                        <input name="" class="btn" type="button" value="Save">
                                                        <input class="btn" name="" type="button" value="Cancel">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab25default">
                                            <div class="commondiv small_pad profile_sep">
                                                <h5>Pending Application</h5>
                                                @if(count($student->course)>0)
                                                    @foreach($student->course as $course)
                                                        @if($course->pivot->status == 'pending')
                                                            <div class="commondiv information degree">
                                                                <h6>MBA</h6>
                                                                <p class="bold"><span>University Name</span> {{$course->institution->name}}</p>
                                                                <p class="bold"><span>For the Year</span> {{$course->duration}}</p>
                                                                <p class="bold"><span>Total Fee</span> {{$course->fees->sum('fees_amount_indian')}} Lakh</p>
                                                                <p class="commondiv bold add"><a href="/course/{{$course->id}}" class="dark_but1 pull-left">View Course</a></p>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab26default">
                                            <div class="commondiv small_pad profile_sep">
                                                <h5>approved Application</h5>
                                                @if(count($student->course)>0)
                                                    @foreach($student->course as $course)
                                                        @if($course->pivot->status == 'accept')
                                                            <div class="commondiv information degree">
                                                                <h6>MBA</h6>
                                                                <p class="bold"><span>University Name</span> {{$course->institution->name}}</p>
                                                                <p class="bold"><span>For the Year</span> {{$course->duration}}</p>
                                                                <p class="bold"><span>Total Fee</span> {{  $course->fees->sum('fees_amount_indian')  }} Lakh</p>
                                                                <p class="commondiv bold add"><a href="/course/{{$course->id}}" class="dark_but1 pull-left">View Course</a></p>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab27default">
                                            <div class="commondiv small_pad profile_sep">
                                                <h5>rejected Application</h5>
                                                @if(count($student->course)>0)
                                                    @foreach($student->course as $course)
                                                        @if($course->pivot->status == 'reject')
                                                            <div class="commondiv information degree">
                                                                <h6>MBA</h6>
                                                                <p class="bold"><span>University Name</span> {{$course->institution->name}}</p>
                                                                <p class="bold"><span>For the Year</span> {{$course->duration}}</p>
                                                                <p class="bold"><span>Total Fee</span> {{  $course->fees->sum('fees_amount_indian')  }} Lakh</p>
                                                                <p class="commondiv bold add"><a href="/course/{{$course->id}}" class="dark_but1 pull-left">View Course</a></p>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab9default">
                                            <div class="commondiv small_pad profile_sep">
                                                <h5>shortlisted courses</h5>
                                                @if(count($student->course)>0)
                                                    @foreach($student->course as $course)
                                                        @if($course->pivot->status == 'accept')
                                                            <div class="commondiv information degree">
                                                                <h6>MBA</h6>
                                                                <p class="bold"><span>University Name</span> {{$course->institution->name}}</p>
                                                                <p class="bold"><span>For the Year</span> {{$course->duration}}</p>
                                                                <p class="bold"><span>Total Fee</span> {{  $course->fees->sum('fees_amount_indian')  }} Lakh</p>
                                                                <p class="commondiv bold add"><a href="/course/{{$course->id}}" class="dark_but1 pull-left">View Course</a></p>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade in" id="tab20default">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 chat_users nopadd">
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                            <span class="new_mes">1</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                            <span class="new_mes">2</span> </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                        </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <span class="new_mes">5</span>
                                                            <p>Kalyani</p>
                                                        </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                        </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                        </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                        </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                        </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                        </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                        </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                        </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                        </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                        </a> </div>
                                                </div>
                                                <div class="commondiv chatuser">
                                                    <div class="imgchat"><img src="images/profileimage.jpg" alt=""></div>
                                                    <div class="usernamechat"> <a  href="#">
                                                            <h6>University of kalyani</h6>
                                                            <p>Kalyani</p>
                                                        </a> </div>
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

@endsection