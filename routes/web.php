<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::post('/reg',function(){
    dd("Aaa");
})->name('/reg');
Auth::routes();
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('/pending_institution','institutionController@pendingInstitution');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'aboutController@index')->name('about');
Route::get('/contact', 'contactController@index')->name('contact');
//Route::get('search','searchController@results')->name('search');
Route::get('/search',function (){

    return view('search.search');

});

///////Institution routes////////////

Route::group(['middleware'=>'auth'],function (){

    ////////////////////////Institutions Routes////////////////////////////
    Route::get('/institution','institutionController@getProfile')->name('institution');
    Route::post('/contact_details_updates','institutionController@contactDetailsUpdates')->name('contact_details_updates');
    Route::post('/affiliation_updates','institutionController@affiliationUpdates')->name('affiliation_updates');
    Route::post('/accreditation_updates','institutionController@accreditationUpdates')->name('accreditation_updates');
    Route::post('/number_of_Student_updates','institutionController@studentsNumberUpdates')->name('number_of_Student_updates');
    Route::post('/year_of_establishment_updates','institutionController@yearOfEstablishmentUpdates')->name('year_of_establishment_updates');
    Route::post('/university_public','institutionController@universityPublic')->name('university_public');
    Route::post('/institution_scholarship','institutionController@scholarship')->name('institution_scholarship');
    Route::post('/basic_eligibility','institutionController@basicEligibility')->name('basic_eligibility');
    Route::post('/institution_country','institutionController@institutionCountry')->name('institution_country');
    Route::post('/institution_profile','institutionController@institutionProfile')->name('institution_profile');
    Route::post('/institution_accommodation','institutionController@institutionAccommodation')->name('institution_accommodation');
    Route::post('/institution_logo','institutionController@institutionLogo')->name('institution_logo');
    Route::post('/upload_brochure','institutionController@uploadBrochure')->name('upload_brochure');
    Route::post('/remove_brochure','institutionController@removeBrochure')->name('remove_brochure');
    Route::post('/upload_multimedia','institutionController@uploadMultimedia')->name('upload_multimedia');
    Route::delete('/remove_multimedia','institutionController@removeMultimedia')->name('remove_multimedia');

    ////////////////////////Courses Routes//////////////////////////////
    Route::post('/about_course','courseController@aboutCourse')->name('about_course');
    Route::post('/course_fees','courseController@courseFees')->name('course_fees');
    Route::post('/course_requirements','courseController@courseRequirements')->name('course_requirements');
    Route::post('/course_steps','courseController@courseSteps')->name('course_steps');
    Route::post('/course_placement','courseController@coursePlacement')->name('course_placement');
    Route::post('/course_scholarship','courseController@courseScholarship')->name('course_scholarship');
    Route::post('/course_student_guide','courseController@courseStudentGuide')->name('course_student_guide');


    ////////////////////////Student Routes//////////////////////////////
    Route::get('/student','studentController@getProfile')->name('student');
    Route::post('/update_personal_student','studentController@updatePersonal')->name('update_personal_student');
    Route::post('/update_educational_student','studentController@updateEducational')->name('update_educational_student');
    Route::post('/update_preferences_student','studentController@updatePreferences')->name('update_preferences_student');
    Route::post('/change_password','studentController@changePassword')->name('change_password');
    Route::post('/student_job','studentController@jobs')->name('jobs');


});

Route::get('/course/{id}','courseController@getCourse')->name('course');
Route::get('/download_brochure/{id}','institutionController@downloadBrochure')->name('download_brochure');






///////////////////Collection of send message and subscription//////////////////////////////
Route::get('/filter','searchController@filter')->name('filter');
Route::get('/{id}','institutionController@getInstitutionPage')->name('institution_page');
Route::post('/send_message','messagesController@sendMessage')->name('send_message');
Route::get('/search','searchController@getResults')->name('search');
Route::get('/get_student_guides/{id}','courseController@studentGuide')->name('get_student_guide');
Route::post('/subscription','subscriptionController@subscription')->name('subscription');
Route::post('/download_brochure','courseController@downloadBrochure')->name('download_brochure');


/////////////////////////Wessam routes//////////////////////////////////////////
