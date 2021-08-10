<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $photo=Photo::all();
        // dd($user);
        return view('photo.index',compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('photo.create');
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
            "description" => "required"
        ]);
        // if include file, upload
        if ($request->file()) {
            //23233432121_a.jpg
            $fileName=time().'_'.$request->photo->getClientOriginalName();
            //brandimg/343431212_a.jpg
            $filePath=$request->file('photo')->storeAs('photoimg',$fileName,'public');
            $path=' /storage/'.$filePath;
        }


        //store
            $photo=new Photo;
            $photo->name=$request->name;
            $photo->photo=$path;
            $photo->description=$request->description;
            $photo->save();

        //redirect
            return redirect()->route('photo.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('photo.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
         return view('photo.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        // dd($request);
         $request->validate([
            "name"=>"required",
            "photo"=>"sometimes|mimes:jpeg,jpg,png",
            "description" => "required"
        ]);
        // if include file, upload
        if ($request->file()) {
            //23233432121_a.jpg
            $fileName=time().'_'.$request->photo->getClientOriginalName();
            //brandimg/343431212_a.jpg
            $filePath=$request->file('photo')->storeAs('photoimg',$fileName,'public');
            $path=' /storage/'.$filePath;
        }
        else{
            $path=$request->oldphoto;
        }

        //store
            $photo->name=$request->name;
            $photo->photo=$path;
            $photo->description=$request->description;
            $photo->save();

        //redirect
            return redirect()->route('photo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('photo.index'); 
    }
}
