<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseFees;
use App\Exam;
use App\Institution;
use Illuminate\Http\Request;
use DB;

class searchController extends Controller
{
    //

    public function getResults(Request $request)
    {

        $country = $request->country;
        $search_title = $request->search_title;
//dd($country );
        $universities  = Institution::with('courses')->where('country',$country)->where('name','LIKE','%'.$search_title.'%')->get();
        $universities_ids  = Institution::where('country',$country)->pluck('id');

        $courses = Course::with('fees')->whereIn('institution_id',$universities_ids)
                        ->Orwhere('name','LIKE','%'.$search_title.'%')
                        ->Orwhere('description','LIKE','%'.$search_title.'%')
                        ->get();
//        dd($courses);
        return view('search.search',compact('universities','courses','search_title','country'));

    }

    public function filter (Request $request)
    {
        $search_title = $request->search_title;
        $country = $request->country;
        $university = $request->university;//array
        $type = $request->type;//array
        $exam = $request->exam;
        $specialisation = $request->specialisation;
        $salary = $request->salary;
        $scholarship = $request->scholarship;
        $public = $request->public;
        $accommodation = $request->accommodation;
//    dd($scholarship);

        $institution_ids = Exam::when($exam, function ($query) use ($exam) {
                                return $query->whereIn('name',$exam);
                            })->pluck('institution_id');

        if($university) {
                $universities = Institution::with('courses')->where('country', $country)
                    ->whereIn('name', $university)
                    ->when($institution_ids, function ($query) use ($institution_ids) {
                        return $query->whereIn('id',$institution_ids);
                    })->when($scholarship, function ($query) use ($scholarship) {
                        return $query->where('scholarship',$scholarship);
                    })->when($public, function ($query) use ($public) {
                        return $query->where('public',$public);
                    })->when($accommodation, function ($query) use ($accommodation) {
                        return $query->where('accommodation_details',$accommodation);
                    })
                    ->distinct()->get();
        }else {
                $universities = Institution::with('courses')->where('country', $country)
                    ->where('name','LIKE','%'.$search_title.'%')
                    ->when($institution_ids, function ($query) use ($institution_ids) {
                        return $query->whereIn('id',$institution_ids);
                    })->when($scholarship, function ($query) use ($scholarship) {
                        return $query->where('scholarship',$scholarship);
                    })->when($public, function ($query) use ($public) {
                        return $query->where('public',$public);
                    })->when($accommodation, function ($query) use ($accommodation) {
                        return $query->where('accommodation_details',$accommodation);
                    })
                    ->distinct()->get();
        }

            $courses_ids = DB::table('course_fees')->when($salary, function ($query) use ($salary) {
                return $query->where('type','first')->where('fees_amount_indian','<=',$salary);
            })->distinct()->pluck('course_id');


            $courses = Course::when($courses_ids, function ($query) use ($courses_ids) {
                return $query->whereIn('id', $courses_ids);
            })->when($specialisation, function ($query) use ($specialisation) {
                return $query->whereIn('specialisation', $specialisation);
            })->when($type, function ($query) use ($type) {
                return $query->whereIn('level', $type);
            })->distinct()->get();

//        dd($universities);
        return view('search.search',compact('universities','courses','search_title','country'));
    }
}
