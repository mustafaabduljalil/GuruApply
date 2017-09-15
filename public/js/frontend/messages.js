$('.message_btn').on('click',function(){
    var name = $('#message_form').find('input[name="name"]').val();
    var email = $('#message_form').find('input[name="email"]').val();
    var phone = $('#message_form').find('input[name="phone"]').val();
    var subject = $('#message_form').find('input[name="subject"]').val();
    var content = $('#message_form').find('textarea[name="content"]').val();
    var recipient_id = $('#message_form').find('input[name="recipient_id"]').val();
    var token = $('#message_form').find('input[name="_token"]').val();

    //Ajax Request to send data to controller

    // console.log(first_fees+first_dollars+first_indian+other_fees+other_dollars+other_indian+description+course_id);
    $.ajax({
        url:'/send_message',
        method:'post',
        data:{
            'name':name,
            'email':email,
            'phone':phone,
            'subject':subject,
            'content':content,
            'recipient_id':recipient_id,
            '_token':token
        },
        success:function (response) {
            if(response.status == "success"){
                $("#message_form")[0].reset();
                toastr.success(response.msg,'Thank You!');


            }else{
                toastr.error('Ops there is something wrong ! ','Error!');
            }
        },
        error:function () {
            toastr.error('Ops there is something wrong ! ','Error' );
        },
    });
});