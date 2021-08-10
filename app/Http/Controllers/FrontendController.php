<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Course;
use App\Category;
use App\Photo;
use App\User;
use App\Recommendation;
use Auth;

class FrontendController extends Controller
{
    public function home($value='')
    {
     $Courses=Course::take(9)->get();
     $photo=Photo::all();
     $recommend= Recommendation::take(3)->get();
    	return view('frontend_project.mainpage', compact('Courses','photo', 'recommend'));
    }

    public function coursedetail($id)
    {
       $course = Course::find($id);
       $couid=$course->category_id;
       // dd($couid);
       $category=Course::where('category_id', $couid)->get();
       // dd($category);
       return view('frontend_project.coursedetail', compact('course', 'category'));
    }

    public function onlinecourse($value='')
    {
          $courses= Course::take(6)->get();
        $categories=Category::all();
    	return view('frontend_project.onlinecourse',compact( 'categories', 'courses'));
    }

    public function contact($value='')
    {
    	return view('frontend_project.contact');
    }

    public function contactSubmit(Request $request)
    {
        Mail::send('emails.contactmail',[
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address
        ], function($mail) use($request){
            $mail->from(env('MAIL_FROM_ADDRESS'),$request->name);
            $mail->to("warhaha450@gmail.com")->subject('Contact Us Message');  
            
        });
       return view('frontend_project.contact');
    }



    public function signin($value='')
    {
        return view('frontend_project.signin');
    }

    public function signup($value='')
    {
        return view('frontend_project.signup');
    }

    public function profile($value='')
    {
         $user_id=Auth::id();
         // dd($user_id);
         $user = User::find($user_id);
        return view('frontend_project.profile',compact('user'));
    }

     public function aboutus($value='')
    {
        return view('frontend_project.aboutus');
    }
    public function grade1($id)
    {   
        $course = Course::find($id);
        // dd($id);
        $category=Course::where('category_id', $id)->get();
       return view('frontend_project.grade1', compact('category', 'course'));
    }

    public function grade2($id)
    {   
        $course = Course::find($id);
        // dd($id);
        $category=Course::where('category_id', $id)->get();
       return view('frontend_project.grade2', compact('category', 'course'));
    }
    public function grade3($id)
    {   
        $course = Course::find($id);
        // dd($id);
        $category=Course::where('category_id', $id)->get();
       return view('frontend_project.grade3', compact('category', 'course'));
    }
    public function grade4($id)
    {   
        $course = Course::find($id);
        // dd($id);
        $category=Course::where('category_id', $id)->get();
       return view('frontend_project.grade4', compact('category', 'course'));
    }
    public function grade5($id)
    {   
        $course = Course::find($id);
        // dd($id);
        $category=Course::where('category_id', $id)->get();
       return view('frontend_project.grade5', compact('category', 'course'));
    }
    public function grade6($id)
    {   
        $course = Course::find($id);
        // dd($id);
        $category=Course::where('category_id', $id)->get();
       return view('frontend_project.grade6', compact('category', 'course'));
    }
    public function grade7($id)
    {   
        $course = Course::find($id);
        // dd($id);
        $category=Course::where('category_id', $id)->get();
       return view('frontend_project.grade7', compact('category', 'course'));
    }
    public function grade8($id)
    {   
        $course = Course::find($id);
        // dd($id);
        $category=Course::where('category_id', $id)->get();
       return view('frontend_project.grade8', compact('category', 'course'));
    }
    public function grade9($id)
    {   
        $course = Course::find($id);
        // dd($id);
        $category=Course::where('category_id', $id)->get();
       return view('frontend_project.grade9', compact('category', 'course'));
    }
  
    public function coursebycategory($id)
    {
         $categories=Category::all();
        // $course=Course::where('category_id',$id)->get();

        // $course = Course::find($id);
       // dd($couid);
       $category=Course::where('category_id', $id)->get();
       // dd($category);
       return view('frontend_project.coursebycategory', compact( 'categories', 'category'));
    }

    public function bycategory(Request $request)
    {
      $id=$request->id;
      $course=Course::where('category_id', $id)->get();
      return $course;
    }

     public function recommend($value='')
    {
      return view('frontend_project.recommendation');
    }

    // public function registerdetail($value='')
    // {
    //     return view('frontend_project.registerdetail');
    // }

}
