@extends('layouts.master')
@section('title')
    Contact Us
@endsection


@section('content')

    <!--body-->
    <section class="commondiv top_gap gray">
        <div class="container">
            <div class="row">
                <div class="commondiv">
                    <div class="commondiv title text-center">
                        <h1>Contact <span>Us</span></h1>
                    </div>
                    <div class="commondiv text-center">
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 center_div">
                            <div class="commondiv text-center addre">
                                <div class="address_area">
                                    <h6>Address</h6>
                                    <p>Lorem Ipsum is simply dummy text <br>
                                        of the printing and typesetting <br>
                                        industry. Lorem Ipsum</p>
                                    <h6>Call Us</h6>
                                    <p>+91 033 022 04456 / 044 044 05565</p>
                                    <h6>Email Us</h6>
                                    <p>dummy@gmail.com / abcd@gmail.com</p>
                                </div>
                                <div class="commondiv blockform contact_form">
                                    <h6>GET IN TOUCH</h6>
                                    <table class="commondiv small_bol">
                                        <tbody>
                                        <tr>
                                            <td width="50%"><input name="" type="text" placeholder="Enter Your Name"></td>
                                            <td width="50%"><input name="" type="email" placeholder="Enter Email"></td>
                                        </tr>
                                        <tr>
                                            <td><input name="" type="text" placeholder="Enter Phone No"></td>
                                            <td><input name="" type="text" placeholder="Enter Subject"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><textarea name="" cols="" rows="" placeholder="Enter Message"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="commondiv small_pad small_mar"><a href="#" class="btn">Send Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--body-->








@endsection