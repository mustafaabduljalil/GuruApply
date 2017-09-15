<?php

namespace App\Http\Controllers;

use App\Brochure;
use App\Course;
use App\CourseBrochure;
use App\CourseExams;
use App\CourseFees;
use App\CourseGuide;
use App\CoursePlacement;
use App\CourseRequirement;
use App\CourseScholarship;
use App\CourseSector;
use App\CourseStep;
use App\CourseStudentGuide;
use App\Institution;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\File;


class courseController extends Controller
{
    //
    public function __construct()
    {

    }


    public function aboutCourse(Request $request)
    {
        $name = $request->name;
        $duration = $request->duration;
        $level = $request->level;
        $description = $request->name;
        $institution_id = Institution::where('user_id',Auth::user()->id)->value('id');
        $new_course = new Course();
        $new_course->name = $name;
        $new_course->description = $description;
        $new_course->level = $level;
        $new_course->duration = $duration;
        $new_course->institution_id = $institution_id;
        $new_course->save();

        $course_id = $new_course->id;

//        Course::create(['name'=>$name,'duration'=>$duration,'level'=>$level,'description'=>$description,'institution_id'=>$institution_id,'views'=>0]);

        return response()->json(['status' => 'success', 'msg' => 'Course has been created','id'=>$course_id]);

    }

    public function courseFees(Request $request)
    {
        $first_fees = $request->first_fees;
        $first_dollars = $request->first_dollars;
        $first_indian = $request->first_indian;
        $first_type = "first";
        $other_fees = $request->other_fees;
        $other_dollars = $request->other_dollars;
        $other_indian = $request->other_indian;
        $other_type = "other";
        $description = $request->description;

        $course_id = $request->course_id;



        CourseFees::create([
            'course_id'=>$course_id,
            'fees'=>$first_fees,
            'fees_amount_dollar'=>$first_dollars,
            'fees_amount_indian'=>$first_indian,
            'type'=>$first_type,
            'description'=>$description
        ]);

        for ($i=0;$i<count($other_fees);$i++){
            CourseFees::create([
                'course_id'=>$course_id,
                'fees'=>$other_fees[$i],
                'fees_amount_dollar'=>$other_dollars[$i],
                'fees_amount_indian'=>$other_indian[$i],
                'type'=>$other_type
            ]);
        }


        CourseFees::where('course_id',$course_id)->sum('fees_amount_indian');

        return response()->json(['status' => 'success', 'msg' => 'Fees has been created']);


    }

    public function courseRequirements(Request $request)
    {
        $requirements = $request->requirements;
        $course_id = $request->course_id;
        for ($i=0;$i<count($requirements);$i++){
            CourseRequirement::create([
                'course_id'=>$course_id,
                'description'=>$requirements[$i],
            ]);
        }
        return response()->json(['status' => 'success', 'msg' => 'Requirements has been created']);

    }

    public function courseSteps(Request $request)
    {
        $numbers = $request->numbers;
        $title = $request->titles;
        $descriptions = $request->descriptions;
        $course_id = $request->course_id;
//        dd($descriptions);
        for ($i=0;$i<count($numbers);$i++){
            CourseStep::create([
                'step_number'=>$numbers[$i],
                'title'=>$title[$i],
                'course_id'=>$course_id,
                'description'=>$descriptions[$i],
            ]);
        }
        return response()->json(['status' => 'success', 'msg' => 'Steps has been created']);

    }


    public function coursePlacement(Request $request)
    {
        $sector = $request->sector;
        $internship = $request->internship;
        $average_salary = $request->average_salary;
        $course_id = $request->course_id;
//        dd($descriptions);
            CoursePlacement::create([
                'sector'=>$sector,
                'internship'=>$internship,
                'average_salary'=>$average_salary,
                'course_id'=>$course_id
            ]);

        return response()->json(['status' => 'success', 'msg' => 'Placement has been created']);

    }


    public function courseScholarship(Request $request)
    {
        $url = $request->url_path;
        $course_id = $request->course_id;
//        dd($descriptions);
            CourseScholarship::create([
                'url'=>$url,
                'course_id'=>$course_id
            ]);
        return response()->json(['status' => 'success', 'msg' => 'Scholarship has been created']);
    }

