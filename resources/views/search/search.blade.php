@extends('layouts.master')
@section('title')
    {{$search_title}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/frontend/search.css')}}">
    @endsection
@section('scripts')
    <script src="{{asset('js/frontend/search.js')}}" type="text/javascript"></script>
    @endsection

@section('content')
<!--body-->
<section class="commondiv top_gap gray">
    <div class="container">
        <div class="row">
            <div class="commondiv">
                <div class="commondiv title text-center">
                    <h1>Search Results  <span>{{count($universities) + count($courses)}}</span></h1>
                    <h2>{{count($universities) + count($courses)}} Results found : <span><a href="#">{{count($universities)}} Universities</a> & <a href="#courses">{{count($courses)}} Courses</a></span></h2>
                </div>

                <div class="commondiv text-center">
                    <form method="get" action="/filter">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 filer_left">
                            <div class="panel-group" id="accordion">
                                {{--<div class="panel panel-default">--}}
                                    {{--<div class="panel-heading">--}}
                                        {{--<h4 class="panel-title">--}}
                                            {{--<a class="accordion-toggle custom_acc" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">--}}
                                                {{--Country--}}
                                            {{--</a>--}}
                                        {{--</h4>--}}
                                    {{--</div>--}}
                                    {{--<div id="collapseOne" class="panel-collapse collapse in">--}}
                                        {{--<div class="panel-body panel_acc">--}}
                                            {{--@foreach($countries as $country)--}}
                                                {{--<p><input name="country[]" value="{{$country}}"  type="checkbox"> <label>{{$country}}</label></p>--}}
                                            {{--@endforeach--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle custom_acc" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                State
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body panel_acc">
                                            @foreach($universities as $university)
                                                <p><input name="university[]" value="{{$university->name}}" type="checkbox"> <label>{{$university->name}}</label></p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle custom_acc" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                Course Type
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body  panel_acc">
                                            <p><input name="type[]" type="checkbox" value="certificate"> <label>Certificate</label></p>
                                            <p><input name="type[]" type="checkbox" value="bachelors"> <label>Bachelors</label></p>
                                            <p><input name="type[]" type="checkbox" value="masters"> <label>Masters</label></p>
                                            <p><input name="type[]" type="checkbox" value="doctorate"> <label>Doctorate</label></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle custom_acc" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                Exam Accepted
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body  panel_acc">
                                            <p><input name="exam[]" type="checkbox" value="ielts"> <label>IELTS</label></p>
                                            <p><input name="exam[]" type="checkbox" value="toefel"> <label>TOEFEL</label></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle custom_acc" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                                EcOURSE SPECIALISATION
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse">
                                        <div class="panel-body  panel_acc">
                                            <p><input name="specialisation[]" type="checkbox" value="mechanical"> <label>Mechanical</label></p>
                                            <p><input name="specialisation[]" type="checkbox" value="software"> <label>Software</label></p>
                                            <p><input name="specialisation[]" type="checkbox" value="civil"> <label>Civil</label></p>
                                        </div>
                                    </div>
                                </div>



                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle custom_acc" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                                                Yearly Fees
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSeven" class="panel-collapse collapse">
                                        <div class="panel-body panel_acc">
                                            <p><input name="salary" type="radio" value="10"> <label>Max 10 Lakhs</label></p>
                                            <p><input name="salary" type="radio" value="20"> <label>Max 20 Lakhs</label></p>
                                            <p><input name="salary" type="radio" value="30"> <label>Max 30 Lakhs</label></p>
                                            <p><input name="salary" type="radio" value="40"> <label>Max 40 Lakhs</label></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle custom_acc" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                                                More
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseEight" class="panel-collapse collapse">
                                        <div class="panel-body panel_acc">
                                            <p><input name="scholarship" type="checkbox" value="yes"> <label>Offering Scholarship</label></p>
                                            <p><input name="public" type="checkbox" value="yes"> <label>Publicly Funded</label></p>
                                            <p><input name="accommodation" type="checkbox" value="yes"> <label>With Accommodation</label></p>
                                            {{--<p><input name="more[]" type="checkbox" value="Yes"> <label>Exclude Certificate / Diploma Courses</label></p>--}}
                                        </div>
                                    </div>
                                </div>


                            </div>
                                <input type="hidden" name="search_title" value="{{$search_title}}">
                                <input type="hidden" name="country" value="{{$country}}">
                                <button name="" class="dark_but1" type="submit"> Filter </button>

                        </div>
                    </form>
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 center_div searchres pull-right">
                        <h3 class="{{count($universities) == 0 ? 'hiddenclass' : ''}}" id="universites">{{count($universities)}} Universities found</h3>
                        @foreach($universities as $university)
                            <div class="commondiv small_pad gray grayarea searchresdiv university_load" >
                                <div class="img_rightpan"><img src="{{$university->file->path}}" alt=""> </div>
                                <div class="img_left_pane search_left_pane">
                                    <h4><a href="#">{{$university ?  $university->name : ''}}</a></h4>
                                    <span>{{$university ?  $university->country : ''}}</span>
                                    <p>{{$university? $university->public == "yes" ? "Public" : 'Private' : ''}} university , Estd {{$university ?  $university->year_of_establiment : ''}}</p>
                                    <p>Accreditation/Affiliation: {{$university ?  $university->accreditation : ''}} , {{$university ?  $university->affiliation : ''}}</p>
                                    <a href="/{{$university ?  $university->id : ''}}" class="bl_but">View {{$university ?  $university->name : ''}}</a></div>
                            </div>
                        @endforeach

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 but1 nopadd {{count($universities) + count($courses) == 0 ? 'hiddenclass' : ''}}" id="load_more_universities"><a href="#" class="green_but1">Load More</a></div>
                        <div class=" commondiv clear_height"></div>
                        <h3 class="{{count($courses) == 0 ? 'hiddenclass' : ''}}" id="courses">{{count($courses)}} Courses found</h3>

                        @foreach($courses as $course)
                            <div class="commondiv small_pad gray grayarea searchresdiv course_load" id="courses">
                                <div class="img_rightpan"><img src="{{$course ? $course->institution->file->path : ''}}" alt=""> </div>
                                <div class="img_left_pane search_left_pane">
                                    <h4><a href="#">{{$course ? $course->name : ''}}</a></h4>
                                    <span>{{$course ? $course->institution->country : ''}}</span>
                                    <h4><a href="/{{$course ? $course->institution->id : ''}}">{{$course ? $course->institution->name : ''}}</a></h4>
                                    <div class="commondiv course_search">
                                        @if($courses)
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 nopadd">
                                                @foreach($course->fees as $fees)
                                                    @if($fees->type == "first")
                                                        <h5>1ST YEAR TOTAL FEES</h5>
                                                        <p>{{$fees->fees_amount_dollar}}</p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            <h5>Eligibility</h5>
                                                <p>{{$course->institution->basicEligibility ? $course->institution->basicEligibility->education : ''}} : {{$course->institution->basicEligibility ? $course->institution->basicEligibility->mark : ''}}</p>

                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                            @if($course->institution->public == "Yes")
                                                <p><img src="images/tick.png" alt="">Public university</p>
                                            @else
                                                <p><img src="images/close.png" alt="">Public university</p>

                                            @endif
                                            @if($course->institution->Scholarship == "Yes")
                                                <p><img src="images/tick.png" alt="">Scholarship</p>
                                            @else
                                                <p><img src="images/close.png" alt="">Scholarship</p>

                                            @endif
                                            @if($course->institution->accommodation)
                                                <p><img src="images/tick.png" alt="">Accommodation</p>
                                            @else
                                                <p><img src="images/close.png" alt="">Accommodation</p>

                                            @endif
                                        </div>
                                    </div>
                                    <a href="/download_brochure/{{$course->institution->brochures->fil_id}}" class="bl_but">Download E-Brochure</a> &nbsp;
                                    {{--<div class="commondiv compa">--}}
                                        {{--<input name="" type="checkbox" value="">--}}
                                        {{--<label>Add to compare</label>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        @endforeach
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 but1 nopadd {{count($universities) + count($courses) == 0 ? 'hiddenclass' : ''}}" id="load_more_courses"><p href="#" class="green_but1">Load More</p></div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!--body-->

    @endsection