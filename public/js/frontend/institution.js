$(document).on('ready',function(){



    $('#logo-btn').on('click',function(){
        var name = $('#logo_form').find('input[name="name"]').val();
        var logo = $('#logo_form').find('input[name="logo"]').val();
        var token = $('#logo_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/institution_logo',
            method:'post',
            data:{'logo':logo,
                'name':name,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });

    $('.brochure-btn').on('click',function(){
        var values = $('input:checkbox:checked.brochures').map(function () {
            return this.value;
        }).get();
        var token = $('#remove_brochure').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        console.log(values);
        $.ajax({
            url:'/remove_brochure',
            method:'post',
            data:{'values':values,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });



    $('.remove-media-btn').on('click',function(){
        var values = $('input:checkbox:checked.remove_media').map(function () {
            return this.value;
        }).get();
        var token = $('#remove_brochure').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        console.log(values);
        $.ajax({
            url:'/remove_multimedia',
            method:'delete',
            data:{'values':values,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });

    $(".video-media").on('click',function(){

        var src = $(this).find('source').attr('src');
    console.log(src);
        $("#video-modal").find('.iframe').attr('src',src);

    });
    

    $('.contact_details_btn').on('click',function(){
        var name = $('#contact_details_form').find('input[name="name"]').val();
        var email = $('#contact_details_form').find('input[name="email"]').val();
        var address = $('#contact_details_form').find('textarea[name="address"]').val();
        var phone = $('#contact_details_form').find('input[name="phone"]').val();
        var website = $('#contact_details_form').find('input[name="website"]').val();
        var token = $('#contact_details_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/contact_details_updates',
            method:'post',
            data:{'name':name,
                'email':email,
                'phone':phone,
                'address':address,
                'website':website,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });

    });

    $('.affiliation_btn').on('click',function(){
        var affiliation = $('#affiliation_form').find('textarea[name="affiliation"]').val();
        var token = $('#affiliation_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/affiliation_updates',
            method:'post',
            data:{'affiliation':affiliation,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });

    $('.accreditation_btn').on('click',function(){
        var accreditation = $('#accreditation_form').find('textarea[name="accreditation"]').val();
        var token = $('#accreditation_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/accreditation_updates',
            method:'post',
            data:{'accreditation':accreditation,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });
    
    $('.year_of_establishment_btn').on('click',function(){
        var year_of_establishment = $('#year_of_establishment_form').find('input[name="year_of_establishment"]').val();
        var token = $('#year_of_establishment_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/year_of_establishment_updates',
            method:'post',
            data:{'year_of_establishment':year_of_establishment,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });

    $('.number_of_students_btn').on('click',function(){
        var number_of_Student = $('#number_of_Students_form').find('input[name="number_of_Student"]').val();
        var token = $('#number_of_Students_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/number_of_Student_updates',
            method:'post',
            data:{'number_of_Student':number_of_Student,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });


    $('#public_btn').on('click',function(){
        var public = $('input[name="public"]:checked', '#university_public').val();
        var token = $('#university_public').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        console.log(public);
        $.ajax({
            url:'/university_public',
            method:'post',
            data:{'public':public,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });




    $('#scholarship_btn').on('click',function(){
        var scholarship = $('input[name="scholarship"]:checked', '#scholarship_form').val();
        var token = $('#university_public').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        console.log(scholarship);
        $.ajax({
            url:'/institution_scholarship',
            method:'post',
            data:{'scholarship':scholarship,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });

    $('.eligibility-btn').on('click',function(){
        var education = $("#eligibility_form").find('input[name="education"]').val();
        var mark = $("#eligibility_form").find('input[name="mark"]').val();
        var token = $('#eligibility_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
    console.log(education + mark);
        $.ajax({
            url:'/basic_eligibility',
            method:'post',
            data:{'education':education,
                'mark':mark,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });


    $('.country-btn').on('click',function(){
        var country = $( "#country_select option:selected" ).text();;
        var token = $('#country_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/institution_country',
            method:'post',
            data:{'country':country,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });

    $('.profile-btn').on('click',function(){
        var profile = $('#profile_form').find('textarea[name="profile"]').val();
        var token = $('#profile_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/institution_profile',
            method:'post',
            data:{'profile':profile,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });


    $('.accommodation-btn').on('click',function(){
        var accommodation_details = $('#accommodation_form').find('textarea[name="accommodation_details"]').val();
        var token = $('#accommodation_form').find('input[name="_token"]').val();
        //Ajax Request to send data to controller
        $.ajax({
            url:'/institution_accommodation',
            method:'post',
            data:{'accommodation_details':accommodation_details,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
                    toastr.success(response.msg,'Successful!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }else{
                    toastr.error('Ops there is something wrong ! ','Error!');
                }
            },
            error:function () {
                toastr.error('Ops there is something wrong ! ','Error' );
            },
        });
    });



});