    public function courseStudentGuide(Request $request)
    {
        $guides = $request->guides;
        $course_id = $request->course_id;

        for ($i = 0 ; $i < count($guides) ; $i++){
            $course_guide = new CourseGuide();
            $course_guide->course_id = $course_id;
            $course_guide->guide_id = $guides[$i];
            $course_guide->save();
        }



//        $title = $request->title;
//        $description = $request->description;
//        $subtitle = $request->subtitle;
//        $subdescription = $request->subdescription;
//        $guide_file = $request->guide_file;
//        $file_path = $request->file('image')->store('/uploads/studentGuide/images');
//        $file = new file();
//        $file->path = $request->file('guide_file')->store('/upload/studentGuide/doc');
//        $file->save();
//
//        CourseStudentGuide::create([
//            'title'=>$title,
//            'sub_title'=>$subtitle,
//            'description'=>$description,
//            'main_title'=>$main_title,
//            'sub_description'=>$subdescription,
//            'course_id'=>$course_id,
//            'image_id'=>$file->id,
//            'file_id'=>$guide_file
//        ]);

        return response()->json(['status' => 'success', 'msg' => 'Student Guide has been added']);


    }

    public function studentGuide ($id)
    {
        $guides_id = CourseGuide::where('course_id',$id)->pluck('guide_id');
        $guides = CourseStudentGuide::whereIn('id',$guides_id)->get();
        $institution_id = Course::where('id',$id)->value('institution_id');
        $related_courses_ids = Course::where('institution_id',$institution_id)->pluck('id');
        $related_guides_ids = CourseGuide::whereIn('course_id',$related_courses_ids)->whereNotIn('guide_id',$guides_id)->pluck('guide_id');
        $related_guides = CourseStudentGuide::whereIn('id',$related_guides_ids)->get();
        $popular_guides = CourseStudentGuide::whereNotIn('id',$related_guides_ids)->whereNotIn('id',$guides_id) ->get();
        return view('guide',compact('guides','related_guides','popular_guides'));
    }


    public function getCourse($course_id)
    {
//        dd($course_id);
        $course = Course::with('fees','requirements','steps','placement','sholarships')->where('id',$course_id)->first();
        $total_other_fees = CourseFees::where('course_id',$course->id)->where('type','other')->sum('fees_amount_indian');
        $total_fees = CourseFees::where('course_id',$course->id)->sum('fees_amount_indian');
        DB::table('courses')->where('id',$course_id)->increment('views');
//        dd($course->institution->exams[0]->name);
//
        
        return view('course.profile',compact('course','total_other_fees','total_fees'));
    }

    public function downloadBrochure(Request $request)
    {
        $study_abroad = $request->study_abroad;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $personal_country = $request->personal_country;
        $title = $request->title;
        $dest_country = $request->dest_country;
        $personal_city = $request->personal_city;
        $exams = $request->exam_checkbox;
        $scores = $request->exam_score;
        $edu_country = $request->educational_country;
        $edu_city = $request->educational_city;
        $stream = $request->stream;
        $experience = $request->experience;
        $marks = $request->marks;
        $institution_id = $request->course_id;


        $new_download = new CourseBrochure();
        $new_download->name = $name;
        $new_download->email = $email;
        $new_download->phone = $phone;
        $new_download->title = $title;
        $new_download->personal_country = $personal_country;
        $new_download->personal_city = $personal_city;
        $new_download->educational_country = $edu_country;
        $new_download->educational_city = $edu_city;
        $new_download->stream = $stream;
        $new_download->marks = $marks;
        $new_download->desc_country = $dest_country;
        $new_download->experience = $experience;
        $new_download->studey_abroad = $study_abroad;
        $new_download->institution_id = $institution_id;
        $new_download->save();

        for($i=0;$i<count($exams);$i++)
        {
            $new_exam = new CourseExams();
            $new_exam->exam = $exams[$i];
            $new_exam->mark = $scores[$i];
            $new_exam->course_vrochure_id = $new_download->id;
            $new_exam->save();

        }

        $file_id = Brochure::where('institution_id',$institution_id)->value('file_id');
        $file_path = File::where('id',$file_id)->value('path');

        return response()->download($file_path);

    }

}
