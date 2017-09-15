 
/////////////////////////script
  
// $(window).load(function() {
//    
//    $('.flexslider').flexslider({
//        animation: "slide",
//		slideshowSpeed: 5000,
//		animationSpeed: 2000, 
//        controlNav: true,
//		direction:"vertical"
//    });
//});


/////////////////////////script

$(".scroll-arrow[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});

/////////////////////////script

 $(document).ready(function(){
            var submitIcon = $('.searchbox-icon');
            var inputBox = $('.searchbox-input');
            var searchBox = $('.searchbox');
            var isOpen = false;
            submitIcon.click(function(){
                if(isOpen == false){
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
             submitIcon.mouseup(function(){
                    return false;
                });
            searchBox.mouseup(function(){
                    return false;
                });
            $(document).mouseup(function(){
                    if(isOpen == true){
                        $('.searchbox-icon').css('display','block');
                        submitIcon.click();
                    }
                });
        });
            function buttonUp(){
                var inputVal = $('.searchbox-input').val();
                inputVal = $.trim(inputVal).length;
                if( inputVal !== 0){
                    $('.searchbox-icon').css('display','none');
                } else {
                    $('.searchbox-input').val('');
                    $('.searchbox-icon').css('display','block');
                }
            }
			
/////////////////////////script
			
			$(".click-arrow").click(function() {
        $("html, body").animate({
            scrollTop: $("#courses-section").offset().top - 80
        }, 500)

                




});

/////////////////////////script

/*$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 300) {
        $(".navbar-header").addClass("stick");
    } else {
		$(".navbar-header").removeClass("stick");
    }
});*/

/////////////////////////script



$(document).on('ready',function () {
   $('#subscription_btn').on('click',function () {
     var email = $('#subscription_form').find('input[name="subscription_email"]').val();
     var token = $('#subscription_form').find('input[name="_token"]').val();
console.log(email)
       $.ajax({
           url:'/subscription',
           method:'post',
           data:{
               'email':email,
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

       $("#subscription_form")[0].reset();


   });
});