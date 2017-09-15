$(document).on('ready',function(){
    //Pending registration of institution
    $('.but_pending_registration').on('click',function(){
        var personName = $('#pending_form').find('input[name="person_name"]').val();
        var institutionName = $('#pending_form').find('input[name="name"]').val();
        var institutionEmail = $('#pending_form').find('input[name="email"]').val();
        var institutionPhone = $('#pending_form').find('input[name="number"]').val();
        var token = $('#pending_form').find('input[name="_token"]').val();
        console.log(personName,institutionName,institutionEmail,institutionPhone,token);
        //Ajax Request to send data to controller
        $.ajax({
            url:'/pending_institution',
            method:'post',
            data:{'person_name':personName,
                'institution_name':institutionName,
                'institution_email':institutionEmail,
                'institution_phone':institutionPhone,
                '_token':token
            },
            success:function (response) {
                if(response.status == "success"){
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

    $("#countries").select2();



});
