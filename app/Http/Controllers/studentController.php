<?php

namespace App\Http\Controllers;

use App\EducationPreference;
use App\Student;
use App\File;
use App\StudentDegree;
use App\StudentEducation;
use App\StudentExam;
use App\StudentJob;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Hash;


class studentController extends Controller
{
    //

    public function getProfile()
    {
        if(Auth::user()->type == "student") {

            $student = Student::with('course','jobs','studentExam','studentEducation','studentDegree')->where('user_id',Auth::user()->id)->first();
            foreach ($student->course as $course){
//                dd($course->name);

            }
            return view('student.profile',compact('student'));
        }
        else
            return redirect('/');
    }

    public function updatePersonal(Request $request)
    {
//        dd($request->all());
        $student = Student::where('user_id',Auth::user()->id)->first();
        $old_country = $student->country;
        $old_city = $student->city;
        $image_id = $student->image_id;
        $doc_id = $student->file_id;
        $name = $request->name;
        $visibility = $request->visibility;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $father_name = $request->father_name;
        $country = ($request->country == "Select country" ? $old_country : $request->country);
        $city = ($request->city == "-" ? $old_city : $request->city);
//        $bio = $request->bio;
//        $about = $request->about;
        $date_of_birth = $request->date_of_birth;
        $passport_number = $request->passport_number;
        if($request->file('personal_file')) {
            $doc_path = $request->file('personal_file')->store('/uploads/student/docs');
            $doc = new File();
            $doc->path = $doc_path;
            $doc->save();
            $doc_id = $doc->id;

        }
        if($request->file('image_profile')) {
            $image_path = $request->file('image_profile')->store('/uploads/student/profile');
            $image = new File();
            $image->path = $image_path;
            $image->save();
            $image_id = $image->id;
        }

        Student::where('user_id',Auth::user()->id)->update(['name'=>$name,'passport_number'=>$passport_number,'phone'=>$phone,
        'address'=>$address,'email'=>$email,'country'=>$country,'file_id'=>$doc_id,'image_id'=>$image_id,'city'=>$city,'father_name'=>$father_name,'date_of_birth'=>$date_of_birth,'visibility'=>$visibility
        ]);


        return back();
    }



    public function updateEducational(Request $request)
    {

//        dd($request->all());
        $student_id = $request->student_id;
        $k = 0;
        for ($i = 0 ; $i < count($request->class) ; $i++){
            if(empty ($request->class_id[$i])) {
                $j = 0;
                $new_class = new StudentEducation();
                $new_class->class = $request->class[$i];
                if($j == 0)
                    $new_class->degree_method = $request->degree_type1;
                else
                    $new_class->degree_method = $request->degree_type2;

                $new_class->mark = $request->mark[$i];
                $new_class->student_id = $student_id;
                $new_class->save();
            }else{
                if($k == 0) {
                    $class = StudentEducation::where('id', $request->class_id[$i])->update([
                        'class' => $request->class[$i],
                        'degree_method' => $request->degree_type1,
                        'mark' => $request->mark[$i]
                    ]);
                    $k = 1;
                }else{
                    $class = StudentEducation::where('id', $request->class_id[$i])->update([
                        'class' => $request->class[$i],
                        'degree_method' => $request->degree_type2,
                        'mark' => $request->mark[$i]
                    ]);
                }
            }

        }

        for ($i = 0 ; $i < count($request->course_name) ; $i++){
            
            if(empty ($request->degree_id[$i])) {

                $new_degree = new StudentDegree();
                $new_degree->level = $request->course_level[$i];
                $new_degree->name = $request->course_name[$i];
                $new_degree->specialization = $request->specialization[$i];
                $new_degree->institution_name = $request->institution_name[$i];
                $new_degree->start_date = $request->start[$i];
                $new_degree->end_date = $request->end[$i];
                $new_degree->marks = $request->marks[$i];
                $new_degree->student_id = $student_id;
                $new_degree->save();
            }else{
                $degree = StudentDegree::where('id',$request->degree_id[$i])->update([
                   'level'=>$request->course_level[$i], 
                   'name'=>$request->course_name[$i], 
                   'specialization'=>$request->specialization[$i], 
                   'institution_name'=>$request->institution_name[$i], 
                   'start_date'=>$request->start[$i], 
                   'end_date'=>$request->end[$i],
                   'marks'=>$request->marks[$i],
                ]);
//                dd($degree);

            }
        }

        for ($i = 0 ; $i < count($request->exam_type) ; $i++){

            if(empty ($request->exam_id[$i])) {
                $new_exam = new StudentExam();
                $new_exam->exam_type = $request->exam_type[$i];
                $new_exam->exam_name = $request->exam_name[$i];
                $new_exam->marks = $request->exam_mark[$i];
                $new_exam->student_id = $student_id;
                $new_exam->save();
            }else{
                $exam = StudentExam::where('id',$request->exam_id[$i])->update([
                    'exam_type' => $request->exam_type[$i],
                    'exam_name' => $request->exam_name[$i],
                    'marks' => $request->exam_mark[$i],
                ]);
            }
        }

        return back();

    }


    public function updatePreferences(Request $request)
    {
//                dd($request->all());
        $student_id = $request->student_id;
//        dd($student_id);
        $student = EducationPreference::where('student_id',$student_id)->first();
//        dd($student);
        $old_level = $student->level;
        $old_educational_interest = $student->educational_interest;


        $current_country = $student->current_country;
        $country_interest = $request->country_interest;
        $source_of_funding = $request->source_of_funding;
        $educational_interest = ($request->educational_interest == "Select Level" ? $old_educational_interest : $request->educational_interest);
        $specialization = $request->specialization;
        $budget = $request->budget;
        $level = $request->level;
        $special_considerations = $request->special_considerations;
        $extra_activities = $request->extra_activities;
        $competitive_exam = $request->competitive_exam;
        $passport = $request->passport;


        EducationPreference::where('student_id',$student_id)->update(['current_country'=>$current_country,'country_interest'=>$country_interest,
            'source_of_funding'=>$source_of_funding,'specialization'=>$specialization,'educational_interest'=>$educational_interest,
            'budget'=>$budget,'level'=>$level,'extra_activities'=>$extra_activities,'special_considerations'=>$special_considerations,'competitive_exam'=>$competitive_exam,
            'passport'=>$passport
        ]);


        return response()->json(['status'=>'success','msg'=>'Your Preference Educational has been updated']);

    }

    public function changePassword(Request $request)
    {
            $user=User::find(Auth::user()->id);

//        dd($request->password);
            $user->password=bcrypt($request->password);
            $user->save();
            return response()->json(['status'=>'success','msg'=>'password has been updated']);

    }
    
    public function jobs(Request $request)
    {
        $position = $request->position;
        $company = $request->company;
        $start_year = $request->start_year;
        $end_year = $request->end_year;
        $description = $request->description;
        $student_id = $request->student_id;
        $job_id = $request->job_id;
        if(empty($job_id)) {

            StudentJob::create([
                'position' => $position,
                'company' => $company,
                'start_year' => $start_year,
                'end_year' => $end_year,
                'description' => $description,
                'student_id'=>$student_id,
            ]);
        }else{
            StudentJob::where('id',$job_id)->update([
                'position' => $position,
                'company' => $company,
                'start_year' => $start_year,
                'end_year' => $end_year,
                'description' => $description,
                'student_id'=>$student_id


            ]);
        }
        return response()->json(['status'=>'success','msg'=>'Job has been updated']);

    }
    
}
