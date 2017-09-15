@extends('layouts.master')

@section('scripts')
    <script type="text/javascript" src="{{asset('js/frontend/home.js')}}"></script>
    @endsection

@section('content')
<form id="pending_form" class="form-horizontal" method="POST">
    {{ csrf_field() }}

    <!--body-->
        <section class="commondiv top_gap gray">
            <div class="container">
                <div class="row">
                    <div class="commondiv">
                        <div class="common title text-center loginpopup">
                            <div class="common logindiv">
                                <h2>Sign Up</h2>
                                <label class="registration_label">Name</label>
                                <input name="name" id="name" type="text" placeholder="Enter Institution Name">

                                <label class="registration_label">Peson Name</label>
                                <input name="person_name" id="person_name" type="text" placeholder="Enter Your Name">

                                <label class="registration_label">E-mail</label>
                                <input name="email" id="email" type="email" placeholder="Enter Institution Email">

                                <label class="registration_label">Phone</label>
                                <input name="number"id="number" type="text" placeholder="Enter Institution Phone">

                                <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                <div class="common">
                                        <input name="" type="button" class="dark_but1 but_pending_registration" value="Sign Up">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--body-->
</form>

@endsection
