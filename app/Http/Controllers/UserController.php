<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        return view('user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd();
       //validation
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
          // if include file, upload
        // if ($request->file()) {
        //     //23233432121_a.jpg
        //     $fileName=time().'_'.$request->photo->getClientOriginalName();
        //     //brandimg/343431212_a.jpg
        //     $filePath=$request->file('photo')->storeAs('userimg',$fileName,'public');
            $path='/asset/image/user3.png';
    
       //data store
         $user=new User;
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password=Hash::make($request->password);
         $user->photo=$path;
         $user->phone=$request->phone;
         $user->save();
       //assign user as customer 
         $user->assignRole('customer');

      //login
         Auth::login($user);
       //redirect
         return redirect()->route('mainpage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       // dd($user);
       //validation
    
          // if include file, upload
        if ($request->file()) {
            //23233432121_a.jpg
            $fileName=time().'_'.$request->newphoto->getClientOriginalName();
            //brandimg/343431212_a.jpg
            $filePath=$request->file('newphoto')->storeAs('userimg',$fileName,'public');
            $path=' /storage/'.$filePath;
    
    }
    else{
            $path=$request->newphoto;
        }

        $id=$user->id; 
         // dd($id);
         $user=User::find($id);
         $user->name=$request->name;
         $user->email=$request->email;
         // $user->password=Hash::make($request->password);
         $user->photo=$path;
         $user->phone=$request->phone;
         $user->save();
       //assign user as customer 
         // $user->assignRole('customer');

      //login
         // Auth::login($user);
       //redirect
         return redirect()->route('profilepage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
