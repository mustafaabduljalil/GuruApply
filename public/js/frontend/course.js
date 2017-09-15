$(document).on('ready',function(){

    $('.about_course_btn').on('click',function(){
        var name = $('#about_course_form').find('input[name="name"]').val();
        var duration = $('#about_course_form').find('input[name="duration"]').val();
        var level = $('#level :selected').text();
        var description = $('#about_course_form').find('input[name="description"]').val();
        var token = $('#about_course_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/about_course',
            method:'post',
            data:{
                'name':name,
                'duration':duration,
                'level':level,
                'description':description,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        $("#about_course_form")[0].reset();
                        $('<input>').attr('type','hidden').attr('name','course_id').attr('value',response.id).appendTo('#fees_form');
                        $('<input>').attr('type','hidden').attr('name','course_id').attr('value',response.id).appendTo('#requirement_form');
                        $('<input>').attr('type','hidden').attr('name','course_id').attr('value',response.id).appendTo('#steps_form');
                        $('<input>').attr('type','hidden').attr('name','course_id').attr('value',response.id).appendTo('#placement_form');
                        $('<input>').attr('type','hidden').attr('name','course_id').attr('value',response.id).appendTo('#scholarship_form');
                        $('<input>').attr('type','hidden').attr('name','course_id').attr('value',response.id).appendTo('#course_student_guide_form');
                    }, 500);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });


    $('.fees_btn').on('click',function(){
        var first_fees = $('#fees_form').find('input[name="first_fees"]').val();
        var first_dollars = $('#fees_form').find('input[name="first_dollars"]').val();
        var first_indian = $('#fees_form').find('input[name="first_indian"]').val();
        var other_fees = $("input[name='other_fees[]']").map(function(){if($(this).val()){return $(this).val();}}).get();
        var other_dollars = $("input[name='other_dollars[]']").map(function(){if($(this).val()){return $(this).val();}}).get();
        var other_indian = $("input[name='other_indian[]']").map(function(){if($(this).val()){return $(this).val();}}).get();
        var description = $('#fees_form').find('textarea[name="description"]').val();
        var course_id = $('#fees_form').find('input[name="course_id"]').val();
        var token = $('#fees_form').find('input[name="_token"]').val();
        if(typeof (course_id) == "undefined"){
            toastr.error('Please create course! ','Error!');
            return false;
        }
        //Ajax Request to send data to controller

        console.log(first_fees+first_dollars+first_indian+other_fees+other_dollars+other_indian+description+course_id);
        $.ajax({
            url:'/course_fees',
            method:'post',
            data:{
                'first_fees':first_fees,
                'first_dollars':first_dollars,
                'first_indian':first_indian,
                'other_dollars':other_dollars,
                'other_indian':other_indian,
                'other_fees':other_fees,
                'description':description,
                'course_id':course_id,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    $("#fees_form")[0].reset();
                    toastr.success(response.msg,'Successful!');


                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });
    $(".add_requirement").on('click',function () {
        $( ".requirement_input:last" ).clone().appendTo( ".requirement_div" ).find('.reset').val('');

    });
    $('.requirement_btn').on('click',function(){

        var requirements = $("input[name='requirements[]']").map(function(){if($(this).val()){return $(this).val();}}).get();
        var course_id = $('#requirement_form').find('input[name="course_id"]').val();
        if(typeof (course_id) == "undefined"){
            toastr.error('Please create course! ','Error!');
            return false;
        }
        var token = $('#fees_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controllerrequirement_btn

        console.log(requirements+course_id);
        $.ajax({
            url:'/course_requirements',
            method:'post',
            data:{
                'requirements':requirements,
                'course_id':course_id,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    $(".steps_input").not(':first').remove();
                    $("#requirement_form")[0].reset();
                    toastr.success(response.msg,'Successful!');


                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });

    $(".add_step").on('click',function () {
        $( ".steps_input:last" ).clone().appendTo( ".steps_div" ).find('.reset').val('');
    });


    $('.steps_btn').on('click',function(){

        var numbers = $("input[name='step_number[]']").map(function(){if($(this).val()){return $(this).val();}}).get();
        var titles = $("input[name='step_title[]']").map(function(){if($(this).val()){return $(this).val();}}).get();
        var descriptions = $("textarea[name='step_description[]']").map(function(){if($(this).val()){return $(this).val();}}).get();
        var course_id = $('#steps_form').find('input[name="course_id"]').val();
        if(typeof (course_id) == "undefined"){
            toastr.error('Please create course! ','Error!');
            return false;
        }
        var token = $('#steps_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controllerrequirement_btn

        // console.log(+course_id);
        $.ajax({
            url:'/course_steps',
            method:'post',
            data:{
                'numbers':numbers,
                'titles':titles,
                'descriptions':descriptions,
                'course_id':course_id,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    $(".steps_input").not(':first').remove();
                    $("#steps_form")[0].reset();
                    toastr.success(response.msg,'Successful!');


                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });



    $('.placement_btn').on('click',function(){

        var sector = $('#placement_form').find('input[name="sector"]').val();
        var internship = $('#placement_form').find('input[name="internship"]').val();
        var average_salary = $('#placement_form').find('input[name="average_salary"]').val();
        var course_id = $('#placement_form').find('input[name="course_id"]').val();
        if(typeof (course_id) == "undefined"){
            toastr.error('Please create course! ','Error!');
            return false;
        }
        var token = $('#placement_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controllerrequirement_btn

        console.log(sector+internship+average_salary+course_id+token);

        // console.log(+course_id);
        $.ajax({
            url:'/course_placement',
            method:'post',
            data:{
                'internship':internship,
                'sector':sector,
                'average_salary':average_salary,
                'course_id':course_id,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    $("#placement_form")[0].reset();
                    toastr.success(response.msg,'Successful!');
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });




    $('.scholarship_btn').on('click',function(){

        var url_path = $('input[name="url_path"]').val();
        var course_id = $('#scholarship_form').find('input[name="course_id"]').val();
        if(typeof (course_id) == "undefined"){
            toastr.error('Please create course! ','Error!');
            return false;
        }
        var token = $('#scholarship_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        console.log(url_path+" "+token+" "+course_id);

        // console.log(+course_id);
        $.ajax({
            url:'/course_scholarship',
            method:'post',
            data:{
                'url_path':url_path,
                'course_id':course_id,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    $("#scholarship_form")[0].reset();
                    toastr.success(response.msg,'Successful!');
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });


    $('.course_student_guide_btn').on('click',function () {
        var course_id = $('#course_student_guide_form').find('input[name="course_id"]').val();
        var token = $('#course_student_guide_form').find('input[name="_token"]').val();

        if(typeof (course_id) == "undefined"){
            toastr.error('Please create course! ','Error!');
            $("#course_student_guide_form")[0].reset();
            return false;
        }

        var guides = [];
        $('#course_student_guide_form input[type="checkbox"]:checked').each(function(){
            guides.push($(this).val());
        });
        console.log(guides);
        $.ajax({
            url:'/course_student_guide',
            method:'post',
            data:{
                'guides':guides,
                'course_id':course_id,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    $("#course_student_guide_form")[0].reset();
                    toastr.success(response.msg,'Successful!');
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });







    });


    $('.course_btn').on('click',function () {

        var id = $(this).attr('id');
        $('.course_div').hide();
        $('.'+id).slideDown('slow').css('margin-top','15px');

    });




// Get the image and insert it inside the modal - use its "alt" text as a caption
    $(".open_image").on('click',function(){
        var modal = document.getElementById('myModal');
        // var img = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");
        // var captionText = document.getElementById("caption");
        // img.onclick = function(){
        var src = $(this).find('img:first').attr('src');
        console.log(src);
            modal.style.display = "block";
            modalImg.src = src;
            // captionText.innerHTML = this.alt;
        // }
        $('.top-bar, .header-main').css('display','none');

// Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
            $('.top-bar, .header-main').css('display','block');
        }


    });

    $(document).ready(function(){
        $('.venobox_custom').venobox();
    });


    // $( "#countries" ).clone().appendTo( "#course_country" );

    // $('#country').on('change', function() {
    //     var country = this.value ;
    //     alert(country);
    //     alert($('#countries')).val();
    //     $('#countries').append('<span>country,</span>');
    // })

    $('.download-brochure').on('click',function () {
        setTimeout(function() {
            $("#about_user_form")[0].reset();
        }, 500);

    });


    // <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />

});