@extends('layouts.master')

@section('content')

    <!--body-->
    <section class="commondiv top_gap gray">
        <div class="container">
            <div class="row">
                <div class="commondiv">
                    <div class="common title text-center loginpopup">
                        <div class="common logindiv">
                            <h2>Sign In</h2>
                            <form id="myForm" method="post" action="{{route('login')}}">
                                {{csrf_field()}}
                                <input name="email" class="form-control" id="email" type="email" placeholder="Enter Your Email">
                                @if($errors->has('email'))
                                    <span>{{ $errors->first('email') }}</span>
                                @endif
                                <input name="password" class="form-control" id="password" type="password" placeholder="Enter Your Password">
                                @if($errors->has('password'))
                                    <span>{{ $errors->first('password') }}</span>
                                @endif
                                <div class="common">
                                    <input type="submit" class="dark_but1 but_login" value="Sign In">
                                </div>
                                <div class="common signwith">
                                    <a class="loginBtn loginBtn--facebook">
                                        Login with Facebook
                                    </a>
                                </div>

                                <div class="common forgot"> <a href="{{ route('password.request') }}">Forgot Password?</a> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--body-->

    @include('vendor.lrgt.ajax_script', ['form' => '#myForm',
    'request'=>'App/Http/Requests/loginRequest','on_start'=>true])

@endsection

{{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}