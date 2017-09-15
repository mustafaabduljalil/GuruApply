@if(count($courses)>0)
    @foreach($courses as $key => $course)
    <div class="col-xs-12 course_btn_div">
        <button class="bl_but course_btn" id="{{$key}}">Edit {{$course->name}}</button>
    </div>
    <div class="commondiv panel hiddenclass with-nav-tabs panel-default custom_tabs custompane course_div {{$key}}">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 panel-heading nobor">
            <ul class="nav nav-tabs nobor ">
                <li class="active"><a href="#tab30default" data-toggle="tab">Overview</a></li>
                <li><a href="#tab31default" data-toggle="tab">Fees & expenses</a></li>
                <li><a href="#tab32default" data-toggle="tab">Entry requirements</a></li>
                <li><a href="#tab33default" data-toggle="tab">Application process</a></li>
                <li><a href="#tab34default" data-toggle="tab">Placement</a></li>
                <li><a href="#tab35default" data-toggle="tab">scholarships</a></li>
                <li><a href="#tab36default" data-toggle="tab">Student Guides</a></li>
            </ul>
        </div>
        <div class="ol-xs-12 col-sm-9 col-md-9 col-lg-9 panel-body custom_panel">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab30default">
                    <div class="commondiv small_pad">
                        <h5>About this {{$course->name}}</h5>

                        <!--strat-->
                        <form method="post" id="about_course_form">
                            <div class="commondiv hiddenclass blockform nobor displayall">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <label>Name</label>
                                    <input name="name" type="text" value="{{$course ? $course->name : ''}}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <label>Duration</label>
                                    <input name="duration" type="text" value="{{$course ? $course->duration : ''}}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <label>Level</label>
                                    <input name="level" type="text" value="{{$course ? $course->level : ''}}">
                                </div>
                            </div>
                            <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                            <div class="commondiv small_pad">
                                <h5>Course Description</h5>
                                <!--strat-->
                                <div class="commondiv hiddenclass blockform nobor displayall" id="myContent14">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                        <textarea name="description" cols="" rows="">{{$course ? $course->description : ''}}</textarea>
                                    </div>
                                    <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap nopadd">
                                        <input name=""  class="dark_but1 about_course_btn" type="button" value="Create Course">
                                    </div>
                                </div>
                                <!--end-->
                            </div>
                        </form>
                        <!--end-->

                    </div>

                </div>
                <div class="tab-pane fade" id="tab31default">
                    {{--@foreach($course->fees  as $fees)--}}
                        <form method="post" id="fees_form">
                            <div class="commondiv small_pad">
                                <h5>1st year tuition fees</h5>
                                <div class="commondiv hiddenclass blockform nobor displayall">
                                    <table class="table_price commondiv">
                                        <tr>
                                            <th>Fees components	Amount in</th>
                                            <th>US Dollar (USD)	Amount in</th>
                                            <th>Indian Rupees (Rs.)</th>
                                        </tr>
                                            {{--@if($fees ? $fees->type : '' == "first")--}}
                                                <tr>
                                                    <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                            <input name="first_fees" type="text" >
                                                        </div></td>
                                                    <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                            <input name="first_dollars" type="text" >
                                                        </div></td>
                                                    <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                            <input name="first_indian" type="text" >
                                                        </div></td>
                                                </tr>
                                            {{--@endif--}}


                                    </table>
                                </div>
                            </div>
                            <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                            <div class="commondiv small_pad">
                                <h5>Other expenses in 1st year</h5>
                                <div class="commondiv hiddenclass blockform nobor displayall">
                                    <table class="table_price commondiv">
                                        <tr>
                                            <th>Fees components	Amount in</th>
                                            <th>US Dollar (USD)	Amount in</th>
                                            <th>Indian Rupees (Rs.)</th>
                                        </tr>
                                        {{--@if($fees ? $fees->type : '' == "other")--}}

                                        <tr>
                                                <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                        <input name="other_fees[]" type="text" >
                                                    </div></td>
                                                <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                        <input name="other_dollars[]" type="text" >
                                                    </div></td>
                                                <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                        <input name="other_indian[]" type="text" >
                                                    </div></td>
                                            </tr>
                                            {{--@endif--}}
                                    </table>
                                </div>
                                <div class="commondiv hiddenclass blockform nobor displayall">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                        <p>Enter Description</p>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                            <textarea name="description" cols="" rows="" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap nopadd">
                                    <input name=""  class="dark_but1 fees_btn" type="button" value="Save">
                                </div>
                            </div>
                        </form>
                        {{--@endforeach--}}
                </div>


                <div class="tab-pane fade" id="tab32default">
                    <div class="commondiv small_pad">
                        <h5>Entry requirements for this course</h5>
                        <form method="post" id="requirement_form">
                            <div class="commondiv hiddenclass blockform nobor displayall requirement_div">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <p class="commondiv bold add pull-right "><a  class="pull-left add_requirement" href="javascript:void(0)"><img src="images/plus.png" width="16" height="16"> Add new requirements</a></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd requirement_input">
                                    <input name="requirements[]" class="reset" type="text">
                                </div>
                                <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap nopadd">
                                <input name=""  class="dark_but1 requirement_btn"type="button" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab33default">
                    <h5>Application Process</h5>
                    <p class="commondiv bold add pull-right "><a  class="pull-left add_step" href="javascript:void(0)"><img src="images/plus.png" width="16" height="16"> Add new Step</a></p>
                    <div class="commondiv gray grayarea">
                        <!--strat-->
                        <form method="post" id="steps_form">
                            <div class="steps_div">
                                <div class="commondiv hiddenclass blockform nobor displayall steps_input">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                        <p>Enter Step</p>
                                        <input name="step_number[]" class="reset" type="text">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                        <p>Enter Step title</p>
                                        <input name="step_title[]" class="reset" type="text">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                        <p>Enter Step description</p>
                                        <textarea name="step_description[]" class="reset" cols="" rows=""></textarea>
                                    </div>
                                    <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                </div>
                            </div>
                            <!--end-->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap nopadd">
                                <input name=""  class="dark_but1 steps_btn"type="button" value="Save">
                            </div>
                        </form>
                    </div>
                    <div class="commondiv gray grayarea">
                        <p class="commondiv bold add pull-right "><a  class="pull-right" href="javascript:void(0)" onclick="toggler('myContent15');"><img src="images/plus.png" width="16" height="16"> Edit this step</a></p>
                        <h5>Step 2</h5>
                        <h6>Additional documents required</h6>
                        <p>LOR: 2 Letters of recommendation are required Recommendations should be provided from employers, supervisors,...</p>

                        <!--strat-->
                        <div class="commondiv hiddenclass blockform nobor " id="myContent15">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                <p>Enter Step</p>
                                <input type="text">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                <p>Enter Step title</p>
                                <input type="text">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                <p>Enter Step description</p>
                                <textarea name="" cols="" rows=""></textarea>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap nopadd">
                                <input name=""  class="dark_but1"type="button" value="Save">
                            </div>
                        </div>
                        <!--end-->

                    </div>
                </div>
                <div class="tab-pane fade" id="tab34default">
                    <form method="post" id="placement_form">
                        <div class="commondiv small_pad">
                            <h5>Placement Information</h5>
                            <h6>Popular sectors</h6>
                            {{--<p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent16');"><img src="images/plus.png" width="16" height="16"> Add Popular sector</a></p>--}}
                            <div class="commondiv blockform nobor">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <p>Add Popular sector</p>
                                    <input type="text" name="sector">
                                </div>

                            </div>
                        </div>
                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

                        <div class="commondiv small_pad">
                            <h6>Internships</h6>
                            {{--<p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent17');"><img src="images/plus.png" width="16" height="16"> Add new Internships</a></p>--}}
                            <div class="commondiv  blockform nobor ">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <p>Add Internships</p>
                                    <input name="internship" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="commondiv small_pad">
                            <h6>Average Salary</h6>
                            {{--<p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('salary');"><img src="images/plus.png" width="16" height="16"> Add new Average Salary</a></p>--}}
                            <div class="commondiv  blockform nobor ">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <p>Add Average Salary</p>
                                    <input name="average_salary" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap nopadd">
                            <input name="" class="dark_but1 placement_btn" type="button" value="Save">
                        </div>
                    </form>

                </div>
                <div class="tab-pane fade" id="tab35default">
                    <div class="commondiv small_pad">
                        <h5>Student scholarships for this course</h5>
                        <h6>More details on the following links:</h6>
                        {{--<p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent18');"><img src="images/plus.png" width="16" height="16"> Add scholarships</a></p>--}}
                        <form method="post" id="scholarship_form">
                            <div class="commondiv  blockform nobor " >
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <p>Add scholarships</p>
                                    <input name="url_path" type="text"/>
                                </div>
                                <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap nopadd">
                                    <input name=""  class="dark_but1 scholarship_btn" type="button" value="Save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="tab-pane fade" id="tab36default">
                    <form method="post" action="/course_student_guide" id="course_student_guide_form" enctype="multipart/form-data">
                        <div class="commondiv small_pad">
                            <h5>Student guides</h5>
                        </div>
                        <div class="commondiv">
                            {{--<p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent19');"><img src="images/plus.png" width="16" height="16"> Add Main Guide title</a></p>--}}
                            <div class="commondiv  blockform nobor " id="myContent19">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <p>Add Guide title</p>
                                    <input name="main_title" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="commondiv">
                            {{--<p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent20');"><img src="images/plus.png" width="16" height="16"> Add Guide Image</a></p>--}}
                            <div class="commondiv  blockform nobor " id="myContent20">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <p>Add Guide Image</p>
                                    <input name="image" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="commondiv">
                            {{--<p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent21');"><img src="images/plus.png" width="16" height="16"> Add Title</a></p>--}}
                            <div class="commondiv blockform nobor " id="myContent21">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <p>Add Title</p>
                                    <input name="title" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="commondiv">
                            {{--<p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent24');"><img src="images/plus.png" width="16" height="16"> Add Description</a></p>--}}
                            <div class="commondiv blockform nobor " id="myContent24">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <p>Add Description</p>
                                    <textarea name="description" cols="" rows=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="commondiv">
                            {{--<p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent22');"><img src="images/plus.png" width="16" height="16"> Add SubTitle</a></p>--}}
                            <div class="commondiv blockform nobor " id="myContent22">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <p>Add SubTitle</p>
                                    <input name="subtitle" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="commondiv">
                            {{--<p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent23');"><img src="images/plus.png" width="16" height="16"> Add Description</a></p>--}}
                            <div class="commondiv  blockform nobor " id="myContent23">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <p>Add Description</p>
                                    <textarea name="subdescription" cols="" rows=""></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap nopadd">
                            <input name=""  class="dark_but1 course_student_guide_btn" type="submit" value="Save">
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

@endforeach

@else

    <h1>Sorry there is not course yet</h1>

@endif