$(document).ready(function () {
    size_div = $(".searchres .university_load").size();
    x=5;
    $('.searchres .university_load:lt('+x+')').show();
    if(x >= size_div){
        $("#load_more_universities").remove();
    }
    $('#load_more_universities').click(function () {
        x= (x+5 <= size_div) ? x+5 : size_div;

        $('.searchres .university_load:lt('+x+')').show();
    });
    // $('#showLess').click(function () {
    //     x=(x-5<0) ? 3 : x-5;
    //     $('#myList li').not(':lt('+x+')').hide();
    // });


    course_div = $(".searchres .course_load").size();
    y=3;
    $('.searchres .course_load:lt('+y+')').show();
    $('#load_more_courses').click(function () {
        y= (y+5 <= course_div) ? y+5 : course_div;
        if(y >= course_div){
            $(this).remove();
        }
        console.log(y);
        $('.searchres .course_load:lt('+y+')').show();
    });

});