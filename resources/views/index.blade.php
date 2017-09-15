@extends('layouts.master')

@section('title')
    GuruApply
    @endsection
@section('scripts')

    <script type="text/javascript" src="{{asset('js/frontend/home.js')}}"></script>

    @endsection
@section('content')

    <section class="content nopadd">
        <div class="parallax homebg"  data-stellar-background-ratio="0.25" data-stellar-vertical-offset="0">
                <div class="container">
                <div class="college-search-box">
                <h2>Start your college search</h2>
        <ul class="nav nav-tabs tan-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-a">Certificate</a></li>
                <li><a data-toggle="tab" href="#tab-b">Bachelors</a></li>
                <li><a data-toggle="tab" href="#tab-c">Masters</a></li>
                <li><a data-toggle="tab" href="#tab-d">Doctorate</a></li>
                </ul>
                <div class="tab-content">
                <div id="tab-a" class="tab-pane fade in active">
                <div class="tab-box">
                <div class="row rowspan brdBtm mrgnB">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <label>Choose a course</label>
        <div class="select-box">
                <select>
                <option>All MBA Specializations</option>
        </select>
        </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <label>Choose study destination</label>
        <div class="select-box">
                <select>
                <option>Choose country</option>
        </select>
        </div>
        </div>
        </div>
        </div>
        <div class="row rowspan mrgnB">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="select-form-box">
                <label>More options</label>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <div class="select-box">
                <select>
                <option>Any Exam</option>
        </select>
        </div>

        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">

                <div class="select-box">
                <select>
                <option>Any Fees</option>
        </select>
        </div>
        </div>
        </div>
        </div>
        <div class="row rowspan">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center"> <a href="#" class="btn">Search</a> </div>
                </div>
                </div>
                </div>
                <div id="tab-b" class="tab-pane fade">
                <div class="tab-box">
                <div class="row rowspan brdBtm mrgnB">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <label>Choose a course</label>
        <div class="select-box">
                <select>
                <option>All MBA Specializations</option>
        </select>
        </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <label>Choose study destination</label>
        <div class="select-box">
                <select>
                <option>Choose country</option>
        </select>
        </div>
        </div>
        </div>
        </div>
        <div class="row rowspan mrgnB">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="select-form-box">
                <label>More options</label>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <div class="select-box">
                <select>
                <option>Any Exam</option>
        </select>
        </div>
        <div class="select-box">
                <select>
                <option>Any Fees</option>
        </select>
        </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <div class="select-box">
                <select>
                <option>Any Score</option>
        </select>
        </div>
        <div class="select-box">
                <select>
                <option>Short by Sponsored</option>
        </select>
        </div>
        </div>
        </div>
        </div>
        <div class="row rowspan">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center"> <a href="#" class="btn">Search</a> </div>
                </div>
                </div>
                </div>
                <div id="tab-c" class="tab-pane fade">
                <div class="tab-box">
                <div class="row rowspan brdBtm mrgnB">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <label>Choose a course</label>
        <div class="select-box">
                <select>
                <option>All MBA Specializations</option>
        </select>
        </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <label>Choose study destination</label>
        <div class="select-box">
                <select>
                <option>Choose country</option>
        </select>
        </div>
        </div>
        </div>
        </div>
        <div class="row rowspan mrgnB">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="select-form-box">
                <label>More options</label>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <div class="select-box">
                <select>
                <option>Any Exam</option>
        </select>
        </div>
        <div class="select-box">
                <select>
                <option>Any Fees</option>
        </select>
        </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <div class="select-box">
                <select>
                <option>Any Score</option>
        </select>
        </div>
        <div class="select-box">
                <select>
                <option>Short by Sponsored</option>
        </select>
        </div>
        </div>
        </div>
        </div>
        <div class="row rowspan">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center"> <a href="#" class="btn">Search</a> </div>
                </div>
                </div>
                </div>
                <div id="tab-d" class="tab-pane fade">
                <div class="tab-box">
                <div class="row rowspan brdBtm mrgnB">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <label>Choose a course</label>
        <div class="select-box">
                <select>
                <option>All MBA Specializations</option>
        </select>
        </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <label>Choose study destination</label>
        <div class="select-box">
                <select>
                <option>Choose country</option>
        </select>
        </div>
        </div>
        </div>
        </div>
        <div class="row rowspan mrgnB">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="select-form-box">
                <label>More options</label>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <div class="select-box">
                <select>
                <option>Any Exam</option>
        </select>
        </div>
        <div class="select-box">
                <select>
                <option>Any Fees</option>
        </select>
        </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="select-form-box">
                <div class="select-box">
                <select>
                <option>Any Score</option>
        </select>
        </div>
        <div class="select-box">
                <select>
                <option>Short by Sponsored</option>
        </select>
        </div>
        </div>
        </div>
        </div>
        <div class="row rowspan">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center"> <a href="#" class="btn">Search</a> </div>
                </div>
                </div>
                </div>
                </div>
                <i class="over-icon"></i> </div>
                </div>
                </div>
                </section>
                <section id="courses-section" class="content gray-background text-center">
                <div class="container">
                <h1>Most viewed <span>Courses</span></h1>
        <div id="owl-demo2" class="owl-carousel">
                <div class="item">
                <div class="courses-list"> <img src="images/thumb-1.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>MBBS</h4>
                <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        <div class="item">
                <div class="courses-list"> <img src="images/thumb-4.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>Medicine MBBS</h4>
        <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        <div class="item">
                <div class="courses-list"> <img src="images/thumb-3.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>Master of Business</h4>
        <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        <div class="item">
                <div class="courses-list"> <img src="images/thumb-2.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>MBA</h4>
                <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        <div class="item">
                <div class="courses-list"> <img src="images/thumb-1.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>MBBS</h4>
                <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        <div class="item">
                <div class="courses-list"> <img src="images/thumb-4.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>Medicine MBBS</h4>
        <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        <div class="item">
                <div class="courses-list"> <img src="images/thumb-3.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>Master of Business</h4>
        <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        <div class="item">
                <div class="courses-list"> <img src="images/thumb-2.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>MBA</h4>
                <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        <div class="item">
                <div class="courses-list"> <img src="images/thumb-1.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>MBBS</h4>
                <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        <div class="item">
                <div class="courses-list"> <img src="images/thumb-4.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>Medicine MBBS</h4>
        <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        <div class="item">
                <div class="courses-list"> <img src="images/thumb-3.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>Master of Business</h4>
        <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        <div class="item">
                <div class="courses-list"> <img src="images/thumb-2.jpg" alt="" title="" />
                <div class="c-box-content">
                <h4>MBA</h4>
                <p>Harvard University<br>
        <span>Cambridge, USA</span></p>
        <a href="#" class="new-btn">View Universitiy</a> </div>
        </div>
        </div>
        </div>
        </div>
        </section>
        <section class="content content-padd">
                <div class="container text-center">
                <div class="text-box">
                <h4><span>Lorem Ipsum</span> is simply dummy text </h4>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        </div>
        </section>
        <section class="content gray-background text-center">
                <div class="container">
                <h1>application <span>process</span></h1>
                <div id="owl-demo" class="owl-carousel">
                <div class="item">
                <div class="courses-list"> <img src="images/icon-2.png" alt="" title="" />
                <div class="c-box-content">
                <h4>SOP</h4>
                <p>Statement of purpose</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                <div class="item">
                <div class="courses-list"> <img src="images/icon-2.png" alt="" title="" />
                <div class="c-box-content">
                <h4>LOR</h4>
                <p>Letter of recommendation</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                <div class="item">
                <div class="courses-list"> <img src="images/icon-3.png" alt="" title="" />
                <div class="c-box-content">
                <h4>Admission Essay</h4>
        <p>Essay writing</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                <div class="item">
                <div class="courses-list"> <img src="images/icon-4.png" alt="" title="" />
                <div class="c-box-content">
                <h4>Student CV</h4>
        <p>Curriculum vitae</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                <div class="item">
                <div class="courses-list"> <img src="images/icon-2.png" alt="" title="" />
                <div class="c-box-content">
                <h4>SOP</h4>
                <p>Statement of purpose</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                <div class="item">
                <div class="courses-list"> <img src="images/icon-2.png" alt="" title="" />
                <div class="c-box-content">
                <h4>LOR</h4>
                <p>Letter of recommendation</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                <div class="item">
                <div class="courses-list"> <img src="images/icon-3.png" alt="" title="" />
                <div class="c-box-content">
                <h4>Admission Essay</h4>
        <p>Essay writing</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                <div class="item">
                <div class="courses-list"> <img src="images/icon-4.png" alt="" title="" />
                <div class="c-box-content">
                <h4>Student CV</h4>
        <p>Curriculum vitae</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                <div class="item">
                <div class="courses-list"> <img src="images/icon-2.png" alt="" title="" />
                <div class="c-box-content">
                <h4>SOP</h4>
                <p>Statement of purpose</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                <div class="item">
                <div class="courses-list"> <img src="images/icon-2.png" alt="" title="" />
                <div class="c-box-content">
                <h4>LOR</h4>
                <p>Letter of recommendation</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                <div class="item">
                <div class="courses-list"> <img src="images/icon-3.png" alt="" title="" />
                <div class="c-box-content">
                <h4>Admission Essay</h4>
        <p>Essay writing</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                <div class="item">
                <div class="courses-list"> <img src="images/icon-4.png" alt="" title="" />
                <div class="c-box-content">
                <h4>Student CV</h4>
        <p>Curriculum vitae</p>
        <a href="#" class="new-btn">View</a> </div>
                </div>
                </div>
                </div>
                </div>
                </section>
                <section class="content text-center">
                <div class="container">
                <h1>Partner Universities</h1>
        <div id="owl-demo3" class="owl-carousel univers">
                <div class="item"> <a href="#"><img src="images/c-logo-1.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-2.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-3.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-4.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-5.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-1.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-2.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-3.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-4.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-5.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-1.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-2.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-3.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-4.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        <div class="item"> <a href="#"><img src="images/c-logo-5.png" alt="" title="" />
                <p>University Name</p>
        </a> </div>
        </div>
        </div>
        </section>
        <section class="content paralax-background text-center nopadd">
                <div class="parallax" style="background:url(images/paralax-img-2.jpg)"  data-stellar-background-ratio="0.25" data-stellar-vertical-offset="0">
                <div class="overlay-dark">
                <div class="container">
                <h1>We are in </h1>
        <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 circle-box">
                <div class="circle-icon">50</div>
                <h3>Countries</h3>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 circle-box">
                <div class="circle-icon blue-back-icon">2000</div>
                <h3>Universities</h3>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 circle-box">
                <div class="circle-icon">500</div>
                <h3>Courses</h3>
                </div>
                </div>
                </div>
                </div>
                </div>
                </section>


@endsection