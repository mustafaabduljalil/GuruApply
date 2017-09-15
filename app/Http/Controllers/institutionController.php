<?php

namespace App\Http\Controllers;

use App\BasicEligibility;
use App\Brochure;
use App\Course;
use App\CourseStudentGuide;
use App\File;
use App\Institution;
use App\InstitutionScholarship;
use App\Multimedia;
use App\PendingInstitution;
use Illuminate\Http\Request;
use Auth;
use Storage;
use Crypt;

class institutionController extends Controller
{

    //THis method to store data of registration of institution
    public function pendingInstitution(Request $request)
    {
        //Get data of institution registration form by ajax request
        $institution_email = $request->institution_email;
        $institution_name = $request->institution_name;
        $institution_phone = $request->institution_phone;
        $person_name = $request->person_name;
        //store it in database (pending_institution table)
        $institution_data = ['institution_email'=>$institution_email,
                             'institution_name'=>$institution_name,
                             'institution_phone'=>$institution_phone,
                             'person_name'=>$person_name,
                             'pending'=>1
                            ];
        PendingInstitution::create($institution_data);
         return response()->json(['status' => 'success', 'msg' => 'We will call you soon']);
        
    }


    public function getProfile()
    {
        $general_information = Institution::where('user_id',Auth::user()->id)->first();
//        $basic_eligibility = BasicEligibility::where('institution_id',Auth::user()->id)->get();
//        $brochure = Brochure::where('institution_id',Auth::user()->id)->get();
//        $scholarships = InstitutionScholarship::where('institution_id',Auth::user()->id)->get();
        $photos = Multimedia::where('institution_id',Auth::user()->id)->where('type','photo')->get();
        $videos = Multimedia::where('institution_id',Auth::user()->id)->where('type','video')->get();
//        dd($general_information->id);
//        $data = [];
//        $data['general_information'] = $general_information;
//        $data['basic_eligibility'] = $basic_eligibility;
//        $data['brochure'] = $brochure;
//        $data['scholarships'] = $scholarships;
//        $data['multimedia'] = $multimedia;
        $student_guides = CourseStudentGuide::distinct()->get();

        $courses = Course::with('fees')->where('institution_id',$general_information->id)->get();

//        dd($courses);
//        foreach ($courses as $a){
//
//            foreach ($a->fees as $b){
////                dd($b->id);
//            }
//    }

        return view('institution.profile',compact('general_information','photos','videos','courses','student_guides'));
    }

    public function contactDetailsUpdates(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $phone = $request->phone;
        $website = $request->website;

        $updated_data = ['name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
            'website'=>$website
        ];
        Institution::where('user_id',Auth::user()->id)->update($updated_data);

        return response()->json(['status' => 'success', 'msg' => 'Contact Details has been updated']);

    }

    public function affiliationUpdates(Request $request)
    {
        $affiliation = $request->affiliation;

        $updated_data = ['affiliation'=>$affiliation,
        ];
        Institution::where('user_id',Auth::user()->id)->update($updated_data);

        return response()->json(['status' => 'success', 'msg' => 'Affiliation has been updated']);

    }

    public function accreditationUpdates(Request $request)
    {
        $accreditation = $request->accreditation;

        $updated_data = ['accreditation'=>$accreditation,
        ];
        Institution::where('user_id',Auth::user()->id)->update($updated_data);
        return response()->json(['status' => 'success', 'msg' => 'Affiliation has been updated']);
    }


    public function yearOfEstablishmentUpdates(Request $request)
    {
        $year_of_establishment = $request->year_of_establishment;

        $updated_data = ['year_of_establishment'=>$year_of_establishment];
        Institution::where('user_id',Auth::user()->id)->update($updated_data);
        return response()->json(['status' => 'success', 'msg' => 'Year of establishment has been updated']);
    }


    public function studentsNumberUpdates(Request $request)
    {
        $number_of_Student_updates = $request->number_of_Student_updates;

        $updated_data = ['number_of_Student_updates'=>number_of_Student_updates];
        Institution::where('user_id',Auth::user()->id)->update($updated_data);
        return response()->json(['status' => 'success', 'msg' => 'Number of students has been updated']);
    }

