<?php

namespace App\Http\Controllers;

use App\Recommendation;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function __construct($value='')
    {
       $this->middleware('role:admin', ['only'=>[
        'index','show', 'destroy', 'confirm'
       ]]);
        $this->middleware(['role:customer'])->only('store');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $recommendations = Recommendation::all();
        return view('recommendation.index',compact('recommendations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('recommendation.create');
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if ($request->file()) {
            //23233432121_a.jpg
            $fileName=time().'_'.$request->photo->getClientOriginalName();
            //brandimg/343431212_a.jpg
            $filePath=$request->file('photo')->storeAs('recommendimg',$fileName,'public');
            $path='/storage/'.$filePath;
        }

        //store
            $recommend=new Recommendation;
            $recommend->name=$request->name;
            $recommend->photo=$path;
            $recommend->rating=$request->rating;
            $recommend->description=$request->description;
            $recommend->save();

        //redirect
             return redirect()->route('mainpage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function show(Recommendation $recommendation)
    {
         return view('recommendation.show',compact('recommendation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function edit(Recommendation $recommendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recommendation $recommendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recommendation  $recommendation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recommendation $recommendation)
    {
        $recommendation->delete();
        return redirect()->route('recommendation.index');
    }
}
