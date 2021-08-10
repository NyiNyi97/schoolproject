<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $course = Course::all();
       return view('course.index',compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $category=Category::all();
        return view('course.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
         $request->validate([
            "name"=>"required",
            "photo"=>"required|mimes:jpeg,jpg,png",
            "price" => "required",
            "description" => "required",
            "startdate" => "required",
            "category" => "required"

        ]);
        // if include file, upload
        if ($request->file()) {
            //23233432121_a.jpg
            $fileName=time().'_'.$request->photo->getClientOriginalName();
            //brandimg/343431212_a.jpg
            $filePath=$request->file('photo')->storeAs('courseimg',$fileName,'public');
            $path=' /storage/'.$filePath;
        }


        //store
            $course=new Course;
            $course->name=$request->name;
            $course->photo=$path;
            $course->price=$request->price;
            $course->description=$request->description;
            $course->startdate=$request->startdate;
            $course->status=$request->status;
            $course->category_id=$request->category;
            $course->save();

        //redirect
            return redirect()->route('course.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
         $category=Category::find($course);
        return view('course.show',compact('course','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $category=Category::all();
        return view('course.edit',compact('course','category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        // dd($request);
         $request->validate([
            "name"=>"required",
            "photo"=>"sometimes|mimes:jpeg,jpg,png",
            "oldphoto"=>"required"

        ]);
        // if include file, upload
        if ($request->file()) {
            //23233432121_a.jpg
            $fileName=time().'_'.$request->photo->getClientOriginalName();
            //brandimg/343431212_a.jpg
            $filePath=$request->file('photo')->storeAs('courseimg',$fileName,'public');
            $path=' /storage/'.$filePath;
        }
         else{
            $path=$request->oldphoto;
        }


        //store
            $course->name=$request->name;
            $course->photo=$path;
            $course->price=$request->price;
            $course->description=$request->description;
            $course->startdate=$request->startdate;
            $course->status=$request->status;
            $course->category_id=$request->category;
            $course->save();

        //redirect
            return redirect()->route('course.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index');
    }
}
