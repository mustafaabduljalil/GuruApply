$(document).on('ready',function () {

    for (i = new Date().getFullYear(); i > 1900; i--)
    {
        $('#completion_year').append($('<option />').val(i).html(i));
    }


    $('.personal_student_btn').on('click',function(){
        var name = $('#student_personal_form').find('input[name="name"]').val();
        var father_name = $('#student_personal_form').find('input[name="father_name"]').val();
        // var visibility = $('input[name=visibility]:checked');
        var phone = $('#student_personal_form').find('input[name="phone"]').val();
        var email = $('#student_personal_form').find('input[name="email"]').val();
        var country = $( "#country option:selected" ).text();
        var city = $( "#state option:selected" ).text();
        var date_of_birth = $('#student_personal_form').find('input[name="date_of_birth"]').val();
        // var about = $('#student_personal_form').find('input[name="about"]').val();
        var passport = $('#student_personal_form').find('textarea[name="passport"]').val();
        var address = $('#student_personal_form').find('input[name="address"]').val();
        var token = $('#student_personal_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/update_personal_student',
            method:'post',
            data:{
                'name':name,
                'father_name':father_name,
                'phone':phone,
                // 'visibility':visibility,
                'email':email,
                'country':country,
                'city':city,
                'date_of_birth':date_of_birth,
                'about':about,
                'bio':bio,
                'address':address,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        $("#student_personal_form")[0].reset();
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



    $('.educational_student_btn').on('click',function(){
        var university_name = $('#student_educational_form').find('input[name="university_name"]').val();
        var degree = $('#student_educational_form').find('input[name="degree"]').val();
        var mark = $('#student_educational_form').find('input[name="mark"]').val();
        var specialization = $('#student_educational_form').find('input[name="specialization"]').val();
        var course_level = $( "#level option:selected" ).text();
        var year = $( "#completion_year option:selected" ).text();
        var student_id = $('#student_educational_form').find('input[name="student_id"]').val();
        var city = $('#student_educational_form').find('input[name="city"]').val();
        var token = $('#student_educational_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/update_educational_student',
            method:'post',
            data:{
                'university_name':university_name,
                'degree':degree,
                'mark':mark,
                'specialization':specialization,
                'course_level':course_level,
                'year':year,
                'student_id':student_id,
                'city':city,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        $("#student_educational_form")[0].reset();
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




    $('.preferences_btn').on('click',function(){
        var current_country = $('input[name=current_country]:checked').val();
        var level = $('#preferences_form').find('input[name="level"]').val();
        var specialization = $('#preferences_form').find('input[name="specialization"]').val();
        var educational_interest = $( "#educational_interest option:selected" ).text();
        var country_interest = $( "#country_interest option:selected" ).text();
        var student_id = $('#preferences_form').find('input[name="student_id"]').val();
        var budget = $('#preferences_form').find('input[name="budget"]').val();
        var source_of_funding = $('#preferences_form').find('input[name="source_of_funding"]').val();
        var extra_activities = $('#preferences_form').find('textarea[name="extra_activities"]').val();
        var special_considerations = $('#preferences_form').find('textarea[name="special_considerations"]').val();
        var competitive_exam = $('input[name=competitive_exam]:checked').val();
        var passport = $('input[name=passport]:checked').val();
        var token = $('#preferences_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/update_preferences_student',
            method:'post',
            data:{
                'current_country':current_country,
                'country_interest':country_interest,
                'level':level,
                'specialization':specialization,
                'educational_interest':educational_interest,
                'student_id':student_id,
                'source_of_funding':source_of_funding,
                'extra_activities':extra_activities,
                'special_considerations':special_considerations,
                'competitive_exam':competitive_exam,
                'passport':passport,
                'budget':budget,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        $("#student_educational_form")[0].reset();
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


    $("#add_more_course").on('click',function () {
        $( ".student_course" ).last().clone().appendTo( ".parent_div_course" ).find('.reset').val('');
    });

    $("#add_more_job").on('click',function () {
        $( ".student_job" ).last().clone().appendTo( ".parent_div_job" ).find('.reset').val('');
    });


    $("#more_exam").on('click',function () {
            $( ".student_exam" ).last().clone().appendTo( ".parent_div_exam" ).find('.reset').val('');
    });

    $(".change_password_btn").on('click',function () {
        var old_pasword = $('#change_password').find('input[name="old_password"]').val();
        var new_pasword = $('#change_password').find('input[name="password"]').val();
        var re_password = $('#change_password').find('input[name="confirm_password"]').val();
        var student_id = $('#change_password').find('input[name="student_id"]').val();
        var token = $('#change_password').find('input[name="_token"]').val();
        $.ajax({
            
            url:'/change_password',
            type:'post',
            data:{
                'old_password':old_pasword,
                'password':new_pasword,
                're_password':re_password,
                'student_id':student_id,
                '_token':token,
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        $("#student_personal_form")[0].reset();
                    }, 500);
                }else{
                    toastr.error(response.msg , 'Error');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
            
            
        });
    });



    $(".student_job_btn").on('click',function () {
        var position = $('#student_work_experience').find('input[name="position"]').val();
        var company = $('#student_work_experience').find('input[name="company"]').val();
        var start_year = $( "#start_year option:selected" ).text();
        var end_year = $( "#end_year option:selected" ).text();
        if(start_year == '' && end_year == ''){
            var start_year = $( "#start option:selected" ).text();
            var end_year = $( "#end option:selected" ).text();

        }
        console.log(start_year + ' ' + end_year);
        var description = $('#student_work_experience').find('input[name="description"]').val();
        var student_id = $('#student_work_experience').find('input[name="student_id"]').val();
        var job_id = $('#student_work_experience').find('input[name="job_id"]').val();
        var token = $('#student_work_experience').find('input[name="_token"]').val();

        $.ajax({

            url:'/student_job',
            type:'post',
            data:{
                'position':position,
                'company':company,
                'start_year':start_year,
                'end_year':end_year,
                'description':description,
                'student_id':student_id,
                'job_id':job_id,
                '_token':token,
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        $("#student_personal_form")[0].reset();
                    }, 500);
                }else{
                    toastr.error(response.msg , 'Error');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },


        });
    });

    for (i = new Date().getFullYear(); i > 1900; i--)
    {
        $('#start_year').append($('<option />').val(i).html(i));
        $('#end_year').append($('<option />').val(i).html(i));
        $('#start').append($('<option />').val(i).html(i));
        $('#end').append($('<option />').val(i).html(i));
    }
});