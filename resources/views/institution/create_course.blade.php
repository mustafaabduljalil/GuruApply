<div class="commondiv panel with-nav-tabs panel-default custom_tabs custompane">
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 panel-heading nobor">
        <ul class="nav nav-tabs nobor ">
            <li class="active"><a href="#tab11default" data-toggle="tab">Overview</a></li>
            <li><a href="#tab12default" data-toggle="tab">Fees & expenses</a></li>
            <li><a href="#tab13default" data-toggle="tab">Entry requirements</a></li>
            <li><a href="#tab14default" data-toggle="tab">Application process</a></li>
            <li><a href="#tab15default" data-toggle="tab">Placement</a></li>
            <li><a href="#tab16default" data-toggle="tab">scholarships</a></li>
            <li><a href="#tab17default" data-toggle="tab">Student Guides</a></li>
        </ul>
    </div>
    <div class="ol-xs-12 col-sm-9 col-md-9 col-lg-9 panel-body custom_panel">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab11default">
                <div class="commondiv small_pad">
                    <h5>About this course</h5>

                    <!--strat-->
                    <form method="post" id="about_course_form">
                        <div class="commondiv hiddenclass blockform nobor displayall">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                <label>Name</label>
                                <input name="name" type="text">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                <label>Duration</label>
                                <input name="duration" type="text">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                <label>Level</label>
                                <select name="level" id="level">
                                    <option value="certificate">Certificate</option>
                                    <option value="bachelors">Bachelors</option>
                                    <option value="masters">Masters</option>
                                    <option value="doctorate">Doctorate</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                        <div class="commondiv small_pad">
                            <h5>Course Description</h5>
                            <!--strat-->
                            <div class="commondiv hiddenclass blockform nobor displayall" id="myContent14">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <textarea name="description" cols="" rows="" placeholder="Course Description"></textarea>
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
            <div class="tab-pane fade" id="tab12default">
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
                                <tr>
                                    <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                            <input name="first_fees" type="text">
                                        </div></td>
                                    <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                            <input name="first_dollars" type="text">
                                        </div></td>
                                    <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                            <input name="first_indian" type="text">
                                        </div></td>
                                </tr>



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
                                @for($i=0;$i<9;$i++)
                                    <tr>
                                        <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                <input name="other_fees[]" type="text">
                                            </div></td>
                                        <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                <input name="other_dollars[]" type="text">
                                            </div></td>
                                        <td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                                <input name="other_indian[]" type="text">
                                            </div></td>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                        <div class="commondiv hiddenclass blockform nobor displayall">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info">
                                <p>Enter Description</p>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                    <textarea name="description" cols="" rows=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap nopadd">
                            <input name=""  class="dark_but1 fees_btn" type="button" value="Save">
                        </div>
                    </div>
                </form>
            </div>


            <div class="tab-pane fade" id="tab13default">
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
            <div class="tab-pane fade" id="tab14default">
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
            <div class="tab-pane fade" id="tab15default">
                <form method="post" id="placement_form">
                    <div class="commondiv small_pad">
                        <h5>Placement Information</h5>
                        <h6>Popular sectors</h6>
                        <p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent16');"><img src="images/plus.png" width="16" height="16"> Add Popular sector</a></p>
                        <div class="commondiv hiddenclass blockform nobor " id="myContent16">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                <p>Add Popular sector</p>
                                <input type="text" name="sector">
                            </div>

                        </div>
                    </div>
                    <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

                    <div class="commondiv small_pad">
                        <h6>Internships</h6>
                        <p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent17');"><img src="images/plus.png" width="16" height="16"> Add new Internships</a></p>
                        <div class="commondiv hiddenclass blockform nobor " id="myContent17">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info nopadd">
                                <p>Add Internships</p>
                                <input name="internship" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="commondiv small_pad">
                        <h6>Average Salary</h6>
                        <p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('salary');"><img src="images/plus.png" width="16" height="16"> Add new Average Salary</a></p>
                        <div class="commondiv hiddenclass blockform nobor " id="salary">
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
            <div class="tab-pane fade" id="tab16default">
                <div class="commondiv small_pad">
                    <h5>Student scholarships for this course</h5>
                    <h6>More details on the following links:</h6>
                    <p class="commondiv bold add pull-right "><a  class="pull-left" href="javascript:void(0)" onclick="toggler('myContent18');"><img src="images/plus.png" width="16" height="16"> Add scholarships</a></p>
                    <form method="post" id="scholarship_form">
                        <div class="commondiv hiddenclass blockform nobor " id="myContent18">
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


            <div class="tab-pane fade" id="tab17default">
                <form method="post" id="course_student_guide_form">
                    <div class="commondiv small_pad">
                        <h5>Student guides</h5>
                    </div>
                    @foreach($student_guides as $guide)
                        <div class="checkbox checkbox-success">
                            <input id="checkbox3" type="checkbox" name="guide[]" value="{{$guide->id}}">
                            <label for="checkbox3">
                                {{$guide->title}}
                            </label>
                        </div>
                    @endforeach
                    <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info butwrap nopadd">
                        <input name=""  class="dark_but1 course_student_guide_btn" type="button" value="Save">
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>