    public function universityPublic(Request $request)
    {
        $public = $request->public;

        $updated_data = ['public'=>$public];
        Institution::where('user_id',Auth::user()->id)->update($updated_data);
        return response()->json(['status' => 'success', 'msg' => 'University public has been updated']);
    }


    public function scholarship(Request $request)
    {
        $scholarship = $request->scholarship;
        $updated_data = ['scholarship'=>$scholarship];
        Institution::where('user_id',Auth::user()->id)->update($updated_data);
        return response()->json(['status' => 'success', 'msg' => 'Scholarship has been updated']);
    }

    public function basicEligibility(Request $request)
    {
        $education = $request->education;
        $mark = $request->mark;
        $updated_data = ['education'=>$education,'mark'=>$mark];
        $id = Institution::with('basicEligibility')->value('id');
        BasicEligibility::where('institution_id',$id)->update($updated_data);
        return response()->json(['status' => 'success', 'msg' => 'Basic Eligibility has been updated']);
    }

    public function institutionCountry(Request $request)
    {
        $country = $request->country;
        $updated_data = ['country'=>$country];
        Institution::where('user_id',Auth::user()->id)->update($updated_data);
        return response()->json(['status' => 'success', 'msg' => 'Country has been updated']);
    }

    public function institutionProfile(Request $request)
    {
        $profile = $request->profile;
        $updated_data = ['profile'=>$profile];
        Institution::where('user_id',Auth::user()->id)->update($updated_data);
        return response()->json(['status' => 'success', 'msg' => 'Profile has been updated']);
    }

    public function institutionAccommodation(Request $request)
    {
        $accommodation_details = $request->accommodation_details;
        $updated_data = ['accommodation_details'=>$accommodation_details];
        Institution::where('user_id',Auth::user()->id)->update($updated_data);
        return response()->json(['status' => 'success', 'msg' => 'Accommodation has been updated']);
    }

    public function institutionLogo(Request $request)
    {
        $name = $request->name;
        $file_path = $request->file('logo')->store('/uploads');
        $file = new File();
        $file->path = $file_path;
        $file->save();

        Institution::where('user_id',Auth::user()->id)->update(['name'=>$name,'logo_id'=>$file->id]);

        return back();
    }

    public function uploadBrochure(Request $request)
    {
        $name = $request->name;
        $institution_id = $request->institution_id;
        $file_path = $request->file('brochure')->store('/uploads');
        $file = new File();
        $file->path = $file_path;
        $file->save();
        Brochure::create(['institution_id'=>$institution_id,'name'=>$name,'file_id'=>$file->id]);

        return back();

    }

    
        public function downloadBrochure($id)
        {
            $brochure = Brochure::where('id',$id)->first();
            $path = File::where('id',$brochure->file_id)->value('path');
            return response()->download($path);
            
        }

        public function removeBrochure(Request $request)
        {
            $brochures_ids = $request->values;
            Brochure::whereIn('id',$brochures_ids)->delete();
            return response()->json(['status' => 'success', 'msg' => 'Brochure has been deleted']);

        }

        public function uploadMultimedia (Request $request)
        {
            if(isset($request->photo)) {
                $file_path = $request->file('photo')->store('/uploads/multimedia/photos');
                $type = "photo";
            }else{
                $file_path = $request->file('video')->store('/uploads/multimedia/videos');
                $type = "video";
            }

            $file = new File();
            $file->path = $file_path;
            $file->save();
            $institution_id = Institution::where('user_id',Auth::user()->id)->value('id');
            Multimedia::create(['institution_id'=>$institution_id,'type'=>$type,'file_id'=>$file->id]);

            return back();

        }


        public function removeMultimedia(Request $request)
        {
            $media_ids = $request->values;

            Multimedia::whereIn('id',$media_ids)->delete();
            return response()->json(['status' => 'success', 'msg' => 'Multimedia has been deleted']);

        }


        public function getInstitutionPage($id)
        {
            $institution = Institution::with('courses','brochures','basicEligibility','multimedia')->where('id',$id)->first();
            $photos = Multimedia::where('institution_id',$id)->where('type','photo')->get();
            $videos = Multimedia::where('institution_id',$id)->where('type','video')->get();
            
            return view('institution.main_page',compact('institution','photos','videos'));
        }




}

